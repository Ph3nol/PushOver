# SlyPushOver library

**Development in progress.**

## Install it

To be written.

## Use it

First, you need you have registered your dedicated [PushOver](https://pushover.net) application.

[Click this link](https://pushover.net/apps/build) to create one and get back your personal API key.

``` php
<?php

use Sly\Push;

$push = new Push('myAp1k3y'); // replace by your personal API key

/**
 * Second parameter (the array) is optional, as its elements.
 */
$push->setMessage('My message', array(
    'title' => 'My title',
    'device' => 'My-Device-Name',
));

if (true === $push->push($message)) {
    /**
     * Your message has been sent.
     */
}
```

To be continued.