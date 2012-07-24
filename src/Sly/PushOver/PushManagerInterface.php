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
     * Set message (with or without options).
     * 
     * @param string $message Message
     * @param array  $options Options
     */
    public function setMessage($message, array $options = array());

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