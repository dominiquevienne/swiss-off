# swissOff
Library used to know if a day is off in a given Swiss Canton

## Installation
### Recommended
Go to you project root directory and use composer using this command
```
composer require dominiquevienne/swiss-off
```
Then create your application bootstrap using this kind of code
```php
<?php
require __DIR__ . '/vendor/autoload.php';

$oCanton  = new Dominiquevienne\SwissOff\Canton();
echo date('Y-m-d H:i:s',$oCanton->getNextDayOffByCanton('VD'));
```
### Manual installation
- Download latest stable release on [Github](https://github.com/dominiquevienne/swiss-off/releases)
- Uncompress the downloaded file
- Place content into your project
- Use similar code to load object
```php
<?php
require __DIR__ . '/swiss-off/src/SwissOff.php';
require __DIR__ . '/swiss-off/src/Canton.php';

$oCanton  = new Dominiquevienne\SwissOff\Canton();
echo date('Y-m-d H:i:s',$oCanton->getNextDayOffByCanton('VD'));
```
### Laravel
Using swissOff in Laravel is as simple as a
```
composer require dominiquevienne/swiss-off
```
and add the following lines in your class
```php
<?php
use Dominiquevienne\SwissOff\Canton;

class yourController {
  public function show() {
    /** some code of yours */
    $oCanton  = new Canton();
    return date('Y-m-d H:i:s',$oCanton->getNextDayOffByCanton('VD'));
  }
}
```
## Available functions
### Canton
#### getDaysOffByCantonAndTime($canton, $time = null)
This function will return an array containing every day off of the year of the given time for the specified canton (two letters code). 

If no time is given, current time will be used. 
#### getDaysOffNames()
This function will return an array containing all days off machine name (eg. Christmas, Berchtold, ...)
#### getCantonsByDayOffName($dayOffName)
This function will return an array containing all cantons that are off for this day off. 