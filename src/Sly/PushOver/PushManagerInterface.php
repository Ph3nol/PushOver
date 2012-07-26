<?php

namespace Sly\PushOver;

use Sly\PushOver\Model\PushInterface;

use Buzz\Message\Response;

/**
 * PushManager interface.
 *
 * @author Cédric Dugat <ph3@slynett.com>
 */
interface PushManagerInterface
{
    /**
     * Push message.
     *
     * @param PushInterface $push Push
     * 
     * @return boolean
     */
    public function push(PushInterface $push);

    /**
     * getResponseObj method.
     * 
     * @param Response $response Response
     * 
     * @return object
     */
    public function getResponseObj(Response $response);
}