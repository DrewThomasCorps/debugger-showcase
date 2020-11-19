# Debugger Showcase
## Setup
* `cd` into MAMP/htdocs
* `git clone https://github.com/DrewThomasCorps/debugger-showcase.git && cd debugger-showcase`
* `composer install`
* Visit localhost/PATH_TO/debugger-showcase/public/hello in the browser (with MAMP running) and make sure it says Hello
* Install the [Xdebug helper](https://chrome.google.com/webstore/detail/xdebug-helper/eadndfjplgieldjbigjakmdgkmoaaaoc?hl=en) for chrome

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

