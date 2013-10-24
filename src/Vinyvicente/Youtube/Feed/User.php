<?php

namespace Vinyvicente\Youtube\Feed;

/**
 * Class User
 *
 * @package Vinyvicente\Youtube\Feed
 */
class User
{
    /**
     * @var string
     */
    protected $user;

    /**
     * @param string $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return string
     */
    public function getUser()
    {
        return $this->user;
    }
}
