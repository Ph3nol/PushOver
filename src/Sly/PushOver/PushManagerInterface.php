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
     * @param PushInterface $push     Push
     * @param boolean       $realSend Real send
     * 
     * @return boolean|array
     */
    public function push(PushInterface $push, $realSend = true);
}