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

### Add to your project Composer packages

Just add `sly/pushover` package to the requirements of your Composer JSON configuration file,
and run `php composer.phar install` to install it.

### Install from GitHub

Clone this library from Git with `git clone https://github.com/Ph3nol/PushOver.git`.

Goto to the library directory, get Composer phar package and install vendors:

```
curl -s https://getcomposer.org/installer | php
php composer.phar install
```

You're ready to go.

## Example

``` php
<?php

require_once '/path/to/vendor/autoload.php'; // or your global project autoload

use Sly\PushOver\Model\Push;
use Sly\PushOver\PushManager;

/**
 * First, create your own push, with its message.
 */
$myPush = new Push();
$myPush->setMessage('Pony is wonderful!');
$myPush->setTitle('Example'); // Optional

/**
 * Create an instance for PushManager.
 * Give it your user key (first arguement) and token one (second argument).
 * You can give a device name on third argument (optional).
 */
$push = new PushManager('myUs3rk3y', 'myAp1k3y');

/**
 * Push it! :)
 */
if (true === $push->push($myPush)) {
    /**
     * Your message has been sent.
     */
}
```