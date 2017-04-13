<?php


namespace TomWright\CurrencyPHP\YahooRateFetcher;


use TomWright\CurrencyPHP\ConversionRateFetcherInterface;
use TomWright\CurrencyPHP\Currency;
use TomWright\CurrencyPHP\YahooRateFetcher\Exception\InvalidApiResponse;

class YahooRateFetcher implements ConversionRateFetcherInterface
{

    /**
     * Gets the Currency conversion rate between $from and $to.
     * @param Currency $from
     * @param Currency $to
     * @return float|null
     * @throws InvalidApiResponse
     */
    public function getConversionRate(Currency $from, Currency $to)
    {
        $url = "http://query.yahooapis.com/v1/public/yql";
        $params = [
            'q' => "select * from yahoo.finance.xchange where pair in (\"{$from->getCurrencyCode()}{$to->getCurrencyCode()}\")",
            'env' => 'store://datatables.org/alltableswithkeys',
            'format' => 'json',
        ];
        $paramsString = http_build_query($params);

        $ch = curl_init();
        $ops = [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $paramsString,
        ];
        curl_setopt_array($ch, $ops);
        $result = curl_exec($ch);

        if (! (is_string($result) && strlen($result) > 0)) {
            throw new InvalidApiResponse('Invalid Yahoo API Response.');
        }

        $resultObject = json_decode($result);
        if (! is_object($resultObject)) {
            throw new InvalidApiResponse('Invalid Yahoo API Response. Not valid JSON.');
        }
        if (! isset($resultObject->query->results->rate->Rate)) {
            return null;
        }

        return $resultObject->query->results->rate->Rate;
    }
}
