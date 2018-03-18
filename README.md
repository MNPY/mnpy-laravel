# MNPY SDK Laravel Wrapper
> Laravel 5 wrapper around the MNPY SDK

## Requirements

* PHP >= 7.0
* A [MNPY](https://mnpy.io/) account

## Installation

Add the package to the requirements of your composer file.

```sh
composer require mnpy/mnpy-laravel
``` 

Add the Service Provider to your `config/app.php` (not applicable for Laravel 5.5 and higher)

```php
MNPY\Laravel\MNPYServiceProvider::class
```

If you wish to use Facades instead of Dependency Injection you should add the following to your `config/app.php` file.

```php
'MNPYTransaction' => MNPY\Laravel\Facades\MNPYTransaction::class,
'MNPYPrice' => MNPY\Laravel\Facades\MNPYPrice::class
'MNPYToken' => MNPY\Laravel\Facades\MNPYToken::class
```

Now publish the config (or add `MNPY_API_KEY` to your .env file)
```sh
php artisan vendor:publish --provider="MNPY\Laravel\MNPYServiceProvider"
``` 

## Usage

This package serves as wrapper for [mnpy/mnpy-php-api-sdk](https://github.com/MNPY/mnpy-php-api-sdk). Please refer to the original package for documentation regarding usage.

----

Depency Injection

```php
use MNPY\SDK\Transaction;

class Foo {
    protected $transaction;

    public function __construct(Transaction $transaction) {
        $this->transaction = $transaction;
    }
    
    public function bar($transaction_id) {
        return $this->transaction->get($transaction_id);
    }
}
```

Facades

```php
use MNPY\Laravel\Facades\MNPYTransaction;

class Foo {
    protected $transaction;

    public function bar($transaction_id) {
        return MNPYTransaction::get($transaction_id);
    }
}
```