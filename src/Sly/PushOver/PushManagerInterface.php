<?php

namespace Sly\PushOver;

use Buzz\Message\Response;

/**
 * PushManager interface.
 *
 * @author Cédric Dugat <ph3@slynett.com>
 */
interface PushManagerInterface
{
    /**
     * Set message.
     * 
     * @param string $message Message
     * @param string $title   Title (optional)
     */
    public function setMessage($message, $title = null);

    /**
     * Push message.
     * 
     * @return boolean
     */
    public function push();

    /**
     * getResponseObj method.
     * 
     * @param Response $response Response
     * 
     * @return object
     */
    public function getResponseObj(Response $response);
}