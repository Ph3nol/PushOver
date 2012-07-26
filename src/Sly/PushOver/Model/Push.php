<?php

namespace Sly\PushOver\Model;

/**
 * Push class.
 *
 * @uses PushInterface
 * @author Cédric Dugat <ph3@slynett.com>
 */
class Push implements PushInterface
{
    protected $title;
    protected $message;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->title   = null;
        $this->message = null;
    }

    /**
     * __toString.
     * 
     * @return string
     */
    public function __toString()
    {
        return $this->message;
    }

    /**
     * {@inheritdoc}
     */
    public function getTitle()
    {
        return $this->title;
    }
    
    /**
     * {@inheritdoc}
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * {@inheritdoc}
     */
    public function getMessage()
    {
        return $this->message;
    }
    
    /**
     * {@inheritdoc}
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }
}
