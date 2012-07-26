<?php

namespace Sly\PushOver;

use Sly\PushOver\PushManagerInterface;
use Sly\PushOver\Model\PushInterface;

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
    public function push(PushInterface $push)
    {
        if (null == $push->getMessage()) {
            throw new \Exception('There is no message to push');
        }

        $response = $this->browser->submit(self::API_URL, array(
            'user'    => $this->userKey,
            'token'   => $this->apiKey,
            'device'  => $this->device,
            'message' => $push->getMessage(),
            'title'   => $push->getTitle(),
        ));

        $responseObj = $this->getResponseObj($response);

        if ($responseObj && true === is_object($responseObj)) {
            return (bool) $responseObj->status;
        }

        return false;
    }

    /**
     * {@inheritdoc}
     */
    public function getResponseObj(Response $response)
    {
        $responseObj = json_decode($response->getContent());

        if (isset($responseObj->user) && $responseObj->user == 'invalid') {
            throw new \Exception('User key is invalid');
        }

        if (isset($responseObj->token) && $responseObj->token == 'invalid') {
            throw new \Exception('User key is invalid');
        }

        return $responseObj;
    }
}