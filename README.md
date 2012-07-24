# SlyPushOver library

**Development in progress.**

## Requirements

* PHP 5.3+
* A [PushOver](https://pushover.net) account
* Have installed PushOver app on your phone
([iPhone](http://itunes.apple.com/us/app/pushover-notifications/id506088175?mt=8) or [Android](https://play.google.com/store/apps/details?id=net.superblock.pushover&hl=fr))

Once you've been registered and after having installed the mobile application,
[click this link](https://pushover.net/apps/build) to create your own API application
and get back your personal token/key.

## Installation

To be written.

## Example

``` php
<?php

use Sly\Push;

/**
 * First argument is your PushOver user key, second is your API/token one.
 */
$push = new Push('myUs3rk3y', 'myAp1k3y');

/**
 * Second argument (the array) is optional, as its elements.
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