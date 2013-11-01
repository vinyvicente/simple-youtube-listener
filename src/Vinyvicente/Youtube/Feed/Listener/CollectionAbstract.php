<?php

namespace Vinyvicente\Youtube\Feed\Listener;

/**
 * Class CollectionAbstract
 *
 * @package Vinyvicente\Youtube\Feed\Listener
 *
 * @author Vinicius V. de Oliveira <vinyvicente@gmail.com>
 */
abstract class CollectionAbstract
{
    protected $items = array();

    /**
     * @return int
     */
    public function count()
    {
        return (int) count($this->items);
    }
}
