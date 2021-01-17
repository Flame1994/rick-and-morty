<?php
namespace App\Traits;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\Log;

/**
 */
trait API
{
    /**
     * @return string
     * @throws Exception
     */
    protected function baseUrl(): string
    {
        throw new Exception('Base URL for API should be specified');
    }

    /**
     * @param array $filters
     *
     * @return string
     */
    protected function filterUrl(array $filters): string
    {
        $filterUrl = '?';

        foreach ($filters as $filterKey => $filter) {
            $filterUrl .= '&' . $filterKey . '=' . $filter;
        }

        return $filterUrl;
    }

    /**
     * @param string $method
     * @param $url
     *
     * @return mixed|null
     */
    protected function request(string $method, $url)
    {
        Log::info($url);
        try {
            $client = new Client();
            $response = json_decode($client->request($method, $url)->getBody()->getContents(), true);

            Log::info('Got a response');
            return $response;
        } catch (GuzzleException $exception) {
            Log::info('No response');
            return null;
        }
    }
}
