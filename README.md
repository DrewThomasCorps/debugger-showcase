# Debugger Showcase
## Project Setup
* `cd` into MAMP/htdocs
* `git clone https://github.com/DrewThomasCorps/debugger-showcase.git && cd debugger-showcase`
* `composer install`
* Visit localhost/PATH_TO/debugger-showcase/public/hello in the browser (with MAMP running) and make sure it says Hello
* Install the [Xdebug helper](https://chrome.google.com/webstore/detail/xdebug-helper/eadndfjplgieldjbigjakmdgkmoaaaoc?hl=en) for chrome

## XDebug Setup
* `cd /Applicaitons/MAMP/bin/php/php7.YOUR_VERSION/conf`
* `vi` or `nano` into `php.ini` and search for [xdebug]
* Remove the semicolon before `zend_extension` and add the following lines:
```ini
; enables debugger
xdebug.remote_enable = 1
; selects the dbgp protocol
xdebug.remote_handler = "dbgp"
; host where debug client is running
xdebug.remote_host = "localhost"
; debugger port
xdebug.remote_port = 9000
; disables xdebug traces in error messages - use https://tracy.nette.org/ instead
xdebug.default_enable = "Off"
; makes sure that the process does not freeze when there is no debug client
xdebug.remote_autostart = 0
```

It should look similar to this:
```ini
[xdebug]
zend_extension="/Applications/MAMP/bin/php/php7.4.2/lib/php/extensions/no-debug-non-zts-20190902/xdebug.so"
; enables debugger
xdebug.remote_enable = 1
; selects the dbgp protocol
xdebug.remote_handler = "dbgp"
; host where debug client is running
xdebug.remote_host = "localhost"
; debugger port
xdebug.remote_port = 9000
; disables xdebug traces in error messages - use https://tracy.nette.org/ instead
xdebug.default_enable = "Off"
; makes sure that the process does not freeze when there is no debug client
xdebug.remote_autostart = 0
```

* Stop and Start MAMP for the configuration to take effect

If you are having trouble finding the ini file, go to localhost/PATH_TO/debugger-showcase/public/phpinfo in the browser and
look for `Loaded Configuration File`

## Debug
![Phone icon](https://github.com/DrewThomasCorps/debugger-showcase/blob/master/public/phone-icon.png?raw=true)
* Press the Phone icon with the red cancel circle and green bug in the top left of PHPStorm
* Go to line 18 of src/controllers/DirectoryTraverserController.php
  * Press ⌘ + fn + F8
  * You can also click to the left of the line to toggle the breakpoint on and off
* Go back to chrome and set the debug-helper to debug mode
![Debug icon](https://github.com/DrewThomasCorps/debugger-showcase/blob/master/public/debug-helper.png?raw=true)
* Go to localhost/PATH_TO/debugger-showcase/public/directory in the browser
* You should be able to accept incoming requests in your IDE and then it should break at the breakpoint

