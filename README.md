# CurrencyPHP Yahoo Rate Fetcher

[![Build Status](https://travis-ci.org/TomWright/CurrencyPHPYahooRateFetcher.svg?branch=master)](https://travis-ci.org/TomWright/CurrencyPHPYahooRateFetcher)
[![Latest Stable Version](https://poser.pugx.org/tomwright/currency-php-yahoo-rate-fetcher/v/stable)](https://packagist.org/packages/tomwright/currency-php-yahoo-rate-fetcher)
[![Total Downloads](https://poser.pugx.org/tomwright/currency-php-yahoo-rate-fetcher/downloads)](https://packagist.org/packages/tomwright/currency-php-yahoo-rate-fetcher)
[![Monthly Downloads](https://poser.pugx.org/tomwright/currency-php-yahoo-rate-fetcher/d/monthly)](https://packagist.org/packages/tomwright/currency-php-yahoo-rate-fetcher)
[![Daily Downloads](https://poser.pugx.org/tomwright/currency-php-yahoo-rate-fetcher/d/daily)](https://packagist.org/packages/tomwright/currency-php-yahoo-rate-fetcher)
[![License](https://poser.pugx.org/tomwright/currency-php-yahoo-rate-fetcher/license.svg)](https://packagist.org/packages/tomwright/currency-php-yahoo-rate-fetcher)

## Installation

Install [CurrencyPHP](https://github.com/TomWright/CurrencyPHP).
```
composer require tomwright/currency-php
composer require tomwright/currency-php-yahoo-rate-fetcher
```

## Usage

YahooRateFetcher is just a RateFetcher for [CurrencyPHP](https://github.com/TomWright/CurrencyPHP).

```php

$rateFetcher = new YahooRateFetcher();

$gbp = new Currency('GBP', $rateFetcher);
$usd = new Currency('USD', $rateFetcher);

$priceInGBP = 100;
$priceInUSD = $gbp->convertTo($usd, $priceInGBP);
echo $priceInUSD; // 126
```
