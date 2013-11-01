<?php

namespace Vinyvicente\Youtube\Feed\Listener;

use Vinyvicente\Youtube\Feed\Entity\Video;

/**
 * Class VideoCollection
 *
 * @package Vinyvicente\Youtube\Feed\Listener
 *
 * @author Vinicius V. de Oliveira <vinyvicente@gmail.com>
 */
class VideoCollection extends CollectionAbstract
{
    /**
     * Videos Collection
     *
     * @var array
     */
    protected $items = array();

    /**
     * Add new Video in Collection
     *
     * @param Video $video
     */
    public function addItem(Video $video)
    {
        $this->items[] = $video;
    }

    /**
     * @return array
     */
    public function getItems()
    {
        return $this->items;
    }
}
