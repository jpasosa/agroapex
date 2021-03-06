<?php

/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
abstract class PluginaMediaItem extends BaseaMediaItem
{
  public function save(Doctrine_Connection $conn = null)
  {
    if (!$this->getOwnerId())
    {
      if (sfContext::hasInstance())
      {
        $user = sfContext::getInstance()->getUser();
        if ($user->getGuardUser())
        {
          $this->setOwnerId($user->getGuardUser()->getId());
        }
      }
    }
    // Let the culture be the user's culture
    return aZendSearch::saveInDoctrineAndLucene($this, null, $conn);
  }

  public function doctrineSave($conn)
  {
    $result = parent::save($conn);
    return $result;
  }

  public function delete(Doctrine_Connection $conn = null)
  {
    $ret = aZendSearch::deleteFromDoctrineAndLucene($this, null, $conn);
    $this->clearImageCache();
    // Don't even think about trashing the original until we know
    // it's gone from the db and so forth
    unlink($this->getOriginalPath());
    return $ret;
  }

  public function doctrineDelete($conn)
  {
    return parent::delete($conn);
  }
  
  public function updateLuceneIndex()
  {
    aZendSearch::updateLuceneIndex($this, array(
      'type' => $this->getType(),
      'title' => $this->getTitle(),
      'description' => $this->getDescription(),
      'credit' => $this->getCredit(),
      'categories' => implode(", ", $this->getMediaCategoryNames()),
      'tags' => implode(", ", $this->getTags())
    ));
  }
  
  public function getMediaCategoryNames()
  {
    $categories = $this->getMediaCategories();
    $result = array();
    foreach ($categories as $category)
    {
      $result[] = $category->getName();
    }
    return $result;
  }
  
  public function getOriginalPath($format = false)
  {
    if ($format === false)
    {
      $format = $this->getFormat();
    }
    return aMediaItemTable::getDirectory() . 
      DIRECTORY_SEPARATOR . $this->getSlug() . ".original.$format";
  }
  public function clearImageCache($deleteOriginals = false)
  {
    if (!$this->getId())
    {
      return;
    }
    $cached = glob(aMediaItemTable::getDirectory() . DIRECTORY_SEPARATOR . $this->getSlug() . ".*");
    foreach ($cached as $file)
    {
      if (!$deleteOriginals)
      {
        if (strpos($file, ".original.") !== false)
        {
          continue;
        }
      }
      unlink($file); 
    }
  }
  
  public function preSaveImage($file)
  {
    // Refactored into aImageConverter for easier reuse of this should-be-in-PHP functionality
    $info = aImageConverter::getInfo($file);
    if ($info)
    {
      // Sometimes we store formats we can't get dimensions for on this particular platform
      if (isset($info['width']))
      {
        $this->width = $info['width'];
      }
      if (isset($info['height']))
      {
        $this->height = $info['height'];
      }
      $this->format = $info['format'];
      $this->clearImageCache(true);
      return true;
    }
    else
    {
      return false;
    }
  }

  public function saveImage($file)
  {
    if (!$this->width)
    {
      if (!$this->preSaveImage($file))
      {
        return false;
      }
    }
    $path = $this->getOriginalPath($this->getFormat());
    $result = copy($file, $path);
    return $result;
  }

  public function getEmbedCode($width, $height, $resizeType, $format = 'jpg', $absolute = false, $wmode = 'opaque')
  {
    if ($height === false)
    {
      // Scale the height. I had this backwards
      $height = floor(($width * $this->height / $this->width) + 0.5); 
    }

    // Accessible alt title
    $title = htmlspecialchars($this->getTitle());
    // It would be nice if partials could be used for this.
    // Think about whether that's possible.
    if ($this->getType() === 'video')
    {
      if ($this->embed)
      {
        // Solution for non-YouTube videos based on a manually
        // provided thumbnail and embed code
        return str_replace(array('_TITLE_', '_WIDTH_', '_HEIGHT_'),
          array($title, $width, $height), $this->embed);
      }
      // TODO: less YouTube-specific
      $serviceUrl = $this->getServiceUrl();
      $embeddedUrl = $this->youtubeUrlToEmbeddedUrl($serviceUrl);
      return <<<EOM
			<object alt="$title" width="$width" height="$height">
				<param name="movie" value="$embeddedUrl"></param>
				<param name="allowFullScreen" value="true"></param>
				<param name="allowscriptaccess" value="always"></param>
				<param name="wmode" value="$wmode"></param>
				<embed alt="$title" src="$embeddedUrl" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="$width" height="$height" wmode="$wmode"></embed>
			</object>
EOM
      ;
    }
    elseif (($this->getType() == 'image') || ($this->getType() == 'pdf'))
    {
      // Use named routing rule to ensure the desired result (and for speed)
      return "<img alt=\"$title\" width=\"$width\" height=\"$height\" src='" . htmlspecialchars($this->getImgSrcUrl($width, $height, $resizeType, $format, $absolute)) . "' />";
    }
    else
    {
      throw new Exception("Unknown media type in getEmbedCode: " . $this->getType() . " id is " . $this->id . " is new? " . $this->isNew());
    }
  }
  
  // This is currently allowed for all types, although a PDF will give you a plain white box if you
  // don't have ghostscript available
  
  public function getImgSrcUrl($width, $height, $resizeType, $format = 'jpg', $absolute = false)
  {
    if ($height === false)
    {
      // Scale the height. I had this backwards
      $height = floor(($width * $this->height / $this->width) + 0.5); 
    }

    $controller = sfContext::getInstance()->getController();
    $slug = $this->getSlug();
    // Use named routing rule to ensure the desired result (and for speed)
    return $controller->genUrl("@a_media_image?" . 
      http_build_query(
        array("slug" => $slug, 
          "width" => $width, 
          "height" => $height, 
          "resizeType" => $resizeType,
          "format" => $format)), $absolute);
  }
  
  protected function youtubeUrlToEmbeddedUrl($url)
  {
    $url = str_replace("/watch?v=", "/v/", $url);
    $url .= "&fs=1";
    return $url;
  }
  public function userHasPrivilege($privilege, $user = false)
  {
    if ($user === false)
    {
      $user = sfContext::getInstance()->getUser();
    }
    if ($privilege === 'view')
    {
      if ($this->getViewIsSecure())
      {
        if (!$user->isAuthenticated())
        {
          return false;
        }
      }
      return true;
    }
    if ($user->hasCredential(aMediaTools::getOption('admin_credential')))
    {
      return true;
    }
    $guardUser = $user->getGuardUser();
    if (!$guardUser)
    {
      return false;
    }
    if ($this->getOwnerId() === $guardUser->getId())
    {
      return true;
    }
    return false;
  }
  
  // Returns a Symfony action URL. Call url_for or use sfController for final routing.
  
  public function getScaledUrl($options)
  {
    $options = aDimensions::constrain($this->getWidth(), $this->getHeight(), $this->getFormat(), $options);

    return "aMediaBackend/image?" . http_build_query(
      array("slug" => $this->slug, "width" => $options['width'], "height" => $options['height'], 
        "resizeType" => $options['resizeType'], "format" => $options['format']));
  }
}
