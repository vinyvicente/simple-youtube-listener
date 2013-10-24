<?php

namespace Vinyvicente\Youtube\Feed;

use Vinyvicente\YException;
use Vinyvicente\Youtube\Feed\User;

/**
 * Class Listener
 *
 * @package Vinyvicente\Youtube\Feed
 */
class Listener
{
    /**
     * @var string
     */
    protected $feedUrl = 'http://gdata.youtube.com/feeds/base/users/%s/uploads?orderby=updated&v=2';

    /**
     * @var mixed
     */
    protected $result;

    /**
     * @var User
     */
    protected $user;

    /**
     * @param User $user
     *
     * @throws YException
     */
    public function __construct(User $user)
    {
        if ($user instanceof User) {
            $this->user = $user;
        } else {
            throw new YException('Variable $user not can be EMPTY!');
        }

        return $this;
    }

    /**
     * @return $this
     * @throws YException
     */
    protected function getFeed()
    {
        if (!in_array('curl', get_loaded_extensions())) {
            throw new YException('CURL is not enabled. See: http://www.php.net/manual/en/curl.setup.php');
        }

        $curl = curl_init(sprintf($this->feedUrl, $this->user->getUser()));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        $this->result = curl_exec($curl);
        curl_close($curl);

        return $this;
    }

    /**
     * @return array
     */
    protected function parseResult()
    {
        $videos = array();

        if ($this->result != null) {

            $xml = new \SimpleXMLElement($this->result);

            foreach ($xml->entry as $video) {

                $url = (string)$video->link['href'];

                // gets ID
                parse_str(parse_url($url, PHP_URL_QUERY), $params);

                $id = $params['v'];

                // Parse a array in data
                $videos[] = array(
                    'id'        => $id,
                    'title'     => (string) $video->title,
                    'thumbnail' => 'http://i' . rand(1, 4) .'.ytimg.com/vi/'. $id .'/hqdefault.jpg',
                    'url'       => $url
                );
            }
        }

        return $videos;
    }

    /**
     * @return array
     */
    public function getVideos()
    {
        return $this->getFeed()->parseResult();
    }
}
