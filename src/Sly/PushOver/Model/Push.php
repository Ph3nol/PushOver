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
    protected $date;
    protected $url;
    protected $url_title;
    protected $sound;
    protected $hasBeenSent;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->title       = null;
        $this->message     = null;
        $this->sound	   = null;
        $this->url	       = null;
        $this->url_title   = null;
        $this->date        = new \DateTime();
        $this->hasBeenSent = false;
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

	/**
	 * {@inheritdoc}
	 */
    public function getSound()
    {
        return $this->sound;
    }

	/**
	 * {@inheritdoc}
	 */
    public function setSound($sound)
    {
        $this->sound = $sound;
    }
	

    /**
     * {@inheritdoc}
     */
    public function getDate()
    {
        return $this->date;
    }
    
    /**
     * {@inheritdoc}
     */
    public function setDate(\DateTime $date)
    {
        $this->date = $date;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @return string
     */
    public function getUrlTitle()
    {
        return $this->url_title;
    }

    /**
     * @param string $url_title
     */
    public function setUrlTitle($url_title)
    {
        $this->url_title = $url_title;
    }

    /**
     * {@inheritdoc}
     */
    public function getHasBeenSent()
    {
        return $this->hasBeenSent;
    }
    
    /**
     * {@inheritdoc}
     */
    public function setHasBeenSent($hasBeenSent)
    {
        $this->hasBeenSent = $hasBeenSent;
    }
}
