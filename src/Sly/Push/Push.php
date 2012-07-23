<?php

namespace Sly\Push;

use Buzz\Browser;
use Buzz\Message\Response;
use Buzz\Client\Curl;

/**
 * Push class.
 *
 * @author Cédric Dugat <ph3@slynett.com>
 */
class Push
{
    const API_URL = 'https://api.pushover.net/1/messages.json';

    protected $browser;

    protected $userKey;
    protected $apiKey;

    protected $pushTitle;
    protected $pushMessage;
    protected $pushDevice;

    /**
     * Constructor.
     *
     * @param string $userKey User key
     * @param string $apiKey  API key
     */
    public function __construct($userKey, $apiKey)
    {
        $this->browser = new Browser(new Curl());
        $this->userKey = $userKey;
        $this->apiKey  = $apiKey;
    }

    /**
     * Set message (with or without options).
     * 
     * @param string $message Message
     * @param array  $options Options
     */
    public function setMessage($message, array $options = array())
    {
        $this->pushMessage = $message;
        $this->pushTitle   = isset($options['title']) ? $options['title'] : null;
        $this->pushDevice  = isset($options['device']) ? $options['device'] : null;
    }

    /**
     * Push message.
     * 
     * @return boolean
     */
    public function push()
    {
        if (empty($this->pushMessage) || null == $this->pushMessage) {
            throw new \Exception('There is no message to push');
        }

        $response = $this->browser->submit(self::API_URL, array(
            'user'    => $this->userKey,
            'token'   => $this->apiKey,
            'message' => $this->pushMessage,
            'title'   => $this->pushTitle,
            'device'  => $this->pushDevice,
        ));

        if ($responseObj = $this->getResponseObj($response) && true === is_object($responseObj)) {
            return (bool) $responseObj->status;
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
    public function getResponseObj(Response $response)
    {
        $responseObj = json_decode($response->getContent());

        if ($responseObj->user == 'invalid') {
            throw new \Exception('User key is invalid');
        }

        if ($responseObj->token == 'invalid') {
            throw new \Exception('User key is invalid');
        }

        return $responseObj;
    }
}