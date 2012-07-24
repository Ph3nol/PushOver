<?php

namespace Sly\PushOver\Tests;

use Sly\PushOver\PushManager;

/**
 * PushManager test class.
 *
 * @author Cédric Dugat <ph3@slynett.com>
 */
class PushManagerTest extends \PHPUnit_Framework_TestCase
{
    protected $push;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->push = new PushManager('XXX', 'YYY');
    }

    public function testData()
    {
        /**
         * @todo Write it.
         */
        $this->markTestIncomplete('To be written...');
    }

    public function testApiConnection()
    {
        /**
         * @todo Write it.
         */
        $this->markTestIncomplete('To be written...');
    }

    public function testMessage()
    {
        /**
         * @todo Write it.
         */
        $this->markTestIncomplete('To be written...');
    }

    public function testPush()
    {
        /**
         * @todo Write it.
         */
        $this->markTestIncomplete('To be written...');
    }
}