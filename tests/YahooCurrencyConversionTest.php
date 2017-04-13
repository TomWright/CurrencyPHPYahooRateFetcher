<?php

use PHPUnit\Framework\TestCase;
use TomWright\CurrencyPHP\ConversionRateFetcherInterface;
use TomWright\CurrencyPHP\Currency;
use TomWright\CurrencyPHP\Exception\UnhandledConversionRate;
use TomWright\CurrencyPHP\YahooRateFetcher\YahooRateFetcher;

class YahooCurrencyConversionTest extends TestCase
{

    public function testCurrencyConversion()
    {
        $rateFetcher = new YahooRateFetcher();

        $gbp = new Currency('GBP', $rateFetcher);
        $usd = new Currency('USD', $rateFetcher);

        $this->assertTrue(is_numeric($gbp->convertTo($usd, 100)));
        $this->assertTrue(is_numeric($usd->convertTo($gbp, 125.26)));
    }

}