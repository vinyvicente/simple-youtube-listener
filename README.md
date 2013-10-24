Simple Youtube Listener
=======================

This an simple library of list videos by users in http://www.youtube.com

- Requirements:
 - PHP 5.3+
 - CURL
 - SimpleXML

How to works:
=======================

      use Vinyvicente\Youtube;
      
      $youtube = Youtube::getInstance();
      $videos = $youtube->getListVideos('your user');
      
      print_r($videos);
     
