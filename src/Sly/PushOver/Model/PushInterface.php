<?php

namespace Sly\PushOver\Model;

/**
 * Push interface.
 *
 * @author Cédric Dugat <ph3@slynett.com>
 */
interface PushInterface
{
    /**
      * Get Title value.
      *
      * @return string
      */
    public function getTitle();

    /**
      * Set Title value.
      *
      * @param string $title Title value to set
      */
    public function setTitle($title);

    /**
      * Get Message value.
      *
      * @return string
      */
    public function getMessage();

    /**
      * Set Message value.
      *
      * @param string $message Message value to set
      */
    public function setMessage($message);

    /**
      * Get Sound value.
      *
      * @return string
      */
    public function getSound();

    /**
      * Set Sound value.
      *
      * @param string $sound Sound value to set
      */
    public function setSound($sound);

    /**
      * Get Date value.
      *
      * @return string
      */
    public function getDate();

    /**
      * Set Date value.
      *
      * @param \DateTime $date Date value to set
      */
    public function setDate(\DateTime $date);

    /**
      * Get hasBeenSent value.
      *
      * @return boolean
      */
    public function getHasBeenSent();

    /**
      * Set hasBeenSent value.
      *
      * @param boolean $hasBeenSent Has been sent value
      */
    public function setHasBeenSent($hasBeenSent);

    public function getUrl();
    public function setUrl($url);

    public function getUrlTitle();
    public function setUrlTitle($title);
}
