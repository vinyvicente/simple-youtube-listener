# Simple Youtube Listener #


## Overview ##

This an simple library of list videos by users in http://www.youtube.com

- Requirements:
 - PHP 5.3+
 - CURL
 - SimpleXML

## Installation ##

Package available on [Composer](http://packagist.org/packages/vinyvicente/simple-youtube-listener). Autoloading is [PSR-0](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-0.md) compatible.

## How it works ##

      use Vinyvicente\Youtube;
      
      $youtube = Youtube::getInstance();
      $videos = $youtube->getListVideos('your user');
      
      print_r($videos->getItems());
     
