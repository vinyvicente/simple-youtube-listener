<?php

namespace Vinyvicente\Youtube\Feed\Collection;

/**
 * Class CollectionAbstract
 *
 * @package Vinyvicente\Youtube\Feed\Collection
 *
 * @author Vinicius V. de Oliveira <vinyvicente@gmail.com>
 */
abstract class CollectionAbstract implements \Iterator
{
    protected $items = array();

    /**
     * @return int
     */
    public function count()
    {
        return (int) count($this->items);
    }

    public function rewind()
    {
        reset($this->items);
    }

    public function current()
    {
        return current($this->items);
    }

    public function key()
    {
        return key($this->items);
    }

    public function next()
    {
        return next($this->items);
    }

    public function valid()
    {
        return $this->current() !== false;
    }
}
