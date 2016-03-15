# klipfolio-api-php
Integrate Klipfolio with your PHP project with this easy library!


## Installation
Install the latest version using [Composer](http://getcomposer.org/) by running `composer require expandonline/klipfolio-api`

## Usage
```php
<?php
use ExpandOnline\KlipfolioApi\Klipfolio;
use ExpandOnline\KlipfolioApi\Client;
use ExpandOnline\KlipfolioApi\Connector\User\UserConnector;

// Get a user from klipfolio with id 123abc

$client = new Client('api_url', 'api_key', new GuzzleClient());
$klipfolio = new Klipfolio($client);

$user = $klipfolio->get((new UserConnector())->setId('123abc'));

echo $user->company;
// Output: Expand Online
```

## Tests
Run the tests from the project root with `php vendor/bin/phpunit`
