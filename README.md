# Laravel Packagist

[![Latest Stable Version](https://poser.pugx.org/ingress-it-solutions/laravel-packagist/v/stable)](https://packagist.org/packages/ingress-it-solutions/laravel-packagist)
[![Total Downloads](https://poser.pugx.org/ingress-it-solutions/laravel-packagist/downloads)](https://packagist.org/packages/ingress-it-solutions/laravel-packagist)

A Laravel wrapper for the [spatie/packagist-api](https://github.com/spatie/packagist-api) package.

## Installation
You can install this package with composer:

```shell
composer require ingress-it-solutions/laravel-packagist
```

Laravel uses Package auto-discovery, so you don't have to register the service provider. If you want to register the service provider manually, add the following line to your `config/app.php` file:

```php
IngressITSolutions\Packagist\PackagistServiceProvider::class,
```

## Usage

There are two main ways how you can make Packagist calls:

**Using the application container**

```php
/** @var \Spatie\Packagist\PackagistClient $client */
$client = app(\Spatie\Packagist\PackagistClient::class);

$client->getPackage('ingress-it-solutions', 'laravel-packagist');
```

**Using the facade**
```php
Packagist::getPackage('ingress-it-solutions', 'laravel-packagist');
```
### Available methods

**List package names**
```php
// All packages
Packagist::getPackagesNames();

// Filter on type.
Packagist::getPackagesNamesByType('composer-plugin');

// Filter on organization
Packagist::getPackagesNamesByVendor('ingress-it-solutions');
```

**Searching for packages**
```php
// Search packages by name.
Packagist::searchPackagesByName('packagist');

// Search packages by tag.
Packagist::searchPackagesByTags('psr-3');

// Search packages by type.
Packagist::searchPackagesByType('composer-plugin');

// Combined search.
Packagist::searchPackages('packagist', ['type' => 'library']);
```

**Pagination**

Searching for packages returns a paginated result. You can change the pagination settings by adding more parameters.

```php
// Get the third page, 10 items per page.
Packagist::searchPackagesByName('packagist', 3, 10);
```

**Getting package data.**
```php
// Using the Composer metadata. (faster, but less data)
Packagist::getPackageMetadata('ingress-it-solutions/laravel-packagist');
Packagist::getPackageMetadata('ingress-it-solutions', 'laravel-packagist');

// Using the API. (slower, cached for 12 hours by Packagist.
Packagist::getPackage('ingress-it-solutions/laravel-packagist');
Packagist::getPackage('ingress-it-solutions', 'laravel-packagist');
```

**Get Statistics**
```php
$packagist->getStatistics();
```

## Configuration
By default, the api url for Packagist is set to `https://packagist.org`. If you want to override that, you can add the following code block to your `config/services.php` file:

```php
'packagist' => [
    'base_url' => 'https://packagist.org',
    'repo_url' => 'https://repo.packagist.org',
],
```
