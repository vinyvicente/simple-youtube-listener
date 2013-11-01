<?php
/**
 * Class Youtube
 *
 * @author Vinicius V. de Oliveira <vinyvicente@gmail.com>
 * @version 1.0
 *
 * @todo List videos with object
 */
namespace Vinyvicente;

use Vinyvicente\Youtube\Feed\Collection\VideoCollection;
use Vinyvicente\Youtube\Feed\Entity\User;
use Vinyvicente\Youtube\Feed\Collection;

/**
 * Class Youtube
 *
 * @package Vinyvicente
 */
class Youtube
{
    /**
     * @var Youtube
     */
    protected static $instance;

    /**
     * @return Youtube
     */
    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * Get array of all videos
     *
     * @param $user
     *
     * @return VideoCollection
     */
    public function getListVideos($user)
    {
        $result = null;

        try {
            $userYoutube = new User();
            $userYoutube->setUser($user);

            $listener = new Collection($userYoutube);

            $result =  $listener->getVideos();

        } catch (YException $e) {
            echo 'An error has occurred: ' . $e->getMessage();
            exit;
        }

        return $result;
    }
}
