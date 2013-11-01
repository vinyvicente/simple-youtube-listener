<?php

namespace Vinyvicente\Youtube\Feed;

use Vinyvicente\YException;
use Vinyvicente\Youtube\Feed\Entity\Video;
use Vinyvicente\Youtube\Feed\Entity\User;
use Vinyvicente\Youtube\Feed\Collection\VideoCollection;

/**
 * Class Collection
 *
 * @package Vinyvicente\Youtube\Feed
 *
 * @author Vinicius V. de Oliveira <vinyvicente@gmail.com>
 */
class Collection
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
     * @return VideoCollection
     */
    protected function parseResult()
    {
        $videos = new VideoCollection();

        if ($this->result != null) {

            $xml = new \SimpleXMLElement($this->result);

            foreach ($xml->entry as $entry) {

                $url = (string)$entry->link['href'];

                // gets ID
                parse_str(parse_url($url, PHP_URL_QUERY), $params);

                $id = $params['v'];

                $video = new Video();
                $video->setId($id)
                    ->setTitle((string)$entry->title)
                    ->setThumbnail('http://i' . rand(1, 4) .'.ytimg.com/vi/'. $id .'/hqdefault.jpg')
                    ->setUrl($url);

                $videos->addItem($video);
            }
        }

        return $videos;
    }

    /**
     * @return VideoCollection
     */
    public function getVideos()
    {
        return $this->getFeed()->parseResult();
    }
}
