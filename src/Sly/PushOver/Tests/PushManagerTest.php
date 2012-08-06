<?php

namespace Sly\PushOver\Tests;

use Sly\PushOver\PushManager;
use Sly\PushOver\Model\Push;
use Buzz\Message\Response;

/**
 * PushManager test class.
 *
 * @uses   PHPUnit_Framework_TestCase
 * @author Cédric Dugat <ph3@slynett.com>
 */
class PushManagerTest extends \PHPUnit_Framework_TestCase
{
    protected $push;
    protected $pushWithMessage;
    protected $pushManager;
    protected $pusherResponse;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->push            = new Push();
        $this->pushWithMessage = new Push();
        $this->pushManager     = new PushManager('XXX', 'YYY');
        $this->pusherResponse  = $this->getMock('Buzz\Message\Response');

        $this->pushWithMessage->setMessage('Test');
    }

    public function testData()
    {
        $pushManagerApiUrl = PushManager::API_URL;

        $this->assertTrue(isset($pushManagerApiUrl) && true === is_string($pushManagerApiUrl), 'There is no PushManager API URL constant');
    }

    /**
     * @expectedException Sly\PushOver\Exception\InvalidMessageException
     */
    public function testPushWithoutMessage()
    {
        $pushResult = $this->pushManager->push($this->push);
    }

    /**
     * @expectedException Sly\PushOver\Exception\AuthenticationException
     */
    public function testWebServiceCommunication()
    {
        $pushResult = $this->pushManager->push($this->pushWithMessage);
    }

    /**
     * @covers PushManager::_getResponseObj
     * @expectedException Sly\PushOver\Exception\AuthenticationException
     */
    public function testResponseWithInvalidUser()
    {
        $this->pusherResponse->expects($this->once())
            ->method('getContent')
            ->will($this->returnValue('{"user":"invalid","status":0}'));

        $reflectionOfPushManager = new \ReflectionClass('Sly\PushOver\PushManager');
        $method = $reflectionOfPushManager->getMethod('_getResponseObj');
        $method->setAccessible(true);

        $pushManagerResponse = $method->invokeArgs($this->pushManager, array($this->pusherResponse));
    }

    /**
     * @covers PushManager::_getResponseObj
     * @expectedException Sly\PushOver\Exception\AuthenticationException
     */
    public function testResponseWithInvalidToken()
    {
        $this->pusherResponse->expects($this->once())
            ->method('getContent')
            ->will($this->returnValue('{"token":"invalid","status":0}'));

        $reflectionOfPushManager = new \ReflectionClass('Sly\PushOver\PushManager');
        $method = $reflectionOfPushManager->getMethod('_getResponseObj');
        $method->setAccessible(true);

        $pushManagerResponse = $method->invokeArgs($this->pushManager, array($this->pusherResponse));
    }
}