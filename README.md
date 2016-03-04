# klipfolio-api-php
Integrate Klipfolio with your PHP project with this easy library!


## Installation
Install the latest version using [Composer](http://getcomposer.org/) by running `composer require expandonline/klipfolio-api`

## Usage
```php
<?php

use ExpandOnline\KlipfolioApi\Client;
use ExpandOnline\KlipfolioApi\Objects\User;
use GuzzleHttp\Client as GuzzleClient;

$client = new Client('api_key', new GuzzleClient());
$user = new User('user_id', $client);

$user = $user->read();

echo $user->company;
// Output: Expand Online
```

## Tests
Run the tests from the project root with `php vendor/bin/phpunit`
