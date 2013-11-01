<?php

namespace Vinyvicente\Youtube\Feed\Entity;

/**
 * Class Video
 *
 * @package Vinyvicente\Youtube\Feed\Entity
 *
 * @author Vinicius V. de Oliveira <vinyvicente@gmail.com>
 */
class Video extends EntityAbstract
{
    /**
     * @var string
     */
    protected $id;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $thumbnail;

    /**
     * @var string
     */
    protected $url;

    /**
     * @param string $id
     *
     * @return Video
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $thumbnail
     *
     * @return Video
     */
    public function setThumbnail($thumbnail)
    {
        $this->thumbnail = $thumbnail;

        return $this;
    }

    /**
     * @return string
     */
    public function getThumbnail()
    {
        return $this->thumbnail;
    }

    /**
     * @param string $title
     *
     * @return Video
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $url
     *
     * @return Video
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }
}
