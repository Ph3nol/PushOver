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
      * @return string Title value to get
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
      * @return string Message value to get
      */
    public function getMessage();
    
    /**
      * Set Message value.
      *
      * @param string $message Message value to set
      */
    public function setMessage($message);

    /**
      * Get sentAt value.
      *
      * @return string sentAt value to get
      */
    public function getSentAt();
    
    /**
      * Set sentAt value.
      *
      * @param \DateTime $sentAt sentAt value to set
      */
    public function setSentAt(\DateTime $sentAt);
}
