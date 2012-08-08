<?php

namespace Sly\PushOver;

use Sly\PushOver\PushManagerInterface;
use Sly\PushOver\Model\PushInterface;
use Sly\PushOver\Exception\AuthenticationException;
use Sly\PushOver\Exception\InvalidMessageException;
use Sly\PushOver\Exception\WebServiceException;

use Buzz\Browser;
use Buzz\Message\Response;
use Buzz\Client\Curl;

/**
 * PushManager class.
 *
 * @uses PushManagerInterface
 * @author Cédric Dugat <ph3@slynett.com>
 */
class PushManager implements PushManagerInterface
{
    const API_URL = 'https://api.pushover.net/1/messages.json';

    protected $browser;

    protected $userKey;
    protected $apiKey;
    protected $device;

    /**
     * Constructor.
     *
     * @param string $userKey User key
     * @param string $apiKey  API key
     * @param device $device  Device
     */
    public function __construct($userKey, $apiKey, $device = null)
    {
        $this->browser = new Browser(new Curl());
        $this->userKey = $userKey;
        $this->apiKey  = $apiKey;
        $this->device  = $device;
    }

    /**
     * {@inheritdoc}
     */
    public function push(PushInterface $push, $realSend = true)
    {
        if (null == $push->getMessage()) {
            throw new InvalidMessageException('There is no message to push');
        }

        if (false === $realSend) {
            return (object) array(
                'push'     => $push,
                'response' => null,
                'status'   => null,
            );
        }

        try {
            $response = $this->browser->submit(self::API_URL, array(
                'user'    => $this->userKey,
                'token'   => $this->apiKey,
                'device'  => $this->device,
                'message' => $push->getMessage(),
                'title'   => $push->getTitle(),
            ));
        } catch (WebServiceException $e) {
            throw new WebServiceException('PushOver distant web service timed out');
        }

        $responseObj = $this->_getResponseObj($response);

        if ($responseObj && true === is_object($responseObj)) {
            $push->setHasBeenSent(true);

            return (object) array(
                'push'     => $push,
                'response' => $responseObj,
                'status'   => (bool) $responseObj->status,
            );
        }

        return false;
    }

    /**
     * getResponseObj method.
     * 
     * @param Response $response Response
     * 
     * @return object
     */
    protected function _getResponseObj(Response $response)
    {
        $responseObj = json_decode($response->getContent());

        if (isset($responseObj->user) && $responseObj->user == 'invalid') {
            throw new AuthenticationException('User key is invalid');
        }

        if (isset($responseObj->token) && $responseObj->token == 'invalid') {
            throw new AuthenticationException('Token key is invalid');
        }

        return $responseObj;
    }
}