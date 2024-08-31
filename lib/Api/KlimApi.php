<?php
/**
 * KlimApi
 *
 * @category Class
 * @package  KlimAPI
 * @author   KlimAPI Team
 * @link     https://klimapi.com
 */

/**
 * KlimAPI - Calculation & Compensation API
 *
 * This API offers you the possibility to calculate and offset emissions, create checkout links, get statistics and much more.
 *
 * KlimAPI Version: v2
 * Contact: tech@klimapi.com
 */


namespace KlimAPI\Api;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use KlimAPI\ApiException;
use KlimAPI\Configuration;
use KlimAPI\HeaderSelector;
use KlimAPI\ObjectSerializer;

/**
 * KlimApi Class Doc Comment
 *
 * @category Class
 * @package  KlimAPI
 * @author   KlimAPI Team
 * @link     https://klimapi.com
 */
class KlimApi
{
    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var Configuration
     */
    protected $config;

    /**
     * @var HeaderSelector
     */
    protected $headerSelector;

    /**
     * @var int Host index
     */
    protected $hostIndex;

    /** @var string[] $contentTypes **/
    public const contentTypes = [
        'addWebhook' => [
            'application/json',
        ],
        'calculate' => [
            'application/json',
        ],
        'calculateCart' => [
            'application/json',
        ],
        'getCategories' => [
            'application/json',
        ],
        'getCertificationAuthorities' => [
            'application/json',
        ],
        'getMetrics' => [
            'application/json',
        ],
        'getOrder' => [
            'application/json',
        ],
        'getOrders' => [
            'application/json',
        ],
        'getPaymentLink' => [
            'application/json',
        ],
        'getProject' => [
            'application/json',
        ],
        'getProjects' => [
            'application/json',
        ],
        'linkByCalculation' => [
            'application/json',
        ],
        'linkByCarbon' => [
            'application/json',
        ],
        'linkByPrice' => [
            'application/json',
        ],
        'me' => [
            'application/json',
        ],
        'orderByCalculation' => [
            'application/json',
        ],
        'orderByCarbon' => [
            'application/json',
        ],
        'orderByPrice' => [
            'application/json',
        ],
        'pendingByCalculation' => [
            'application/json',
        ],
        'pendingByCarbon' => [
            'application/json',
        ],
        'pendingByPrice' => [
            'application/json',
        ],
        'process' => [
            'application/json',
        ],
        'processCart' => [
            'application/json',
        ],
        'refund' => [
            'application/json',
        ],
        'removeWebhook' => [
            'application/json',
        ],
        'syncBulkStore' => [
            'application/json',
        ],
        'syncStore' => [
            'application/json',
        ],
    ];

    /**
     * @param $api_key
     * @param Configuration|null    $config
     * @param HeaderSelector|null   $selector
     * @param ClientInterface|null  $client
     * @param int                   $hostIndex (Optional) host index to select the list of hosts if defined in the OpenAPI spec
     */
    public function __construct(
        $api_key,
        Configuration $config = null,
        HeaderSelector $selector = null,
        ClientInterface $client = null,
        int $hostIndex = 0
    ) {
        if (is_null($config)) {
            $this->config = Configuration::getDefaultConfiguration()->setApiKey('X-API-KEY', $api_key);
        } else {
            $this->config = $config->setApiKey('X-API-KEY', $api_key);
        }

        $this->client = $client ?: new Client();
        $this->headerSelector = $selector ?: new HeaderSelector();
        $this->hostIndex = $hostIndex;
    }

    /**
     * Set the host index
     *
     * @param int $hostIndex Host index (required)
     */
    public function setHostIndex($hostIndex): void
    {
        $this->hostIndex = $hostIndex;
    }

    /**
     * Get the host index
     *
     * @return int Host index
     */
    public function getHostIndex()
    {
        return $this->hostIndex;
    }

    /**
     * @return Configuration
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * Operation addWebhook
     *
     * Add Webhook
     *
     * @param  \KlimAPI\Model\AddWebhookRequest $addWebhookRequest addWebhookRequest (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['addWebhook'] to see the possible values for this operation
     *
     * @throws \KlimAPI\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return void
     */
    public function addWebhook($addWebhookRequest, string $contentType = self::contentTypes['addWebhook'][0])
    {
        $this->addWebhookWithHttpInfo($addWebhookRequest, $contentType);
    }

    /**
     * Operation addWebhookWithHttpInfo
     *
     * Add Webhook
     *
     * @param  \KlimAPI\Model\AddWebhookRequest $addWebhookRequest (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['addWebhook'] to see the possible values for this operation
     *
     * @throws \KlimAPI\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function addWebhookWithHttpInfo($addWebhookRequest, string $contentType = self::contentTypes['addWebhook'][0])
    {
        $request = $this->addWebhookRequest($addWebhookRequest, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            return [null, $statusCode, $response->getHeaders()];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
            }
            throw $e;
        }
    }

    /**
     * Operation addWebhookAsync
     *
     * Add Webhook
     *
     * @param  \KlimAPI\Model\AddWebhookRequest $addWebhookRequest (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['addWebhook'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function addWebhookAsync($addWebhookRequest, string $contentType = self::contentTypes['addWebhook'][0])
    {
        return $this->addWebhookAsyncWithHttpInfo($addWebhookRequest, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation addWebhookAsyncWithHttpInfo
     *
     * Add Webhook
     *
     * @param  \KlimAPI\Model\AddWebhookRequest $addWebhookRequest (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['addWebhook'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function addWebhookAsyncWithHttpInfo($addWebhookRequest, string $contentType = self::contentTypes['addWebhook'][0])
    {
        $returnType = '';
        $request = $this->addWebhookRequest($addWebhookRequest, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'addWebhook'
     *
     * @param  \KlimAPI\Model\AddWebhookRequest $addWebhookRequest (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['addWebhook'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function addWebhookRequest($addWebhookRequest, string $contentType = self::contentTypes['addWebhook'][0])
    {

        // verify the required parameter 'addWebhookRequest' is set
        if ($addWebhookRequest === null || (is_array($addWebhookRequest) && count($addWebhookRequest) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $addWebhookRequest when calling addWebhook'
            );
        }


        $resourcePath = '/webhooks/add';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;





        $headers = $this->headerSelector->selectHeaders(
            [],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($addWebhookRequest)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($addWebhookRequest));
            } else {
                $httpBody = $addWebhookRequest;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('X-API-KEY');
        if ($apiKey !== null) {
            $headers['X-API-KEY'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'POST',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation calculate
     *
     * Calculate
     *
     * @param  \KlimAPI\Model\CalculateRequest $calculateRequest Choose up to 100 Elements from the **[Calculation Options](https://klimapi.com/resources/factors)**. In this example it is just **Travel by Car**. (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['calculate'] to see the possible values for this operation
     *
     * @throws \KlimAPI\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \KlimAPI\Model\CalculationResults
     */
    public function calculate($calculateRequest, string $contentType = self::contentTypes['calculate'][0])
    {
        list($response) = $this->calculateWithHttpInfo($calculateRequest, $contentType);
        return $response;
    }

    /**
     * Operation calculateWithHttpInfo
     *
     * Calculate
     *
     * @param  \KlimAPI\Model\CalculateRequest $calculateRequest Choose up to 100 Elements from the **[Calculation Options](https://klimapi.com/resources/factors)**. In this example it is just **Travel by Car**. (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['calculate'] to see the possible values for this operation
     *
     * @throws \KlimAPI\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \KlimAPI\Model\CalculationResults, HTTP status code, HTTP response headers (array of strings)
     */
    public function calculateWithHttpInfo($calculateRequest, string $contentType = self::contentTypes['calculate'][0])
    {
        $request = $this->calculateRequest($calculateRequest, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 200:
                    if ('\KlimAPI\Model\CalculationResults' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\KlimAPI\Model\CalculationResults' !== 'string') {
                            try {
                                $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                            } catch (\JsonException $exception) {
                                throw new ApiException(
                                    sprintf(
                                        'Error JSON decoding server response (%s)',
                                        $request->getUri()
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $content
                                );
                            }
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\KlimAPI\Model\CalculationResults', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\KlimAPI\Model\CalculationResults';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    try {
                        $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                    } catch (\JsonException $exception) {
                        throw new ApiException(
                            sprintf(
                                'Error JSON decoding server response (%s)',
                                $request->getUri()
                            ),
                            $statusCode,
                            $response->getHeaders(),
                            $content
                        );
                    }
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\KlimAPI\Model\CalculationResults',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation calculateAsync
     *
     * Calculate
     *
     * @param  \KlimAPI\Model\CalculateRequest $calculateRequest Choose up to 100 Elements from the **[Calculation Options](https://klimapi.com/resources/factors)**. In this example it is just **Travel by Car**. (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['calculate'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function calculateAsync($calculateRequest, string $contentType = self::contentTypes['calculate'][0])
    {
        return $this->calculateAsyncWithHttpInfo($calculateRequest, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation calculateAsyncWithHttpInfo
     *
     * Calculate
     *
     * @param  \KlimAPI\Model\CalculateRequest $calculateRequest Choose up to 100 Elements from the **[Calculation Options](https://klimapi.com/resources/factors)**. In this example it is just **Travel by Car**. (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['calculate'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function calculateAsyncWithHttpInfo($calculateRequest, string $contentType = self::contentTypes['calculate'][0])
    {
        $returnType = '\KlimAPI\Model\CalculationResults';
        $request = $this->calculateRequest($calculateRequest, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'calculate'
     *
     * @param  \KlimAPI\Model\CalculateRequest $calculateRequest Choose up to 100 Elements from the **[Calculation Options](https://klimapi.com/resources/factors)**. In this example it is just **Travel by Car**. (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['calculate'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function calculateRequest($calculateRequest, string $contentType = self::contentTypes['calculate'][0])
    {

        // verify the required parameter 'calculateRequest' is set
        if ($calculateRequest === null || (is_array($calculateRequest) && count($calculateRequest) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $calculateRequest when calling calculate'
            );
        }


        $resourcePath = '/calculate';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;





        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($calculateRequest)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($calculateRequest));
            } else {
                $httpBody = $calculateRequest;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('X-API-KEY');
        if ($apiKey !== null) {
            $headers['X-API-KEY'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'POST',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation calculateCart
     *
     * Calculate
     *
     * @param  \KlimAPI\Model\CartItem[] $cartItem cartItem (required)
     * @param  string $storeIdent Setup a new store **[here](https://klimapi.com/dashboard/ecommerce)** to get a store ident (required)
     * @param  string $locale The locale in which the response should be returned (optional, default to 'DE')
     * @param  string $currency The currency of the returned offset price (optional, default to 'EUR')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['calculateCart'] to see the possible values for this operation
     *
     * @throws \KlimAPI\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \KlimAPI\Model\CartResult
     */
    public function calculateCart($cartItem, $storeIdent, $locale = 'DE', $currency = 'EUR', string $contentType = self::contentTypes['calculateCart'][0])
    {
        list($response) = $this->calculateCartWithHttpInfo($cartItem, $storeIdent, $locale, $currency, $contentType);
        return $response;
    }

    /**
     * Operation calculateCartWithHttpInfo
     *
     * Calculate
     *
     * @param  \KlimAPI\Model\CartItem[] $cartItem (required)
     * @param  string $storeIdent Setup a new store **[here](https://klimapi.com/dashboard/ecommerce)** to get a store ident (required)
     * @param  string $locale The locale in which the response should be returned (optional, default to 'DE')
     * @param  string $currency The currency of the returned offset price (optional, default to 'EUR')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['calculateCart'] to see the possible values for this operation
     *
     * @throws \KlimAPI\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \KlimAPI\Model\CartResult, HTTP status code, HTTP response headers (array of strings)
     */
    public function calculateCartWithHttpInfo($cartItem, $storeIdent, $locale = 'DE', $currency = 'EUR', string $contentType = self::contentTypes['calculateCart'][0])
    {
        $request = $this->calculateCartRequest($cartItem, $storeIdent, $locale, $currency, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 200:
                    if ('\KlimAPI\Model\CartResult' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\KlimAPI\Model\CartResult' !== 'string') {
                            try {
                                $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                            } catch (\JsonException $exception) {
                                throw new ApiException(
                                    sprintf(
                                        'Error JSON decoding server response (%s)',
                                        $request->getUri()
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $content
                                );
                            }
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\KlimAPI\Model\CartResult', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\KlimAPI\Model\CartResult';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    try {
                        $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                    } catch (\JsonException $exception) {
                        throw new ApiException(
                            sprintf(
                                'Error JSON decoding server response (%s)',
                                $request->getUri()
                            ),
                            $statusCode,
                            $response->getHeaders(),
                            $content
                        );
                    }
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\KlimAPI\Model\CartResult',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation calculateCartAsync
     *
     * Calculate
     *
     * @param  \KlimAPI\Model\CartItem[] $cartItem (required)
     * @param  string $storeIdent Setup a new store **[here](https://klimapi.com/dashboard/ecommerce)** to get a store ident (required)
     * @param  string $locale The locale in which the response should be returned (optional, default to 'DE')
     * @param  string $currency The currency of the returned offset price (optional, default to 'EUR')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['calculateCart'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function calculateCartAsync($cartItem, $storeIdent, $locale = 'DE', $currency = 'EUR', string $contentType = self::contentTypes['calculateCart'][0])
    {
        return $this->calculateCartAsyncWithHttpInfo($cartItem, $storeIdent, $locale, $currency, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation calculateCartAsyncWithHttpInfo
     *
     * Calculate
     *
     * @param  \KlimAPI\Model\CartItem[] $cartItem (required)
     * @param  string $storeIdent Setup a new store **[here](https://klimapi.com/dashboard/ecommerce)** to get a store ident (required)
     * @param  string $locale The locale in which the response should be returned (optional, default to 'DE')
     * @param  string $currency The currency of the returned offset price (optional, default to 'EUR')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['calculateCart'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function calculateCartAsyncWithHttpInfo($cartItem, $storeIdent, $locale = 'DE', $currency = 'EUR', string $contentType = self::contentTypes['calculateCart'][0])
    {
        $returnType = '\KlimAPI\Model\CartResult';
        $request = $this->calculateCartRequest($cartItem, $storeIdent, $locale, $currency, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'calculateCart'
     *
     * @param  \KlimAPI\Model\CartItem[] $cartItem (required)
     * @param  string $storeIdent Setup a new store **[here](https://klimapi.com/dashboard/ecommerce)** to get a store ident (required)
     * @param  string $locale The locale in which the response should be returned (optional, default to 'DE')
     * @param  string $currency The currency of the returned offset price (optional, default to 'EUR')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['calculateCart'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function calculateCartRequest($cartItem, $storeIdent, $locale = 'DE', $currency = 'EUR', string $contentType = self::contentTypes['calculateCart'][0])
    {

        // verify the required parameter 'cartItem' is set
        if ($cartItem === null || (is_array($cartItem) && count($cartItem) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $cartItem when calling calculateCart'
            );
        }

        // verify the required parameter 'storeIdent' is set
        if ($storeIdent === null || (is_array($storeIdent) && count($storeIdent) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $storeIdent when calling calculateCart'
            );
        }




        $resourcePath = '/stores/{store_ident}/cart';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // header params
        if ($locale !== null) {
            $headerParams['X-LOCALE'] = ObjectSerializer::toHeaderValue($locale);
        }
        // header params
        if ($currency !== null) {
            $headerParams['X-CURRENCY'] = ObjectSerializer::toHeaderValue($currency);
        }

        // path params
        if ($storeIdent !== null) {
            $resourcePath = str_replace(
                '{' . 'store_ident' . '}',
                ObjectSerializer::toPathValue($storeIdent),
                $resourcePath
            );
        }


        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($cartItem)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($cartItem));
            } else {
                $httpBody = $cartItem;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('X-API-KEY');
        if ($apiKey !== null) {
            $headers['X-API-KEY'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'POST',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getCategories
     *
     * Get all Categories
     *
     * @param  string $locale The locale in which the response should be returned (optional, default to 'DE')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getCategories'] to see the possible values for this operation
     *
     * @throws \KlimAPI\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \KlimAPI\Model\Category[]
     */
    public function getCategories($locale = 'DE', string $contentType = self::contentTypes['getCategories'][0])
    {
        list($response) = $this->getCategoriesWithHttpInfo($locale, $contentType);
        return $response;
    }

    /**
     * Operation getCategoriesWithHttpInfo
     *
     * Get all Categories
     *
     * @param  string $locale The locale in which the response should be returned (optional, default to 'DE')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getCategories'] to see the possible values for this operation
     *
     * @throws \KlimAPI\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \KlimAPI\Model\Category[], HTTP status code, HTTP response headers (array of strings)
     */
    public function getCategoriesWithHttpInfo($locale = 'DE', string $contentType = self::contentTypes['getCategories'][0])
    {
        $request = $this->getCategoriesRequest($locale, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 200:
                    if ('\KlimAPI\Model\Category[]' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\KlimAPI\Model\Category[]' !== 'string') {
                            try {
                                $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                            } catch (\JsonException $exception) {
                                throw new ApiException(
                                    sprintf(
                                        'Error JSON decoding server response (%s)',
                                        $request->getUri()
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $content
                                );
                            }
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\KlimAPI\Model\Category[]', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\KlimAPI\Model\Category[]';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    try {
                        $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                    } catch (\JsonException $exception) {
                        throw new ApiException(
                            sprintf(
                                'Error JSON decoding server response (%s)',
                                $request->getUri()
                            ),
                            $statusCode,
                            $response->getHeaders(),
                            $content
                        );
                    }
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\KlimAPI\Model\Category[]',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getCategoriesAsync
     *
     * Get all Categories
     *
     * @param  string $locale The locale in which the response should be returned (optional, default to 'DE')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getCategories'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getCategoriesAsync($locale = 'DE', string $contentType = self::contentTypes['getCategories'][0])
    {
        return $this->getCategoriesAsyncWithHttpInfo($locale, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getCategoriesAsyncWithHttpInfo
     *
     * Get all Categories
     *
     * @param  string $locale The locale in which the response should be returned (optional, default to 'DE')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getCategories'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getCategoriesAsyncWithHttpInfo($locale = 'DE', string $contentType = self::contentTypes['getCategories'][0])
    {
        $returnType = '\KlimAPI\Model\Category[]';
        $request = $this->getCategoriesRequest($locale, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'getCategories'
     *
     * @param  string $locale The locale in which the response should be returned (optional, default to 'DE')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getCategories'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function getCategoriesRequest($locale = 'DE', string $contentType = self::contentTypes['getCategories'][0])
    {



        $resourcePath = '/categories';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // header params
        if ($locale !== null) {
            $headerParams['X-LOCALE'] = ObjectSerializer::toHeaderValue($locale);
        }



        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('X-API-KEY');
        if ($apiKey !== null) {
            $headers['X-API-KEY'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'GET',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getCertificationAuthorities
     *
     * Get all Certification Authorities
     *
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getCertificationAuthorities'] to see the possible values for this operation
     *
     * @throws \KlimAPI\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \KlimAPI\Model\CertificationAuthority[]
     */
    public function getCertificationAuthorities(string $contentType = self::contentTypes['getCertificationAuthorities'][0])
    {
        list($response) = $this->getCertificationAuthoritiesWithHttpInfo($contentType);
        return $response;
    }

    /**
     * Operation getCertificationAuthoritiesWithHttpInfo
     *
     * Get all Certification Authorities
     *
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getCertificationAuthorities'] to see the possible values for this operation
     *
     * @throws \KlimAPI\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \KlimAPI\Model\CertificationAuthority[], HTTP status code, HTTP response headers (array of strings)
     */
    public function getCertificationAuthoritiesWithHttpInfo(string $contentType = self::contentTypes['getCertificationAuthorities'][0])
    {
        $request = $this->getCertificationAuthoritiesRequest($contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 200:
                    if ('\KlimAPI\Model\CertificationAuthority[]' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\KlimAPI\Model\CertificationAuthority[]' !== 'string') {
                            try {
                                $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                            } catch (\JsonException $exception) {
                                throw new ApiException(
                                    sprintf(
                                        'Error JSON decoding server response (%s)',
                                        $request->getUri()
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $content
                                );
                            }
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\KlimAPI\Model\CertificationAuthority[]', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\KlimAPI\Model\CertificationAuthority[]';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    try {
                        $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                    } catch (\JsonException $exception) {
                        throw new ApiException(
                            sprintf(
                                'Error JSON decoding server response (%s)',
                                $request->getUri()
                            ),
                            $statusCode,
                            $response->getHeaders(),
                            $content
                        );
                    }
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\KlimAPI\Model\CertificationAuthority[]',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getCertificationAuthoritiesAsync
     *
     * Get all Certification Authorities
     *
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getCertificationAuthorities'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getCertificationAuthoritiesAsync(string $contentType = self::contentTypes['getCertificationAuthorities'][0])
    {
        return $this->getCertificationAuthoritiesAsyncWithHttpInfo($contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getCertificationAuthoritiesAsyncWithHttpInfo
     *
     * Get all Certification Authorities
     *
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getCertificationAuthorities'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getCertificationAuthoritiesAsyncWithHttpInfo(string $contentType = self::contentTypes['getCertificationAuthorities'][0])
    {
        $returnType = '\KlimAPI\Model\CertificationAuthority[]';
        $request = $this->getCertificationAuthoritiesRequest($contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'getCertificationAuthorities'
     *
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getCertificationAuthorities'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function getCertificationAuthoritiesRequest(string $contentType = self::contentTypes['getCertificationAuthorities'][0])
    {


        $resourcePath = '/certification_authorities';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;





        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('X-API-KEY');
        if ($apiKey !== null) {
            $headers['X-API-KEY'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'GET',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getMetrics
     *
     * Order Metrics
     *
     * @param  \KlimAPI\Model\GetMetricsRequest $getMetricsRequest  (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getMetrics'] to see the possible values for this operation
     *
     * @throws \KlimAPI\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \KlimAPI\Model\OrderMetrics
     */
    public function getMetrics($getMetricsRequest, string $contentType = self::contentTypes['getMetrics'][0])
    {
        list($response) = $this->getMetricsWithHttpInfo($getMetricsRequest, $contentType);
        return $response;
    }

    /**
     * Operation getMetricsWithHttpInfo
     *
     * Order Metrics
     *
     * @param  \KlimAPI\Model\GetMetricsRequest $getMetricsRequest  (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getMetrics'] to see the possible values for this operation
     *
     * @throws \KlimAPI\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \KlimAPI\Model\OrderMetrics, HTTP status code, HTTP response headers (array of strings)
     */
    public function getMetricsWithHttpInfo($getMetricsRequest, string $contentType = self::contentTypes['getMetrics'][0])
    {
        $request = $this->getMetricsRequest($getMetricsRequest, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 200:
                    if ('\KlimAPI\Model\OrderMetrics' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\KlimAPI\Model\OrderMetrics' !== 'string') {
                            try {
                                $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                            } catch (\JsonException $exception) {
                                throw new ApiException(
                                    sprintf(
                                        'Error JSON decoding server response (%s)',
                                        $request->getUri()
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $content
                                );
                            }
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\KlimAPI\Model\OrderMetrics', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\KlimAPI\Model\OrderMetrics';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    try {
                        $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                    } catch (\JsonException $exception) {
                        throw new ApiException(
                            sprintf(
                                'Error JSON decoding server response (%s)',
                                $request->getUri()
                            ),
                            $statusCode,
                            $response->getHeaders(),
                            $content
                        );
                    }
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\KlimAPI\Model\OrderMetrics',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getMetricsAsync
     *
     * Order Metrics
     *
     * @param  \KlimAPI\Model\GetMetricsRequest $getMetricsRequest  (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getMetrics'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getMetricsAsync($getMetricsRequest, string $contentType = self::contentTypes['getMetrics'][0])
    {
        return $this->getMetricsAsyncWithHttpInfo($getMetricsRequest, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getMetricsAsyncWithHttpInfo
     *
     * Order Metrics
     *
     * @param  \KlimAPI\Model\GetMetricsRequest $getMetricsRequest  (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getMetrics'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getMetricsAsyncWithHttpInfo($getMetricsRequest, string $contentType = self::contentTypes['getMetrics'][0])
    {
        $returnType = '\KlimAPI\Model\OrderMetrics';
        $request = $this->getMetricsRequest($getMetricsRequest, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'getMetrics'
     *
     * @param  \KlimAPI\Model\GetMetricsRequest $getMetricsRequest  (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getMetrics'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function getMetricsRequest($getMetricsRequest, string $contentType = self::contentTypes['getMetrics'][0])
    {

        // verify the required parameter 'getMetricsRequest' is set
        if ($getMetricsRequest === null || (is_array($getMetricsRequest) && count($getMetricsRequest) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $getMetricsRequest when calling getMetrics'
            );
        }


        $resourcePath = '/metrics';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;





        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($getMetricsRequest)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($getMetricsRequest));
            } else {
                $httpBody = $getMetricsRequest;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('X-API-KEY');
        if ($apiKey !== null) {
            $headers['X-API-KEY'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'POST',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getOrder
     *
     * Get Order
     *
     * @param  string $orderId You can get the order_id from several endpoints, for example when creating an Order. (required)
     * @param  string $locale The locale in which the response should be returned (optional, default to 'DE')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getOrder'] to see the possible values for this operation
     *
     * @throws \KlimAPI\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \KlimAPI\Model\Order
     */
    public function getOrder($orderId, $locale = 'DE', string $contentType = self::contentTypes['getOrder'][0])
    {
        list($response) = $this->getOrderWithHttpInfo($orderId, $locale, $contentType);
        return $response;
    }

    /**
     * Operation getOrderWithHttpInfo
     *
     * Get Order
     *
     * @param  string $orderId You can get the order_id from several endpoints, for example when creating an Order. (required)
     * @param  string $locale The locale in which the response should be returned (optional, default to 'DE')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getOrder'] to see the possible values for this operation
     *
     * @throws \KlimAPI\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \KlimAPI\Model\Order, HTTP status code, HTTP response headers (array of strings)
     */
    public function getOrderWithHttpInfo($orderId, $locale = 'DE', string $contentType = self::contentTypes['getOrder'][0])
    {
        $request = $this->getOrderRequest($orderId, $locale, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 200:
                    if ('\KlimAPI\Model\Order' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\KlimAPI\Model\Order' !== 'string') {
                            try {
                                $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                            } catch (\JsonException $exception) {
                                throw new ApiException(
                                    sprintf(
                                        'Error JSON decoding server response (%s)',
                                        $request->getUri()
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $content
                                );
                            }
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\KlimAPI\Model\Order', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\KlimAPI\Model\Order';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    try {
                        $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                    } catch (\JsonException $exception) {
                        throw new ApiException(
                            sprintf(
                                'Error JSON decoding server response (%s)',
                                $request->getUri()
                            ),
                            $statusCode,
                            $response->getHeaders(),
                            $content
                        );
                    }
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\KlimAPI\Model\Order',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getOrderAsync
     *
     * Get Order
     *
     * @param  string $orderId You can get the order_id from several endpoints, for example when creating an Order. (required)
     * @param  string $locale The locale in which the response should be returned (optional, default to 'DE')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getOrder'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getOrderAsync($orderId, $locale = 'DE', string $contentType = self::contentTypes['getOrder'][0])
    {
        return $this->getOrderAsyncWithHttpInfo($orderId, $locale, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getOrderAsyncWithHttpInfo
     *
     * Get Order
     *
     * @param  string $orderId You can get the order_id from several endpoints, for example when creating an Order. (required)
     * @param  string $locale The locale in which the response should be returned (optional, default to 'DE')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getOrder'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getOrderAsyncWithHttpInfo($orderId, $locale = 'DE', string $contentType = self::contentTypes['getOrder'][0])
    {
        $returnType = '\KlimAPI\Model\Order';
        $request = $this->getOrderRequest($orderId, $locale, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'getOrder'
     *
     * @param  string $orderId You can get the order_id from several endpoints, for example when creating an Order. (required)
     * @param  string $locale The locale in which the response should be returned (optional, default to 'DE')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getOrder'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function getOrderRequest($orderId, $locale = 'DE', string $contentType = self::contentTypes['getOrder'][0])
    {

        // verify the required parameter 'orderId' is set
        if ($orderId === null || (is_array($orderId) && count($orderId) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $orderId when calling getOrder'
            );
        }



        $resourcePath = '/orders/{order_id}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // header params
        if ($locale !== null) {
            $headerParams['X-LOCALE'] = ObjectSerializer::toHeaderValue($locale);
        }

        // path params
        if ($orderId !== null) {
            $resourcePath = str_replace(
                '{' . 'order_id' . '}',
                ObjectSerializer::toPathValue($orderId),
                $resourcePath
            );
        }


        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('X-API-KEY');
        if ($apiKey !== null) {
            $headers['X-API-KEY'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'GET',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getOrders
     *
     * Get Orders
     *
     * @param  \KlimAPI\Model\GetOrdersRequest $getOrdersRequest  (required)
     * @param  string $locale The locale in which the response should be returned (optional, default to 'DE')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getOrders'] to see the possible values for this operation
     *
     * @throws \KlimAPI\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \KlimAPI\Model\MetadataOrders
     */
    public function getOrders($getOrdersRequest, $locale = 'DE', string $contentType = self::contentTypes['getOrders'][0])
    {
        list($response) = $this->getOrdersWithHttpInfo($getOrdersRequest, $locale, $contentType);
        return $response;
    }

    /**
     * Operation getOrdersWithHttpInfo
     *
     * Get Orders
     *
     * @param  \KlimAPI\Model\GetOrdersRequest $getOrdersRequest  (required)
     * @param  string $locale The locale in which the response should be returned (optional, default to 'DE')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getOrders'] to see the possible values for this operation
     *
     * @throws \KlimAPI\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \KlimAPI\Model\MetadataOrders, HTTP status code, HTTP response headers (array of strings)
     */
    public function getOrdersWithHttpInfo($getOrdersRequest, $locale = 'DE', string $contentType = self::contentTypes['getOrders'][0])
    {
        $request = $this->getOrdersRequest($getOrdersRequest, $locale, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 200:
                    if ('\KlimAPI\Model\MetadataOrders' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\KlimAPI\Model\MetadataOrders' !== 'string') {
                            try {
                                $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                            } catch (\JsonException $exception) {
                                throw new ApiException(
                                    sprintf(
                                        'Error JSON decoding server response (%s)',
                                        $request->getUri()
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $content
                                );
                            }
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\KlimAPI\Model\MetadataOrders', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\KlimAPI\Model\MetadataOrders';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    try {
                        $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                    } catch (\JsonException $exception) {
                        throw new ApiException(
                            sprintf(
                                'Error JSON decoding server response (%s)',
                                $request->getUri()
                            ),
                            $statusCode,
                            $response->getHeaders(),
                            $content
                        );
                    }
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\KlimAPI\Model\MetadataOrders',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getOrdersAsync
     *
     * Get Orders
     *
     * @param  \KlimAPI\Model\GetOrdersRequest $getOrdersRequest  (required)
     * @param  string $locale The locale in which the response should be returned (optional, default to 'DE')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getOrders'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getOrdersAsync($getOrdersRequest, $locale = 'DE', string $contentType = self::contentTypes['getOrders'][0])
    {
        return $this->getOrdersAsyncWithHttpInfo($getOrdersRequest, $locale, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getOrdersAsyncWithHttpInfo
     *
     * Get Orders
     *
     * @param  \KlimAPI\Model\GetOrdersRequest $getOrdersRequest  (required)
     * @param  string $locale The locale in which the response should be returned (optional, default to 'DE')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getOrders'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getOrdersAsyncWithHttpInfo($getOrdersRequest, $locale = 'DE', string $contentType = self::contentTypes['getOrders'][0])
    {
        $returnType = '\KlimAPI\Model\MetadataOrders';
        $request = $this->getOrdersRequest($getOrdersRequest, $locale, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'getOrders'
     *
     * @param  \KlimAPI\Model\GetOrdersRequest $getOrdersRequest  (required)
     * @param  string $locale The locale in which the response should be returned (optional, default to 'DE')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getOrders'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function getOrdersRequest($getOrdersRequest, $locale = 'DE', string $contentType = self::contentTypes['getOrders'][0])
    {

        // verify the required parameter 'getOrdersRequest' is set
        if ($getOrdersRequest === null || (is_array($getOrdersRequest) && count($getOrdersRequest) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $getOrdersRequest when calling getOrders'
            );
        }



        $resourcePath = '/orders';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // header params
        if ($locale !== null) {
            $headerParams['X-LOCALE'] = ObjectSerializer::toHeaderValue($locale);
        }



        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($getOrdersRequest)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($getOrdersRequest));
            } else {
                $httpBody = $getOrdersRequest;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('X-API-KEY');
        if ($apiKey !== null) {
            $headers['X-API-KEY'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'POST',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getPaymentLink
     *
     * Get Checkout Link
     *
     * @param  string $paymentLinkId The identifier of the checkout link that you want to be returned. (required)
     * @param  string $locale The locale in which the response should be returned (optional, default to 'DE')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getPaymentLink'] to see the possible values for this operation
     *
     * @throws \KlimAPI\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \KlimAPI\Model\CheckoutLink
     */
    public function getPaymentLink($paymentLinkId, $locale = 'DE', string $contentType = self::contentTypes['getPaymentLink'][0])
    {
        list($response) = $this->getPaymentLinkWithHttpInfo($paymentLinkId, $locale, $contentType);
        return $response;
    }

    /**
     * Operation getPaymentLinkWithHttpInfo
     *
     * Get Checkout Link
     *
     * @param  string $paymentLinkId The identifier of the checkout link that you want to be returned. (required)
     * @param  string $locale The locale in which the response should be returned (optional, default to 'DE')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getPaymentLink'] to see the possible values for this operation
     *
     * @throws \KlimAPI\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \KlimAPI\Model\CheckoutLink, HTTP status code, HTTP response headers (array of strings)
     */
    public function getPaymentLinkWithHttpInfo($paymentLinkId, $locale = 'DE', string $contentType = self::contentTypes['getPaymentLink'][0])
    {
        $request = $this->getPaymentLinkRequest($paymentLinkId, $locale, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 200:
                    if ('\KlimAPI\Model\CheckoutLink' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\KlimAPI\Model\CheckoutLink' !== 'string') {
                            try {
                                $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                            } catch (\JsonException $exception) {
                                throw new ApiException(
                                    sprintf(
                                        'Error JSON decoding server response (%s)',
                                        $request->getUri()
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $content
                                );
                            }
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\KlimAPI\Model\CheckoutLink', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\KlimAPI\Model\CheckoutLink';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    try {
                        $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                    } catch (\JsonException $exception) {
                        throw new ApiException(
                            sprintf(
                                'Error JSON decoding server response (%s)',
                                $request->getUri()
                            ),
                            $statusCode,
                            $response->getHeaders(),
                            $content
                        );
                    }
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\KlimAPI\Model\CheckoutLink',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getPaymentLinkAsync
     *
     * Get Checkout Link
     *
     * @param  string $paymentLinkId The identifier of the checkout link that you want to be returned. (required)
     * @param  string $locale The locale in which the response should be returned (optional, default to 'DE')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getPaymentLink'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getPaymentLinkAsync($paymentLinkId, $locale = 'DE', string $contentType = self::contentTypes['getPaymentLink'][0])
    {
        return $this->getPaymentLinkAsyncWithHttpInfo($paymentLinkId, $locale, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getPaymentLinkAsyncWithHttpInfo
     *
     * Get Checkout Link
     *
     * @param  string $paymentLinkId The identifier of the checkout link that you want to be returned. (required)
     * @param  string $locale The locale in which the response should be returned (optional, default to 'DE')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getPaymentLink'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getPaymentLinkAsyncWithHttpInfo($paymentLinkId, $locale = 'DE', string $contentType = self::contentTypes['getPaymentLink'][0])
    {
        $returnType = '\KlimAPI\Model\CheckoutLink';
        $request = $this->getPaymentLinkRequest($paymentLinkId, $locale, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'getPaymentLink'
     *
     * @param  string $paymentLinkId The identifier of the checkout link that you want to be returned. (required)
     * @param  string $locale The locale in which the response should be returned (optional, default to 'DE')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getPaymentLink'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function getPaymentLinkRequest($paymentLinkId, $locale = 'DE', string $contentType = self::contentTypes['getPaymentLink'][0])
    {

        // verify the required parameter 'paymentLinkId' is set
        if ($paymentLinkId === null || (is_array($paymentLinkId) && count($paymentLinkId) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $paymentLinkId when calling getPaymentLink'
            );
        }



        $resourcePath = '/orders/link/{payment_link_id}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // header params
        if ($locale !== null) {
            $headerParams['X-LOCALE'] = ObjectSerializer::toHeaderValue($locale);
        }

        // path params
        if ($paymentLinkId !== null) {
            $resourcePath = str_replace(
                '{' . 'payment_link_id' . '}',
                ObjectSerializer::toPathValue($paymentLinkId),
                $resourcePath
            );
        }


        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('X-API-KEY');
        if ($apiKey !== null) {
            $headers['X-API-KEY'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'GET',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getProject
     *
     * Get Project
     *
     * @param  string $projectId You can get the project_id from several endpoints, for example when creating an Order. (required)
     * @param  string $locale The locale in which the response should be returned (optional, default to 'DE')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getProject'] to see the possible values for this operation
     *
     * @throws \KlimAPI\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \KlimAPI\Model\Project
     */
    public function getProject($projectId, $locale = 'DE', string $contentType = self::contentTypes['getProject'][0])
    {
        list($response) = $this->getProjectWithHttpInfo($projectId, $locale, $contentType);
        return $response;
    }

    /**
     * Operation getProjectWithHttpInfo
     *
     * Get Project
     *
     * @param  string $projectId You can get the project_id from several endpoints, for example when creating an Order. (required)
     * @param  string $locale The locale in which the response should be returned (optional, default to 'DE')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getProject'] to see the possible values for this operation
     *
     * @throws \KlimAPI\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \KlimAPI\Model\Project, HTTP status code, HTTP response headers (array of strings)
     */
    public function getProjectWithHttpInfo($projectId, $locale = 'DE', string $contentType = self::contentTypes['getProject'][0])
    {
        $request = $this->getProjectRequest($projectId, $locale, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 200:
                    if ('\KlimAPI\Model\Project' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\KlimAPI\Model\Project' !== 'string') {
                            try {
                                $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                            } catch (\JsonException $exception) {
                                throw new ApiException(
                                    sprintf(
                                        'Error JSON decoding server response (%s)',
                                        $request->getUri()
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $content
                                );
                            }
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\KlimAPI\Model\Project', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\KlimAPI\Model\Project';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    try {
                        $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                    } catch (\JsonException $exception) {
                        throw new ApiException(
                            sprintf(
                                'Error JSON decoding server response (%s)',
                                $request->getUri()
                            ),
                            $statusCode,
                            $response->getHeaders(),
                            $content
                        );
                    }
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\KlimAPI\Model\Project',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getProjectAsync
     *
     * Get Project
     *
     * @param  string $projectId You can get the project_id from several endpoints, for example when creating an Order. (required)
     * @param  string $locale The locale in which the response should be returned (optional, default to 'DE')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getProject'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getProjectAsync($projectId, $locale = 'DE', string $contentType = self::contentTypes['getProject'][0])
    {
        return $this->getProjectAsyncWithHttpInfo($projectId, $locale, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getProjectAsyncWithHttpInfo
     *
     * Get Project
     *
     * @param  string $projectId You can get the project_id from several endpoints, for example when creating an Order. (required)
     * @param  string $locale The locale in which the response should be returned (optional, default to 'DE')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getProject'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getProjectAsyncWithHttpInfo($projectId, $locale = 'DE', string $contentType = self::contentTypes['getProject'][0])
    {
        $returnType = '\KlimAPI\Model\Project';
        $request = $this->getProjectRequest($projectId, $locale, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'getProject'
     *
     * @param  string $projectId You can get the project_id from several endpoints, for example when creating an Order. (required)
     * @param  string $locale The locale in which the response should be returned (optional, default to 'DE')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getProject'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function getProjectRequest($projectId, $locale = 'DE', string $contentType = self::contentTypes['getProject'][0])
    {

        // verify the required parameter 'projectId' is set
        if ($projectId === null || (is_array($projectId) && count($projectId) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $projectId when calling getProject'
            );
        }



        $resourcePath = '/projects/{project_id}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // header params
        if ($locale !== null) {
            $headerParams['X-LOCALE'] = ObjectSerializer::toHeaderValue($locale);
        }

        // path params
        if ($projectId !== null) {
            $resourcePath = str_replace(
                '{' . 'project_id' . '}',
                ObjectSerializer::toPathValue($projectId),
                $resourcePath
            );
        }


        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('X-API-KEY');
        if ($apiKey !== null) {
            $headers['X-API-KEY'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'GET',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getProjects
     *
     * Get all supported Projects
     *
     * @param  string $locale The locale in which the response should be returned (optional, default to 'DE')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getProjects'] to see the possible values for this operation
     *
     * @throws \KlimAPI\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \KlimAPI\Model\Project[]
     */
    public function getProjects($locale = 'DE', string $contentType = self::contentTypes['getProjects'][0])
    {
        list($response) = $this->getProjectsWithHttpInfo($locale, $contentType);
        return $response;
    }

    /**
     * Operation getProjectsWithHttpInfo
     *
     * Get all supported Projects
     *
     * @param  string $locale The locale in which the response should be returned (optional, default to 'DE')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getProjects'] to see the possible values for this operation
     *
     * @throws \KlimAPI\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \KlimAPI\Model\Project[], HTTP status code, HTTP response headers (array of strings)
     */
    public function getProjectsWithHttpInfo($locale = 'DE', string $contentType = self::contentTypes['getProjects'][0])
    {
        $request = $this->getProjectsRequest($locale, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 200:
                    if ('\KlimAPI\Model\Project[]' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\KlimAPI\Model\Project[]' !== 'string') {
                            try {
                                $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                            } catch (\JsonException $exception) {
                                throw new ApiException(
                                    sprintf(
                                        'Error JSON decoding server response (%s)',
                                        $request->getUri()
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $content
                                );
                            }
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\KlimAPI\Model\Project[]', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\KlimAPI\Model\Project[]';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    try {
                        $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                    } catch (\JsonException $exception) {
                        throw new ApiException(
                            sprintf(
                                'Error JSON decoding server response (%s)',
                                $request->getUri()
                            ),
                            $statusCode,
                            $response->getHeaders(),
                            $content
                        );
                    }
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\KlimAPI\Model\Project[]',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getProjectsAsync
     *
     * Get all supported Projects
     *
     * @param  string $locale The locale in which the response should be returned (optional, default to 'DE')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getProjects'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getProjectsAsync($locale = 'DE', string $contentType = self::contentTypes['getProjects'][0])
    {
        return $this->getProjectsAsyncWithHttpInfo($locale, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getProjectsAsyncWithHttpInfo
     *
     * Get all supported Projects
     *
     * @param  string $locale The locale in which the response should be returned (optional, default to 'DE')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getProjects'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getProjectsAsyncWithHttpInfo($locale = 'DE', string $contentType = self::contentTypes['getProjects'][0])
    {
        $returnType = '\KlimAPI\Model\Project[]';
        $request = $this->getProjectsRequest($locale, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'getProjects'
     *
     * @param  string $locale The locale in which the response should be returned (optional, default to 'DE')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getProjects'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function getProjectsRequest($locale = 'DE', string $contentType = self::contentTypes['getProjects'][0])
    {



        $resourcePath = '/projects';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // header params
        if ($locale !== null) {
            $headerParams['X-LOCALE'] = ObjectSerializer::toHeaderValue($locale);
        }



        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('X-API-KEY');
        if ($apiKey !== null) {
            $headers['X-API-KEY'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'GET',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation linkByCalculation
     *
     * By Calculation
     *
     * @param  \KlimAPI\Model\LinkByCalculationRequest $linkByCalculationRequest Choose up to 100 Elements from the **[Calculation Options](https://klimapi.com/resources/factors)**. In this example it is just **Travel by Car**. (required)
     * @param  string $locale The locale in which the response should be returned (optional, default to 'DE')
     * @param  string $currency The currency of the returned offset price (optional, default to 'EUR')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['linkByCalculation'] to see the possible values for this operation
     *
     * @throws \KlimAPI\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \KlimAPI\Model\CheckoutLinksCalculated
     */
    public function linkByCalculation($linkByCalculationRequest, $locale = 'DE', $currency = 'EUR', string $contentType = self::contentTypes['linkByCalculation'][0])
    {
        list($response) = $this->linkByCalculationWithHttpInfo($linkByCalculationRequest, $locale, $currency, $contentType);
        return $response;
    }

    /**
     * Operation linkByCalculationWithHttpInfo
     *
     * By Calculation
     *
     * @param  \KlimAPI\Model\LinkByCalculationRequest $linkByCalculationRequest Choose up to 100 Elements from the **[Calculation Options](https://klimapi.com/resources/factors)**. In this example it is just **Travel by Car**. (required)
     * @param  string $locale The locale in which the response should be returned (optional, default to 'DE')
     * @param  string $currency The currency of the returned offset price (optional, default to 'EUR')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['linkByCalculation'] to see the possible values for this operation
     *
     * @throws \KlimAPI\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \KlimAPI\Model\CheckoutLinksCalculated, HTTP status code, HTTP response headers (array of strings)
     */
    public function linkByCalculationWithHttpInfo($linkByCalculationRequest, $locale = 'DE', $currency = 'EUR', string $contentType = self::contentTypes['linkByCalculation'][0])
    {
        $request = $this->linkByCalculationRequest($linkByCalculationRequest, $locale, $currency, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 200:
                    if ('\KlimAPI\Model\CheckoutLinksCalculated' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\KlimAPI\Model\CheckoutLinksCalculated' !== 'string') {
                            try {
                                $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                            } catch (\JsonException $exception) {
                                throw new ApiException(
                                    sprintf(
                                        'Error JSON decoding server response (%s)',
                                        $request->getUri()
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $content
                                );
                            }
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\KlimAPI\Model\CheckoutLinksCalculated', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\KlimAPI\Model\CheckoutLinksCalculated';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    try {
                        $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                    } catch (\JsonException $exception) {
                        throw new ApiException(
                            sprintf(
                                'Error JSON decoding server response (%s)',
                                $request->getUri()
                            ),
                            $statusCode,
                            $response->getHeaders(),
                            $content
                        );
                    }
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\KlimAPI\Model\CheckoutLinksCalculated',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation linkByCalculationAsync
     *
     * By Calculation
     *
     * @param  \KlimAPI\Model\LinkByCalculationRequest $linkByCalculationRequest Choose up to 100 Elements from the **[Calculation Options](https://klimapi.com/resources/factors)**. In this example it is just **Travel by Car**. (required)
     * @param  string $locale The locale in which the response should be returned (optional, default to 'DE')
     * @param  string $currency The currency of the returned offset price (optional, default to 'EUR')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['linkByCalculation'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function linkByCalculationAsync($linkByCalculationRequest, $locale = 'DE', $currency = 'EUR', string $contentType = self::contentTypes['linkByCalculation'][0])
    {
        return $this->linkByCalculationAsyncWithHttpInfo($linkByCalculationRequest, $locale, $currency, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation linkByCalculationAsyncWithHttpInfo
     *
     * By Calculation
     *
     * @param  \KlimAPI\Model\LinkByCalculationRequest $linkByCalculationRequest Choose up to 100 Elements from the **[Calculation Options](https://klimapi.com/resources/factors)**. In this example it is just **Travel by Car**. (required)
     * @param  string $locale The locale in which the response should be returned (optional, default to 'DE')
     * @param  string $currency The currency of the returned offset price (optional, default to 'EUR')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['linkByCalculation'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function linkByCalculationAsyncWithHttpInfo($linkByCalculationRequest, $locale = 'DE', $currency = 'EUR', string $contentType = self::contentTypes['linkByCalculation'][0])
    {
        $returnType = '\KlimAPI\Model\CheckoutLinksCalculated';
        $request = $this->linkByCalculationRequest($linkByCalculationRequest, $locale, $currency, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'linkByCalculation'
     *
     * @param  \KlimAPI\Model\LinkByCalculationRequest $linkByCalculationRequest Choose up to 100 Elements from the **[Calculation Options](https://klimapi.com/resources/factors)**. In this example it is just **Travel by Car**. (required)
     * @param  string $locale The locale in which the response should be returned (optional, default to 'DE')
     * @param  string $currency The currency of the returned offset price (optional, default to 'EUR')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['linkByCalculation'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function linkByCalculationRequest($linkByCalculationRequest, $locale = 'DE', $currency = 'EUR', string $contentType = self::contentTypes['linkByCalculation'][0])
    {

        // verify the required parameter 'linkByCalculationRequest' is set
        if ($linkByCalculationRequest === null || (is_array($linkByCalculationRequest) && count($linkByCalculationRequest) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $linkByCalculationRequest when calling linkByCalculation'
            );
        }




        $resourcePath = '/orders/link/calculate';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // header params
        if ($locale !== null) {
            $headerParams['X-LOCALE'] = ObjectSerializer::toHeaderValue($locale);
        }
        // header params
        if ($currency !== null) {
            $headerParams['X-CURRENCY'] = ObjectSerializer::toHeaderValue($currency);
        }



        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($linkByCalculationRequest)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($linkByCalculationRequest));
            } else {
                $httpBody = $linkByCalculationRequest;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('X-API-KEY');
        if ($apiKey !== null) {
            $headers['X-API-KEY'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'POST',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation linkByCarbon
     *
     * By Carbon
     *
     * @param  \KlimAPI\Model\LinkByCarbonRequest $linkByCarbonRequest linkByCarbonRequest (optional)
     * @param  string $locale The locale in which the response should be returned (optional, default to 'DE')
     * @param  string $currency The currency of the returned offset price (optional, default to 'EUR')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['linkByCarbon'] to see the possible values for this operation
     *
     * @throws \KlimAPI\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \KlimAPI\Model\CheckoutLinks
     */
    public function linkByCarbon($linkByCarbonRequest = null, $locale = 'DE', $currency = 'EUR', string $contentType = self::contentTypes['linkByCarbon'][0])
    {
        list($response) = $this->linkByCarbonWithHttpInfo($linkByCarbonRequest, $locale, $currency, $contentType);
        return $response;
    }

    /**
     * Operation linkByCarbonWithHttpInfo
     *
     * By Carbon
     *
     * @param  \KlimAPI\Model\LinkByCarbonRequest $linkByCarbonRequest (optional)
     * @param  string $locale The locale in which the response should be returned (optional, default to 'DE')
     * @param  string $currency The currency of the returned offset price (optional, default to 'EUR')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['linkByCarbon'] to see the possible values for this operation
     *
     * @throws \KlimAPI\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \KlimAPI\Model\CheckoutLinks, HTTP status code, HTTP response headers (array of strings)
     */
    public function linkByCarbonWithHttpInfo($linkByCarbonRequest = null, $locale = 'DE', $currency = 'EUR', string $contentType = self::contentTypes['linkByCarbon'][0])
    {
        $request = $this->linkByCarbonRequest($linkByCarbonRequest, $locale, $currency, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 200:
                    if ('\KlimAPI\Model\CheckoutLinks' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\KlimAPI\Model\CheckoutLinks' !== 'string') {
                            try {
                                $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                            } catch (\JsonException $exception) {
                                throw new ApiException(
                                    sprintf(
                                        'Error JSON decoding server response (%s)',
                                        $request->getUri()
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $content
                                );
                            }
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\KlimAPI\Model\CheckoutLinks', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\KlimAPI\Model\CheckoutLinks';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    try {
                        $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                    } catch (\JsonException $exception) {
                        throw new ApiException(
                            sprintf(
                                'Error JSON decoding server response (%s)',
                                $request->getUri()
                            ),
                            $statusCode,
                            $response->getHeaders(),
                            $content
                        );
                    }
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\KlimAPI\Model\CheckoutLinks',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation linkByCarbonAsync
     *
     * By Carbon
     *
     * @param  \KlimAPI\Model\LinkByCarbonRequest $linkByCarbonRequest (optional)
     * @param  string $locale The locale in which the response should be returned (optional, default to 'DE')
     * @param  string $currency The currency of the returned offset price (optional, default to 'EUR')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['linkByCarbon'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function linkByCarbonAsync($linkByCarbonRequest = null, $locale = 'DE', $currency = 'EUR', string $contentType = self::contentTypes['linkByCarbon'][0])
    {
        return $this->linkByCarbonAsyncWithHttpInfo($linkByCarbonRequest, $locale, $currency, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation linkByCarbonAsyncWithHttpInfo
     *
     * By Carbon
     *
     * @param  \KlimAPI\Model\LinkByCarbonRequest $linkByCarbonRequest (optional)
     * @param  string $locale The locale in which the response should be returned (optional, default to 'DE')
     * @param  string $currency The currency of the returned offset price (optional, default to 'EUR')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['linkByCarbon'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function linkByCarbonAsyncWithHttpInfo($linkByCarbonRequest = null, $locale = 'DE', $currency = 'EUR', string $contentType = self::contentTypes['linkByCarbon'][0])
    {
        $returnType = '\KlimAPI\Model\CheckoutLinks';
        $request = $this->linkByCarbonRequest($linkByCarbonRequest, $locale, $currency, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'linkByCarbon'
     *
     * @param  \KlimAPI\Model\LinkByCarbonRequest $linkByCarbonRequest (optional)
     * @param  string $locale The locale in which the response should be returned (optional, default to 'DE')
     * @param  string $currency The currency of the returned offset price (optional, default to 'EUR')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['linkByCarbon'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function linkByCarbonRequest($linkByCarbonRequest = null, $locale = 'DE', $currency = 'EUR', string $contentType = self::contentTypes['linkByCarbon'][0])
    {





        $resourcePath = '/orders/link/carbon';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // header params
        if ($locale !== null) {
            $headerParams['X-LOCALE'] = ObjectSerializer::toHeaderValue($locale);
        }
        // header params
        if ($currency !== null) {
            $headerParams['X-CURRENCY'] = ObjectSerializer::toHeaderValue($currency);
        }



        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($linkByCarbonRequest)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($linkByCarbonRequest));
            } else {
                $httpBody = $linkByCarbonRequest;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('X-API-KEY');
        if ($apiKey !== null) {
            $headers['X-API-KEY'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'POST',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation linkByPrice
     *
     * By Price
     *
     * @param  \KlimAPI\Model\LinkByPriceRequest $linkByPriceRequest linkByPriceRequest (optional)
     * @param  string $locale The locale in which the response should be returned (optional, default to 'DE')
     * @param  string $currency The currency of the returned offset price (optional, default to 'EUR')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['linkByPrice'] to see the possible values for this operation
     *
     * @throws \KlimAPI\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \KlimAPI\Model\CheckoutLinks
     */
    public function linkByPrice($linkByPriceRequest = null, $locale = 'DE', $currency = 'EUR', string $contentType = self::contentTypes['linkByPrice'][0])
    {
        list($response) = $this->linkByPriceWithHttpInfo($linkByPriceRequest, $locale, $currency, $contentType);
        return $response;
    }

    /**
     * Operation linkByPriceWithHttpInfo
     *
     * By Price
     *
     * @param  \KlimAPI\Model\LinkByPriceRequest $linkByPriceRequest (optional)
     * @param  string $locale The locale in which the response should be returned (optional, default to 'DE')
     * @param  string $currency The currency of the returned offset price (optional, default to 'EUR')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['linkByPrice'] to see the possible values for this operation
     *
     * @throws \KlimAPI\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \KlimAPI\Model\CheckoutLinks, HTTP status code, HTTP response headers (array of strings)
     */
    public function linkByPriceWithHttpInfo($linkByPriceRequest = null, $locale = 'DE', $currency = 'EUR', string $contentType = self::contentTypes['linkByPrice'][0])
    {
        $request = $this->linkByPriceRequest($linkByPriceRequest, $locale, $currency, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 200:
                    if ('\KlimAPI\Model\CheckoutLinks' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\KlimAPI\Model\CheckoutLinks' !== 'string') {
                            try {
                                $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                            } catch (\JsonException $exception) {
                                throw new ApiException(
                                    sprintf(
                                        'Error JSON decoding server response (%s)',
                                        $request->getUri()
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $content
                                );
                            }
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\KlimAPI\Model\CheckoutLinks', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\KlimAPI\Model\CheckoutLinks';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    try {
                        $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                    } catch (\JsonException $exception) {
                        throw new ApiException(
                            sprintf(
                                'Error JSON decoding server response (%s)',
                                $request->getUri()
                            ),
                            $statusCode,
                            $response->getHeaders(),
                            $content
                        );
                    }
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\KlimAPI\Model\CheckoutLinks',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation linkByPriceAsync
     *
     * By Price
     *
     * @param  \KlimAPI\Model\LinkByPriceRequest $linkByPriceRequest (optional)
     * @param  string $locale The locale in which the response should be returned (optional, default to 'DE')
     * @param  string $currency The currency of the returned offset price (optional, default to 'EUR')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['linkByPrice'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function linkByPriceAsync($linkByPriceRequest = null, $locale = 'DE', $currency = 'EUR', string $contentType = self::contentTypes['linkByPrice'][0])
    {
        return $this->linkByPriceAsyncWithHttpInfo($linkByPriceRequest, $locale, $currency, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation linkByPriceAsyncWithHttpInfo
     *
     * By Price
     *
     * @param  \KlimAPI\Model\LinkByPriceRequest $linkByPriceRequest (optional)
     * @param  string $locale The locale in which the response should be returned (optional, default to 'DE')
     * @param  string $currency The currency of the returned offset price (optional, default to 'EUR')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['linkByPrice'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function linkByPriceAsyncWithHttpInfo($linkByPriceRequest = null, $locale = 'DE', $currency = 'EUR', string $contentType = self::contentTypes['linkByPrice'][0])
    {
        $returnType = '\KlimAPI\Model\CheckoutLinks';
        $request = $this->linkByPriceRequest($linkByPriceRequest, $locale, $currency, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'linkByPrice'
     *
     * @param  \KlimAPI\Model\LinkByPriceRequest $linkByPriceRequest (optional)
     * @param  string $locale The locale in which the response should be returned (optional, default to 'DE')
     * @param  string $currency The currency of the returned offset price (optional, default to 'EUR')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['linkByPrice'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function linkByPriceRequest($linkByPriceRequest = null, $locale = 'DE', $currency = 'EUR', string $contentType = self::contentTypes['linkByPrice'][0])
    {





        $resourcePath = '/orders/link/price';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // header params
        if ($locale !== null) {
            $headerParams['X-LOCALE'] = ObjectSerializer::toHeaderValue($locale);
        }
        // header params
        if ($currency !== null) {
            $headerParams['X-CURRENCY'] = ObjectSerializer::toHeaderValue($currency);
        }



        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($linkByPriceRequest)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($linkByPriceRequest));
            } else {
                $httpBody = $linkByPriceRequest;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('X-API-KEY');
        if ($apiKey !== null) {
            $headers['X-API-KEY'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'POST',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation me
     *
     * Get Authenticated User
     *
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['me'] to see the possible values for this operation
     *
     * @throws \KlimAPI\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return object
     */
    public function me(string $contentType = self::contentTypes['me'][0])
    {
        list($response) = $this->meWithHttpInfo($contentType);
        return $response;
    }

    /**
     * Operation meWithHttpInfo
     *
     * Get Authenticated User
     *
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['me'] to see the possible values for this operation
     *
     * @throws \KlimAPI\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of object, HTTP status code, HTTP response headers (array of strings)
     */
    public function meWithHttpInfo(string $contentType = self::contentTypes['me'][0])
    {
        $request = $this->meRequest($contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 200:
                    if ('object' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('object' !== 'string') {
                            try {
                                $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                            } catch (\JsonException $exception) {
                                throw new ApiException(
                                    sprintf(
                                        'Error JSON decoding server response (%s)',
                                        $request->getUri()
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $content
                                );
                            }
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, 'object', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = 'object';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    try {
                        $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                    } catch (\JsonException $exception) {
                        throw new ApiException(
                            sprintf(
                                'Error JSON decoding server response (%s)',
                                $request->getUri()
                            ),
                            $statusCode,
                            $response->getHeaders(),
                            $content
                        );
                    }
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        'object',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation meAsync
     *
     * Get Authenticated User
     *
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['me'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function meAsync(string $contentType = self::contentTypes['me'][0])
    {
        return $this->meAsyncWithHttpInfo($contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation meAsyncWithHttpInfo
     *
     * Get Authenticated User
     *
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['me'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function meAsyncWithHttpInfo(string $contentType = self::contentTypes['me'][0])
    {
        $returnType = 'object';
        $request = $this->meRequest($contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'me'
     *
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['me'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function meRequest(string $contentType = self::contentTypes['me'][0])
    {


        $resourcePath = '/me';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;





        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('X-API-KEY');
        if ($apiKey !== null) {
            $headers['X-API-KEY'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'GET',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation orderByCalculation
     *
     * By Calculation
     *
     * @param  \KlimAPI\Model\OrderByCalculationRequest $orderByCalculationRequest Choose up to 100 Elements from the **[Calculation Options](https://klimapi.com/resources/factors)**. In this example it is just **Travel by Car**. (required)
     * @param  string $locale The locale in which the response should be returned (optional, default to 'DE')
     * @param  string $currency The currency of the returned offset price (optional, default to 'EUR')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['orderByCalculation'] to see the possible values for this operation
     *
     * @throws \KlimAPI\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \KlimAPI\Model\OrderCalculated
     */
    public function orderByCalculation($orderByCalculationRequest, $locale = 'DE', $currency = 'EUR', string $contentType = self::contentTypes['orderByCalculation'][0])
    {
        list($response) = $this->orderByCalculationWithHttpInfo($orderByCalculationRequest, $locale, $currency, $contentType);
        return $response;
    }

    /**
     * Operation orderByCalculationWithHttpInfo
     *
     * By Calculation
     *
     * @param  \KlimAPI\Model\OrderByCalculationRequest $orderByCalculationRequest Choose up to 100 Elements from the **[Calculation Options](https://klimapi.com/resources/factors)**. In this example it is just **Travel by Car**. (required)
     * @param  string $locale The locale in which the response should be returned (optional, default to 'DE')
     * @param  string $currency The currency of the returned offset price (optional, default to 'EUR')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['orderByCalculation'] to see the possible values for this operation
     *
     * @throws \KlimAPI\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \KlimAPI\Model\OrderCalculated, HTTP status code, HTTP response headers (array of strings)
     */
    public function orderByCalculationWithHttpInfo($orderByCalculationRequest, $locale = 'DE', $currency = 'EUR', string $contentType = self::contentTypes['orderByCalculation'][0])
    {
        $request = $this->orderByCalculationRequest($orderByCalculationRequest, $locale, $currency, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 200:
                    if ('\KlimAPI\Model\OrderCalculated' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\KlimAPI\Model\OrderCalculated' !== 'string') {
                            try {
                                $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                            } catch (\JsonException $exception) {
                                throw new ApiException(
                                    sprintf(
                                        'Error JSON decoding server response (%s)',
                                        $request->getUri()
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $content
                                );
                            }
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\KlimAPI\Model\OrderCalculated', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\KlimAPI\Model\OrderCalculated';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    try {
                        $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                    } catch (\JsonException $exception) {
                        throw new ApiException(
                            sprintf(
                                'Error JSON decoding server response (%s)',
                                $request->getUri()
                            ),
                            $statusCode,
                            $response->getHeaders(),
                            $content
                        );
                    }
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\KlimAPI\Model\OrderCalculated',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation orderByCalculationAsync
     *
     * By Calculation
     *
     * @param  \KlimAPI\Model\OrderByCalculationRequest $orderByCalculationRequest Choose up to 100 Elements from the **[Calculation Options](https://klimapi.com/resources/factors)**. In this example it is just **Travel by Car**. (required)
     * @param  string $locale The locale in which the response should be returned (optional, default to 'DE')
     * @param  string $currency The currency of the returned offset price (optional, default to 'EUR')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['orderByCalculation'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function orderByCalculationAsync($orderByCalculationRequest, $locale = 'DE', $currency = 'EUR', string $contentType = self::contentTypes['orderByCalculation'][0])
    {
        return $this->orderByCalculationAsyncWithHttpInfo($orderByCalculationRequest, $locale, $currency, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation orderByCalculationAsyncWithHttpInfo
     *
     * By Calculation
     *
     * @param  \KlimAPI\Model\OrderByCalculationRequest $orderByCalculationRequest Choose up to 100 Elements from the **[Calculation Options](https://klimapi.com/resources/factors)**. In this example it is just **Travel by Car**. (required)
     * @param  string $locale The locale in which the response should be returned (optional, default to 'DE')
     * @param  string $currency The currency of the returned offset price (optional, default to 'EUR')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['orderByCalculation'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function orderByCalculationAsyncWithHttpInfo($orderByCalculationRequest, $locale = 'DE', $currency = 'EUR', string $contentType = self::contentTypes['orderByCalculation'][0])
    {
        $returnType = '\KlimAPI\Model\OrderCalculated';
        $request = $this->orderByCalculationRequest($orderByCalculationRequest, $locale, $currency, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'orderByCalculation'
     *
     * @param  \KlimAPI\Model\OrderByCalculationRequest $orderByCalculationRequest Choose up to 100 Elements from the **[Calculation Options](https://klimapi.com/resources/factors)**. In this example it is just **Travel by Car**. (required)
     * @param  string $locale The locale in which the response should be returned (optional, default to 'DE')
     * @param  string $currency The currency of the returned offset price (optional, default to 'EUR')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['orderByCalculation'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function orderByCalculationRequest($orderByCalculationRequest, $locale = 'DE', $currency = 'EUR', string $contentType = self::contentTypes['orderByCalculation'][0])
    {

        // verify the required parameter 'orderByCalculationRequest' is set
        if ($orderByCalculationRequest === null || (is_array($orderByCalculationRequest) && count($orderByCalculationRequest) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $orderByCalculationRequest when calling orderByCalculation'
            );
        }




        $resourcePath = '/orders/process/calculate';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // header params
        if ($locale !== null) {
            $headerParams['X-LOCALE'] = ObjectSerializer::toHeaderValue($locale);
        }
        // header params
        if ($currency !== null) {
            $headerParams['X-CURRENCY'] = ObjectSerializer::toHeaderValue($currency);
        }



        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($orderByCalculationRequest)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($orderByCalculationRequest));
            } else {
                $httpBody = $orderByCalculationRequest;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('X-API-KEY');
        if ($apiKey !== null) {
            $headers['X-API-KEY'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'POST',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation orderByCarbon
     *
     * By Carbon
     *
     * @param  \KlimAPI\Model\BuyAmount $buyAmount buyAmount (optional)
     * @param  string $locale The locale in which the response should be returned (optional, default to 'DE')
     * @param  string $currency The currency of the returned offset price (optional, default to 'EUR')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['orderByCarbon'] to see the possible values for this operation
     *
     * @throws \KlimAPI\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \KlimAPI\Model\Order
     */
    public function orderByCarbon($buyAmount = null, $locale = 'DE', $currency = 'EUR', string $contentType = self::contentTypes['orderByCarbon'][0])
    {
        list($response) = $this->orderByCarbonWithHttpInfo($buyAmount, $locale, $currency, $contentType);
        return $response;
    }

    /**
     * Operation orderByCarbonWithHttpInfo
     *
     * By Carbon
     *
     * @param  \KlimAPI\Model\BuyAmount $buyAmount (optional)
     * @param  string $locale The locale in which the response should be returned (optional, default to 'DE')
     * @param  string $currency The currency of the returned offset price (optional, default to 'EUR')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['orderByCarbon'] to see the possible values for this operation
     *
     * @throws \KlimAPI\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \KlimAPI\Model\Order, HTTP status code, HTTP response headers (array of strings)
     */
    public function orderByCarbonWithHttpInfo($buyAmount = null, $locale = 'DE', $currency = 'EUR', string $contentType = self::contentTypes['orderByCarbon'][0])
    {
        $request = $this->orderByCarbonRequest($buyAmount, $locale, $currency, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 200:
                    if ('\KlimAPI\Model\Order' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\KlimAPI\Model\Order' !== 'string') {
                            try {
                                $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                            } catch (\JsonException $exception) {
                                throw new ApiException(
                                    sprintf(
                                        'Error JSON decoding server response (%s)',
                                        $request->getUri()
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $content
                                );
                            }
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\KlimAPI\Model\Order', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\KlimAPI\Model\Order';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    try {
                        $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                    } catch (\JsonException $exception) {
                        throw new ApiException(
                            sprintf(
                                'Error JSON decoding server response (%s)',
                                $request->getUri()
                            ),
                            $statusCode,
                            $response->getHeaders(),
                            $content
                        );
                    }
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\KlimAPI\Model\Order',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation orderByCarbonAsync
     *
     * By Carbon
     *
     * @param  \KlimAPI\Model\BuyAmount $buyAmount (optional)
     * @param  string $locale The locale in which the response should be returned (optional, default to 'DE')
     * @param  string $currency The currency of the returned offset price (optional, default to 'EUR')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['orderByCarbon'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function orderByCarbonAsync($buyAmount = null, $locale = 'DE', $currency = 'EUR', string $contentType = self::contentTypes['orderByCarbon'][0])
    {
        return $this->orderByCarbonAsyncWithHttpInfo($buyAmount, $locale, $currency, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation orderByCarbonAsyncWithHttpInfo
     *
     * By Carbon
     *
     * @param  \KlimAPI\Model\BuyAmount $buyAmount (optional)
     * @param  string $locale The locale in which the response should be returned (optional, default to 'DE')
     * @param  string $currency The currency of the returned offset price (optional, default to 'EUR')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['orderByCarbon'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function orderByCarbonAsyncWithHttpInfo($buyAmount = null, $locale = 'DE', $currency = 'EUR', string $contentType = self::contentTypes['orderByCarbon'][0])
    {
        $returnType = '\KlimAPI\Model\Order';
        $request = $this->orderByCarbonRequest($buyAmount, $locale, $currency, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'orderByCarbon'
     *
     * @param  \KlimAPI\Model\BuyAmount $buyAmount (optional)
     * @param  string $locale The locale in which the response should be returned (optional, default to 'DE')
     * @param  string $currency The currency of the returned offset price (optional, default to 'EUR')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['orderByCarbon'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function orderByCarbonRequest($buyAmount = null, $locale = 'DE', $currency = 'EUR', string $contentType = self::contentTypes['orderByCarbon'][0])
    {





        $resourcePath = '/orders/process/carbon';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // header params
        if ($locale !== null) {
            $headerParams['X-LOCALE'] = ObjectSerializer::toHeaderValue($locale);
        }
        // header params
        if ($currency !== null) {
            $headerParams['X-CURRENCY'] = ObjectSerializer::toHeaderValue($currency);
        }



        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($buyAmount)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($buyAmount));
            } else {
                $httpBody = $buyAmount;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('X-API-KEY');
        if ($apiKey !== null) {
            $headers['X-API-KEY'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'POST',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation orderByPrice
     *
     * By Price
     *
     * @param  \KlimAPI\Model\BuyPrice $buyPrice buyPrice (optional)
     * @param  string $locale The locale in which the response should be returned (optional, default to 'DE')
     * @param  string $currency The currency of the returned offset price (optional, default to 'EUR')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['orderByPrice'] to see the possible values for this operation
     *
     * @throws \KlimAPI\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \KlimAPI\Model\Order
     */
    public function orderByPrice($buyPrice = null, $locale = 'DE', $currency = 'EUR', string $contentType = self::contentTypes['orderByPrice'][0])
    {
        list($response) = $this->orderByPriceWithHttpInfo($buyPrice, $locale, $currency, $contentType);
        return $response;
    }

    /**
     * Operation orderByPriceWithHttpInfo
     *
     * By Price
     *
     * @param  \KlimAPI\Model\BuyPrice $buyPrice (optional)
     * @param  string $locale The locale in which the response should be returned (optional, default to 'DE')
     * @param  string $currency The currency of the returned offset price (optional, default to 'EUR')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['orderByPrice'] to see the possible values for this operation
     *
     * @throws \KlimAPI\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \KlimAPI\Model\Order, HTTP status code, HTTP response headers (array of strings)
     */
    public function orderByPriceWithHttpInfo($buyPrice = null, $locale = 'DE', $currency = 'EUR', string $contentType = self::contentTypes['orderByPrice'][0])
    {
        $request = $this->orderByPriceRequest($buyPrice, $locale, $currency, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 200:
                    if ('\KlimAPI\Model\Order' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\KlimAPI\Model\Order' !== 'string') {
                            try {
                                $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                            } catch (\JsonException $exception) {
                                throw new ApiException(
                                    sprintf(
                                        'Error JSON decoding server response (%s)',
                                        $request->getUri()
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $content
                                );
                            }
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\KlimAPI\Model\Order', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\KlimAPI\Model\Order';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    try {
                        $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                    } catch (\JsonException $exception) {
                        throw new ApiException(
                            sprintf(
                                'Error JSON decoding server response (%s)',
                                $request->getUri()
                            ),
                            $statusCode,
                            $response->getHeaders(),
                            $content
                        );
                    }
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\KlimAPI\Model\Order',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation orderByPriceAsync
     *
     * By Price
     *
     * @param  \KlimAPI\Model\BuyPrice $buyPrice (optional)
     * @param  string $locale The locale in which the response should be returned (optional, default to 'DE')
     * @param  string $currency The currency of the returned offset price (optional, default to 'EUR')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['orderByPrice'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function orderByPriceAsync($buyPrice = null, $locale = 'DE', $currency = 'EUR', string $contentType = self::contentTypes['orderByPrice'][0])
    {
        return $this->orderByPriceAsyncWithHttpInfo($buyPrice, $locale, $currency, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation orderByPriceAsyncWithHttpInfo
     *
     * By Price
     *
     * @param  \KlimAPI\Model\BuyPrice $buyPrice (optional)
     * @param  string $locale The locale in which the response should be returned (optional, default to 'DE')
     * @param  string $currency The currency of the returned offset price (optional, default to 'EUR')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['orderByPrice'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function orderByPriceAsyncWithHttpInfo($buyPrice = null, $locale = 'DE', $currency = 'EUR', string $contentType = self::contentTypes['orderByPrice'][0])
    {
        $returnType = '\KlimAPI\Model\Order';
        $request = $this->orderByPriceRequest($buyPrice, $locale, $currency, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'orderByPrice'
     *
     * @param  \KlimAPI\Model\BuyPrice $buyPrice (optional)
     * @param  string $locale The locale in which the response should be returned (optional, default to 'DE')
     * @param  string $currency The currency of the returned offset price (optional, default to 'EUR')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['orderByPrice'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function orderByPriceRequest($buyPrice = null, $locale = 'DE', $currency = 'EUR', string $contentType = self::contentTypes['orderByPrice'][0])
    {





        $resourcePath = '/orders/process/price';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // header params
        if ($locale !== null) {
            $headerParams['X-LOCALE'] = ObjectSerializer::toHeaderValue($locale);
        }
        // header params
        if ($currency !== null) {
            $headerParams['X-CURRENCY'] = ObjectSerializer::toHeaderValue($currency);
        }



        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($buyPrice)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($buyPrice));
            } else {
                $httpBody = $buyPrice;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('X-API-KEY');
        if ($apiKey !== null) {
            $headers['X-API-KEY'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'POST',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation pendingByCalculation
     *
     * By Calculation
     *
     * @param  \KlimAPI\Model\PendingByCalculationRequest $pendingByCalculationRequest Choose up to 100 Elements from the **[Calculation Options](https://klimapi.com/resources/factors)**. In this example it is just **Travel by Car**. (required)
     * @param  string $locale The locale in which the response should be returned (optional, default to 'DE')
     * @param  string $currency The currency of the returned offset price (optional, default to 'EUR')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['pendingByCalculation'] to see the possible values for this operation
     *
     * @throws \KlimAPI\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \KlimAPI\Model\PendingOrdersCalculated
     */
    public function pendingByCalculation($pendingByCalculationRequest, $locale = 'DE', $currency = 'EUR', string $contentType = self::contentTypes['pendingByCalculation'][0])
    {
        list($response) = $this->pendingByCalculationWithHttpInfo($pendingByCalculationRequest, $locale, $currency, $contentType);
        return $response;
    }

    /**
     * Operation pendingByCalculationWithHttpInfo
     *
     * By Calculation
     *
     * @param  \KlimAPI\Model\PendingByCalculationRequest $pendingByCalculationRequest Choose up to 100 Elements from the **[Calculation Options](https://klimapi.com/resources/factors)**. In this example it is just **Travel by Car**. (required)
     * @param  string $locale The locale in which the response should be returned (optional, default to 'DE')
     * @param  string $currency The currency of the returned offset price (optional, default to 'EUR')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['pendingByCalculation'] to see the possible values for this operation
     *
     * @throws \KlimAPI\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \KlimAPI\Model\PendingOrdersCalculated, HTTP status code, HTTP response headers (array of strings)
     */
    public function pendingByCalculationWithHttpInfo($pendingByCalculationRequest, $locale = 'DE', $currency = 'EUR', string $contentType = self::contentTypes['pendingByCalculation'][0])
    {
        $request = $this->pendingByCalculationRequest($pendingByCalculationRequest, $locale, $currency, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 200:
                    if ('\KlimAPI\Model\PendingOrdersCalculated' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\KlimAPI\Model\PendingOrdersCalculated' !== 'string') {
                            try {
                                $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                            } catch (\JsonException $exception) {
                                throw new ApiException(
                                    sprintf(
                                        'Error JSON decoding server response (%s)',
                                        $request->getUri()
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $content
                                );
                            }
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\KlimAPI\Model\PendingOrdersCalculated', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\KlimAPI\Model\PendingOrdersCalculated';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    try {
                        $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                    } catch (\JsonException $exception) {
                        throw new ApiException(
                            sprintf(
                                'Error JSON decoding server response (%s)',
                                $request->getUri()
                            ),
                            $statusCode,
                            $response->getHeaders(),
                            $content
                        );
                    }
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\KlimAPI\Model\PendingOrdersCalculated',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation pendingByCalculationAsync
     *
     * By Calculation
     *
     * @param  \KlimAPI\Model\PendingByCalculationRequest $pendingByCalculationRequest Choose up to 100 Elements from the **[Calculation Options](https://klimapi.com/resources/factors)**. In this example it is just **Travel by Car**. (required)
     * @param  string $locale The locale in which the response should be returned (optional, default to 'DE')
     * @param  string $currency The currency of the returned offset price (optional, default to 'EUR')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['pendingByCalculation'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function pendingByCalculationAsync($pendingByCalculationRequest, $locale = 'DE', $currency = 'EUR', string $contentType = self::contentTypes['pendingByCalculation'][0])
    {
        return $this->pendingByCalculationAsyncWithHttpInfo($pendingByCalculationRequest, $locale, $currency, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation pendingByCalculationAsyncWithHttpInfo
     *
     * By Calculation
     *
     * @param  \KlimAPI\Model\PendingByCalculationRequest $pendingByCalculationRequest Choose up to 100 Elements from the **[Calculation Options](https://klimapi.com/resources/factors)**. In this example it is just **Travel by Car**. (required)
     * @param  string $locale The locale in which the response should be returned (optional, default to 'DE')
     * @param  string $currency The currency of the returned offset price (optional, default to 'EUR')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['pendingByCalculation'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function pendingByCalculationAsyncWithHttpInfo($pendingByCalculationRequest, $locale = 'DE', $currency = 'EUR', string $contentType = self::contentTypes['pendingByCalculation'][0])
    {
        $returnType = '\KlimAPI\Model\PendingOrdersCalculated';
        $request = $this->pendingByCalculationRequest($pendingByCalculationRequest, $locale, $currency, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'pendingByCalculation'
     *
     * @param  \KlimAPI\Model\PendingByCalculationRequest $pendingByCalculationRequest Choose up to 100 Elements from the **[Calculation Options](https://klimapi.com/resources/factors)**. In this example it is just **Travel by Car**. (required)
     * @param  string $locale The locale in which the response should be returned (optional, default to 'DE')
     * @param  string $currency The currency of the returned offset price (optional, default to 'EUR')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['pendingByCalculation'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function pendingByCalculationRequest($pendingByCalculationRequest, $locale = 'DE', $currency = 'EUR', string $contentType = self::contentTypes['pendingByCalculation'][0])
    {

        // verify the required parameter 'pendingByCalculationRequest' is set
        if ($pendingByCalculationRequest === null || (is_array($pendingByCalculationRequest) && count($pendingByCalculationRequest) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $pendingByCalculationRequest when calling pendingByCalculation'
            );
        }




        $resourcePath = '/orders/pending/calculate';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // header params
        if ($locale !== null) {
            $headerParams['X-LOCALE'] = ObjectSerializer::toHeaderValue($locale);
        }
        // header params
        if ($currency !== null) {
            $headerParams['X-CURRENCY'] = ObjectSerializer::toHeaderValue($currency);
        }



        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($pendingByCalculationRequest)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($pendingByCalculationRequest));
            } else {
                $httpBody = $pendingByCalculationRequest;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('X-API-KEY');
        if ($apiKey !== null) {
            $headers['X-API-KEY'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'POST',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation pendingByCarbon
     *
     * By Carbon
     *
     * @param  \KlimAPI\Model\PendingByCarbonRequest $pendingByCarbonRequest pendingByCarbonRequest (required)
     * @param  string $locale The locale in which the response should be returned (optional, default to 'DE')
     * @param  string $currency The currency of the returned offset price (optional, default to 'EUR')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['pendingByCarbon'] to see the possible values for this operation
     *
     * @throws \KlimAPI\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \KlimAPI\Model\PendingOrders
     */
    public function pendingByCarbon($pendingByCarbonRequest, $locale = 'DE', $currency = 'EUR', string $contentType = self::contentTypes['pendingByCarbon'][0])
    {
        list($response) = $this->pendingByCarbonWithHttpInfo($pendingByCarbonRequest, $locale, $currency, $contentType);
        return $response;
    }

    /**
     * Operation pendingByCarbonWithHttpInfo
     *
     * By Carbon
     *
     * @param  \KlimAPI\Model\PendingByCarbonRequest $pendingByCarbonRequest (required)
     * @param  string $locale The locale in which the response should be returned (optional, default to 'DE')
     * @param  string $currency The currency of the returned offset price (optional, default to 'EUR')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['pendingByCarbon'] to see the possible values for this operation
     *
     * @throws \KlimAPI\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \KlimAPI\Model\PendingOrders, HTTP status code, HTTP response headers (array of strings)
     */
    public function pendingByCarbonWithHttpInfo($pendingByCarbonRequest, $locale = 'DE', $currency = 'EUR', string $contentType = self::contentTypes['pendingByCarbon'][0])
    {
        $request = $this->pendingByCarbonRequest($pendingByCarbonRequest, $locale, $currency, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 200:
                    if ('\KlimAPI\Model\PendingOrders' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\KlimAPI\Model\PendingOrders' !== 'string') {
                            try {
                                $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                            } catch (\JsonException $exception) {
                                throw new ApiException(
                                    sprintf(
                                        'Error JSON decoding server response (%s)',
                                        $request->getUri()
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $content
                                );
                            }
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\KlimAPI\Model\PendingOrders', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\KlimAPI\Model\PendingOrders';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    try {
                        $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                    } catch (\JsonException $exception) {
                        throw new ApiException(
                            sprintf(
                                'Error JSON decoding server response (%s)',
                                $request->getUri()
                            ),
                            $statusCode,
                            $response->getHeaders(),
                            $content
                        );
                    }
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\KlimAPI\Model\PendingOrders',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation pendingByCarbonAsync
     *
     * By Carbon
     *
     * @param  \KlimAPI\Model\PendingByCarbonRequest $pendingByCarbonRequest (required)
     * @param  string $locale The locale in which the response should be returned (optional, default to 'DE')
     * @param  string $currency The currency of the returned offset price (optional, default to 'EUR')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['pendingByCarbon'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function pendingByCarbonAsync($pendingByCarbonRequest, $locale = 'DE', $currency = 'EUR', string $contentType = self::contentTypes['pendingByCarbon'][0])
    {
        return $this->pendingByCarbonAsyncWithHttpInfo($pendingByCarbonRequest, $locale, $currency, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation pendingByCarbonAsyncWithHttpInfo
     *
     * By Carbon
     *
     * @param  \KlimAPI\Model\PendingByCarbonRequest $pendingByCarbonRequest (required)
     * @param  string $locale The locale in which the response should be returned (optional, default to 'DE')
     * @param  string $currency The currency of the returned offset price (optional, default to 'EUR')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['pendingByCarbon'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function pendingByCarbonAsyncWithHttpInfo($pendingByCarbonRequest, $locale = 'DE', $currency = 'EUR', string $contentType = self::contentTypes['pendingByCarbon'][0])
    {
        $returnType = '\KlimAPI\Model\PendingOrders';
        $request = $this->pendingByCarbonRequest($pendingByCarbonRequest, $locale, $currency, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'pendingByCarbon'
     *
     * @param  \KlimAPI\Model\PendingByCarbonRequest $pendingByCarbonRequest (required)
     * @param  string $locale The locale in which the response should be returned (optional, default to 'DE')
     * @param  string $currency The currency of the returned offset price (optional, default to 'EUR')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['pendingByCarbon'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function pendingByCarbonRequest($pendingByCarbonRequest, $locale = 'DE', $currency = 'EUR', string $contentType = self::contentTypes['pendingByCarbon'][0])
    {

        // verify the required parameter 'pendingByCarbonRequest' is set
        if ($pendingByCarbonRequest === null || (is_array($pendingByCarbonRequest) && count($pendingByCarbonRequest) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $pendingByCarbonRequest when calling pendingByCarbon'
            );
        }




        $resourcePath = '/orders/pending/carbon';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // header params
        if ($locale !== null) {
            $headerParams['X-LOCALE'] = ObjectSerializer::toHeaderValue($locale);
        }
        // header params
        if ($currency !== null) {
            $headerParams['X-CURRENCY'] = ObjectSerializer::toHeaderValue($currency);
        }



        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($pendingByCarbonRequest)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($pendingByCarbonRequest));
            } else {
                $httpBody = $pendingByCarbonRequest;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('X-API-KEY');
        if ($apiKey !== null) {
            $headers['X-API-KEY'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'POST',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation pendingByPrice
     *
     * By Price
     *
     * @param  \KlimAPI\Model\PendingByPriceRequest $pendingByPriceRequest pendingByPriceRequest (required)
     * @param  string $locale The locale in which the response should be returned (optional, default to 'DE')
     * @param  string $currency The currency of the returned offset price (optional, default to 'EUR')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['pendingByPrice'] to see the possible values for this operation
     *
     * @throws \KlimAPI\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \KlimAPI\Model\PendingOrders
     */
    public function pendingByPrice($pendingByPriceRequest, $locale = 'DE', $currency = 'EUR', string $contentType = self::contentTypes['pendingByPrice'][0])
    {
        list($response) = $this->pendingByPriceWithHttpInfo($pendingByPriceRequest, $locale, $currency, $contentType);
        return $response;
    }

    /**
     * Operation pendingByPriceWithHttpInfo
     *
     * By Price
     *
     * @param  \KlimAPI\Model\PendingByPriceRequest $pendingByPriceRequest (required)
     * @param  string $locale The locale in which the response should be returned (optional, default to 'DE')
     * @param  string $currency The currency of the returned offset price (optional, default to 'EUR')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['pendingByPrice'] to see the possible values for this operation
     *
     * @throws \KlimAPI\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \KlimAPI\Model\PendingOrders, HTTP status code, HTTP response headers (array of strings)
     */
    public function pendingByPriceWithHttpInfo($pendingByPriceRequest, $locale = 'DE', $currency = 'EUR', string $contentType = self::contentTypes['pendingByPrice'][0])
    {
        $request = $this->pendingByPriceRequest($pendingByPriceRequest, $locale, $currency, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 200:
                    if ('\KlimAPI\Model\PendingOrders' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\KlimAPI\Model\PendingOrders' !== 'string') {
                            try {
                                $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                            } catch (\JsonException $exception) {
                                throw new ApiException(
                                    sprintf(
                                        'Error JSON decoding server response (%s)',
                                        $request->getUri()
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $content
                                );
                            }
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\KlimAPI\Model\PendingOrders', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\KlimAPI\Model\PendingOrders';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    try {
                        $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                    } catch (\JsonException $exception) {
                        throw new ApiException(
                            sprintf(
                                'Error JSON decoding server response (%s)',
                                $request->getUri()
                            ),
                            $statusCode,
                            $response->getHeaders(),
                            $content
                        );
                    }
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\KlimAPI\Model\PendingOrders',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation pendingByPriceAsync
     *
     * By Price
     *
     * @param  \KlimAPI\Model\PendingByPriceRequest $pendingByPriceRequest (required)
     * @param  string $locale The locale in which the response should be returned (optional, default to 'DE')
     * @param  string $currency The currency of the returned offset price (optional, default to 'EUR')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['pendingByPrice'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function pendingByPriceAsync($pendingByPriceRequest, $locale = 'DE', $currency = 'EUR', string $contentType = self::contentTypes['pendingByPrice'][0])
    {
        return $this->pendingByPriceAsyncWithHttpInfo($pendingByPriceRequest, $locale, $currency, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation pendingByPriceAsyncWithHttpInfo
     *
     * By Price
     *
     * @param  \KlimAPI\Model\PendingByPriceRequest $pendingByPriceRequest (required)
     * @param  string $locale The locale in which the response should be returned (optional, default to 'DE')
     * @param  string $currency The currency of the returned offset price (optional, default to 'EUR')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['pendingByPrice'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function pendingByPriceAsyncWithHttpInfo($pendingByPriceRequest, $locale = 'DE', $currency = 'EUR', string $contentType = self::contentTypes['pendingByPrice'][0])
    {
        $returnType = '\KlimAPI\Model\PendingOrders';
        $request = $this->pendingByPriceRequest($pendingByPriceRequest, $locale, $currency, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'pendingByPrice'
     *
     * @param  \KlimAPI\Model\PendingByPriceRequest $pendingByPriceRequest (required)
     * @param  string $locale The locale in which the response should be returned (optional, default to 'DE')
     * @param  string $currency The currency of the returned offset price (optional, default to 'EUR')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['pendingByPrice'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function pendingByPriceRequest($pendingByPriceRequest, $locale = 'DE', $currency = 'EUR', string $contentType = self::contentTypes['pendingByPrice'][0])
    {

        // verify the required parameter 'pendingByPriceRequest' is set
        if ($pendingByPriceRequest === null || (is_array($pendingByPriceRequest) && count($pendingByPriceRequest) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $pendingByPriceRequest when calling pendingByPrice'
            );
        }




        $resourcePath = '/orders/pending/price';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // header params
        if ($locale !== null) {
            $headerParams['X-LOCALE'] = ObjectSerializer::toHeaderValue($locale);
        }
        // header params
        if ($currency !== null) {
            $headerParams['X-CURRENCY'] = ObjectSerializer::toHeaderValue($currency);
        }



        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($pendingByPriceRequest)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($pendingByPriceRequest));
            } else {
                $httpBody = $pendingByPriceRequest;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('X-API-KEY');
        if ($apiKey !== null) {
            $headers['X-API-KEY'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'POST',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation process
     *
     * Process Pending Order
     *
     * @param  \KlimAPI\Model\ProcessOrder $processOrder processOrder (required)
     * @param  string $orderId The order id specified in the Order (required)
     * @param  string $locale The locale in which the response should be returned (optional, default to 'DE')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['process'] to see the possible values for this operation
     *
     * @throws \KlimAPI\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \KlimAPI\Model\Order
     */
    public function process($processOrder, $orderId, $locale = 'DE', string $contentType = self::contentTypes['process'][0])
    {
        list($response) = $this->processWithHttpInfo($processOrder, $orderId, $locale, $contentType);
        return $response;
    }

    /**
     * Operation processWithHttpInfo
     *
     * Process Pending Order
     *
     * @param  \KlimAPI\Model\ProcessOrder $processOrder (required)
     * @param  string $orderId The order id specified in the Order (required)
     * @param  string $locale The locale in which the response should be returned (optional, default to 'DE')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['process'] to see the possible values for this operation
     *
     * @throws \KlimAPI\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \KlimAPI\Model\Order, HTTP status code, HTTP response headers (array of strings)
     */
    public function processWithHttpInfo($processOrder, $orderId, $locale = 'DE', string $contentType = self::contentTypes['process'][0])
    {
        $request = $this->processRequest($processOrder, $orderId, $locale, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 200:
                    if ('\KlimAPI\Model\Order' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\KlimAPI\Model\Order' !== 'string') {
                            try {
                                $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                            } catch (\JsonException $exception) {
                                throw new ApiException(
                                    sprintf(
                                        'Error JSON decoding server response (%s)',
                                        $request->getUri()
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $content
                                );
                            }
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\KlimAPI\Model\Order', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\KlimAPI\Model\Order';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    try {
                        $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                    } catch (\JsonException $exception) {
                        throw new ApiException(
                            sprintf(
                                'Error JSON decoding server response (%s)',
                                $request->getUri()
                            ),
                            $statusCode,
                            $response->getHeaders(),
                            $content
                        );
                    }
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\KlimAPI\Model\Order',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation processAsync
     *
     * Process Pending Order
     *
     * @param  \KlimAPI\Model\ProcessOrder $processOrder (required)
     * @param  string $orderId The order id specified in the Order (required)
     * @param  string $locale The locale in which the response should be returned (optional, default to 'DE')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['process'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function processAsync($processOrder, $orderId, $locale = 'DE', string $contentType = self::contentTypes['process'][0])
    {
        return $this->processAsyncWithHttpInfo($processOrder, $orderId, $locale, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation processAsyncWithHttpInfo
     *
     * Process Pending Order
     *
     * @param  \KlimAPI\Model\ProcessOrder $processOrder (required)
     * @param  string $orderId The order id specified in the Order (required)
     * @param  string $locale The locale in which the response should be returned (optional, default to 'DE')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['process'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function processAsyncWithHttpInfo($processOrder, $orderId, $locale = 'DE', string $contentType = self::contentTypes['process'][0])
    {
        $returnType = '\KlimAPI\Model\Order';
        $request = $this->processRequest($processOrder, $orderId, $locale, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'process'
     *
     * @param  \KlimAPI\Model\ProcessOrder $processOrder (required)
     * @param  string $orderId The order id specified in the Order (required)
     * @param  string $locale The locale in which the response should be returned (optional, default to 'DE')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['process'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function processRequest($processOrder, $orderId, $locale = 'DE', string $contentType = self::contentTypes['process'][0])
    {

        // verify the required parameter 'processOrder' is set
        if ($processOrder === null || (is_array($processOrder) && count($processOrder) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $processOrder when calling process'
            );
        }

        // verify the required parameter 'orderId' is set
        if ($orderId === null || (is_array($orderId) && count($orderId) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $orderId when calling process'
            );
        }



        $resourcePath = '/orders/{order_id}/process';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // header params
        if ($locale !== null) {
            $headerParams['X-LOCALE'] = ObjectSerializer::toHeaderValue($locale);
        }

        // path params
        if ($orderId !== null) {
            $resourcePath = str_replace(
                '{' . 'order_id' . '}',
                ObjectSerializer::toPathValue($orderId),
                $resourcePath
            );
        }


        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($processOrder)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($processOrder));
            } else {
                $httpBody = $processOrder;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('X-API-KEY');
        if ($apiKey !== null) {
            $headers['X-API-KEY'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'POST',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation processCart
     *
     * Process Cart
     *
     * @param  \KlimAPI\Model\ProcessOrder $processOrder processOrder (required)
     * @param  string $storeIdent Setup a new store **[here](https://klimapi.com/dashboard/ecommerce)** to get a store ident (required)
     * @param  string $orderId The order id specified in the Order (required)
     * @param  string $locale The locale in which the response should be returned (optional, default to 'DE')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['processCart'] to see the possible values for this operation
     *
     * @throws \KlimAPI\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \KlimAPI\Model\Order
     */
    public function processCart($processOrder, $storeIdent, $orderId, $locale = 'DE', string $contentType = self::contentTypes['processCart'][0])
    {
        list($response) = $this->processCartWithHttpInfo($processOrder, $storeIdent, $orderId, $locale, $contentType);
        return $response;
    }

    /**
     * Operation processCartWithHttpInfo
     *
     * Process Cart
     *
     * @param  \KlimAPI\Model\ProcessOrder $processOrder (required)
     * @param  string $storeIdent Setup a new store **[here](https://klimapi.com/dashboard/ecommerce)** to get a store ident (required)
     * @param  string $orderId The order id specified in the Order (required)
     * @param  string $locale The locale in which the response should be returned (optional, default to 'DE')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['processCart'] to see the possible values for this operation
     *
     * @throws \KlimAPI\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \KlimAPI\Model\Order, HTTP status code, HTTP response headers (array of strings)
     */
    public function processCartWithHttpInfo($processOrder, $storeIdent, $orderId, $locale = 'DE', string $contentType = self::contentTypes['processCart'][0])
    {
        $request = $this->processCartRequest($processOrder, $storeIdent, $orderId, $locale, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 200:
                    if ('\KlimAPI\Model\Order' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\KlimAPI\Model\Order' !== 'string') {
                            try {
                                $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                            } catch (\JsonException $exception) {
                                throw new ApiException(
                                    sprintf(
                                        'Error JSON decoding server response (%s)',
                                        $request->getUri()
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $content
                                );
                            }
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\KlimAPI\Model\Order', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\KlimAPI\Model\Order';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    try {
                        $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                    } catch (\JsonException $exception) {
                        throw new ApiException(
                            sprintf(
                                'Error JSON decoding server response (%s)',
                                $request->getUri()
                            ),
                            $statusCode,
                            $response->getHeaders(),
                            $content
                        );
                    }
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\KlimAPI\Model\Order',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation processCartAsync
     *
     * Process Cart
     *
     * @param  \KlimAPI\Model\ProcessOrder $processOrder (required)
     * @param  string $storeIdent Setup a new store **[here](https://klimapi.com/dashboard/ecommerce)** to get a store ident (required)
     * @param  string $orderId The order id specified in the Order (required)
     * @param  string $locale The locale in which the response should be returned (optional, default to 'DE')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['processCart'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function processCartAsync($processOrder, $storeIdent, $orderId, $locale = 'DE', string $contentType = self::contentTypes['processCart'][0])
    {
        return $this->processCartAsyncWithHttpInfo($processOrder, $storeIdent, $orderId, $locale, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation processCartAsyncWithHttpInfo
     *
     * Process Cart
     *
     * @param  \KlimAPI\Model\ProcessOrder $processOrder (required)
     * @param  string $storeIdent Setup a new store **[here](https://klimapi.com/dashboard/ecommerce)** to get a store ident (required)
     * @param  string $orderId The order id specified in the Order (required)
     * @param  string $locale The locale in which the response should be returned (optional, default to 'DE')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['processCart'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function processCartAsyncWithHttpInfo($processOrder, $storeIdent, $orderId, $locale = 'DE', string $contentType = self::contentTypes['processCart'][0])
    {
        $returnType = '\KlimAPI\Model\Order';
        $request = $this->processCartRequest($processOrder, $storeIdent, $orderId, $locale, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'processCart'
     *
     * @param  \KlimAPI\Model\ProcessOrder $processOrder (required)
     * @param  string $storeIdent Setup a new store **[here](https://klimapi.com/dashboard/ecommerce)** to get a store ident (required)
     * @param  string $orderId The order id specified in the Order (required)
     * @param  string $locale The locale in which the response should be returned (optional, default to 'DE')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['processCart'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function processCartRequest($processOrder, $storeIdent, $orderId, $locale = 'DE', string $contentType = self::contentTypes['processCart'][0])
    {

        // verify the required parameter 'processOrder' is set
        if ($processOrder === null || (is_array($processOrder) && count($processOrder) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $processOrder when calling processCart'
            );
        }

        // verify the required parameter 'storeIdent' is set
        if ($storeIdent === null || (is_array($storeIdent) && count($storeIdent) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $storeIdent when calling processCart'
            );
        }

        // verify the required parameter 'orderId' is set
        if ($orderId === null || (is_array($orderId) && count($orderId) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $orderId when calling processCart'
            );
        }



        $resourcePath = '/stores/{store_ident}/cart/{order_id}/process';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // header params
        if ($locale !== null) {
            $headerParams['X-LOCALE'] = ObjectSerializer::toHeaderValue($locale);
        }

        // path params
        if ($storeIdent !== null) {
            $resourcePath = str_replace(
                '{' . 'store_ident' . '}',
                ObjectSerializer::toPathValue($storeIdent),
                $resourcePath
            );
        }
        // path params
        if ($orderId !== null) {
            $resourcePath = str_replace(
                '{' . 'order_id' . '}',
                ObjectSerializer::toPathValue($orderId),
                $resourcePath
            );
        }


        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($processOrder)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($processOrder));
            } else {
                $httpBody = $processOrder;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('X-API-KEY');
        if ($apiKey !== null) {
            $headers['X-API-KEY'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'POST',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation refund
     *
     * Refund Order
     *
     * @param  string $orderId The order id specified in the Order (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['refund'] to see the possible values for this operation
     *
     * @throws \KlimAPI\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return void
     */
    public function refund($orderId, string $contentType = self::contentTypes['refund'][0])
    {
        $this->refundWithHttpInfo($orderId, $contentType);
    }

    /**
     * Operation refundWithHttpInfo
     *
     * Refund Order
     *
     * @param  string $orderId The order id specified in the Order (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['refund'] to see the possible values for this operation
     *
     * @throws \KlimAPI\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function refundWithHttpInfo($orderId, string $contentType = self::contentTypes['refund'][0])
    {
        $request = $this->refundRequest($orderId, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            return [null, $statusCode, $response->getHeaders()];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
            }
            throw $e;
        }
    }

    /**
     * Operation refundAsync
     *
     * Refund Order
     *
     * @param  string $orderId The order id specified in the Order (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['refund'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function refundAsync($orderId, string $contentType = self::contentTypes['refund'][0])
    {
        return $this->refundAsyncWithHttpInfo($orderId, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation refundAsyncWithHttpInfo
     *
     * Refund Order
     *
     * @param  string $orderId The order id specified in the Order (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['refund'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function refundAsyncWithHttpInfo($orderId, string $contentType = self::contentTypes['refund'][0])
    {
        $returnType = '';
        $request = $this->refundRequest($orderId, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'refund'
     *
     * @param  string $orderId The order id specified in the Order (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['refund'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function refundRequest($orderId, string $contentType = self::contentTypes['refund'][0])
    {

        // verify the required parameter 'orderId' is set
        if ($orderId === null || (is_array($orderId) && count($orderId) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $orderId when calling refund'
            );
        }


        $resourcePath = '/orders/{order_id}/refund';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // path params
        if ($orderId !== null) {
            $resourcePath = str_replace(
                '{' . 'order_id' . '}',
                ObjectSerializer::toPathValue($orderId),
                $resourcePath
            );
        }


        $headers = $this->headerSelector->selectHeaders(
            [],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('X-API-KEY');
        if ($apiKey !== null) {
            $headers['X-API-KEY'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'DELETE',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation removeWebhook
     *
     * Remove Webhook
     *
     * @param  \KlimAPI\Model\AddWebhookRequest $addWebhookRequest addWebhookRequest (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['removeWebhook'] to see the possible values for this operation
     *
     * @throws \KlimAPI\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return void
     */
    public function removeWebhook($addWebhookRequest, string $contentType = self::contentTypes['removeWebhook'][0])
    {
        $this->removeWebhookWithHttpInfo($addWebhookRequest, $contentType);
    }

    /**
     * Operation removeWebhookWithHttpInfo
     *
     * Remove Webhook
     *
     * @param  \KlimAPI\Model\AddWebhookRequest $addWebhookRequest (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['removeWebhook'] to see the possible values for this operation
     *
     * @throws \KlimAPI\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function removeWebhookWithHttpInfo($addWebhookRequest, string $contentType = self::contentTypes['removeWebhook'][0])
    {
        $request = $this->removeWebhookRequest($addWebhookRequest, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            return [null, $statusCode, $response->getHeaders()];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
            }
            throw $e;
        }
    }

    /**
     * Operation removeWebhookAsync
     *
     * Remove Webhook
     *
     * @param  \KlimAPI\Model\AddWebhookRequest $addWebhookRequest (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['removeWebhook'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function removeWebhookAsync($addWebhookRequest, string $contentType = self::contentTypes['removeWebhook'][0])
    {
        return $this->removeWebhookAsyncWithHttpInfo($addWebhookRequest, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation removeWebhookAsyncWithHttpInfo
     *
     * Remove Webhook
     *
     * @param  \KlimAPI\Model\AddWebhookRequest $addWebhookRequest (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['removeWebhook'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function removeWebhookAsyncWithHttpInfo($addWebhookRequest, string $contentType = self::contentTypes['removeWebhook'][0])
    {
        $returnType = '';
        $request = $this->removeWebhookRequest($addWebhookRequest, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'removeWebhook'
     *
     * @param  \KlimAPI\Model\AddWebhookRequest $addWebhookRequest (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['removeWebhook'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function removeWebhookRequest($addWebhookRequest, string $contentType = self::contentTypes['removeWebhook'][0])
    {

        // verify the required parameter 'addWebhookRequest' is set
        if ($addWebhookRequest === null || (is_array($addWebhookRequest) && count($addWebhookRequest) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $addWebhookRequest when calling removeWebhook'
            );
        }


        $resourcePath = '/webhooks/remove';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;





        $headers = $this->headerSelector->selectHeaders(
            [],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($addWebhookRequest)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($addWebhookRequest));
            } else {
                $httpBody = $addWebhookRequest;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('X-API-KEY');
        if ($apiKey !== null) {
            $headers['X-API-KEY'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'DELETE',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation syncBulkStore
     *
     * Sync multiple Products
     *
     * @param  \KlimAPI\Model\Product[] $product product (required)
     * @param  string $storeIdent Setup a new store **[here](https://klimapi.com/dashboard/ecommerce)** to get a store ident (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['syncBulkStore'] to see the possible values for this operation
     *
     * @throws \KlimAPI\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return void
     */
    public function syncBulkStore($product, $storeIdent, string $contentType = self::contentTypes['syncBulkStore'][0])
    {
        $this->syncBulkStoreWithHttpInfo($product, $storeIdent, $contentType);
    }

    /**
     * Operation syncBulkStoreWithHttpInfo
     *
     * Sync multiple Products
     *
     * @param  \KlimAPI\Model\Product[] $product (required)
     * @param  string $storeIdent Setup a new store **[here](https://klimapi.com/dashboard/ecommerce)** to get a store ident (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['syncBulkStore'] to see the possible values for this operation
     *
     * @throws \KlimAPI\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function syncBulkStoreWithHttpInfo($product, $storeIdent, string $contentType = self::contentTypes['syncBulkStore'][0])
    {
        $request = $this->syncBulkStoreRequest($product, $storeIdent, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            return [null, $statusCode, $response->getHeaders()];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
            }
            throw $e;
        }
    }

    /**
     * Operation syncBulkStoreAsync
     *
     * Sync multiple Products
     *
     * @param  \KlimAPI\Model\Product[] $product (required)
     * @param  string $storeIdent Setup a new store **[here](https://klimapi.com/dashboard/ecommerce)** to get a store ident (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['syncBulkStore'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function syncBulkStoreAsync($product, $storeIdent, string $contentType = self::contentTypes['syncBulkStore'][0])
    {
        return $this->syncBulkStoreAsyncWithHttpInfo($product, $storeIdent, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation syncBulkStoreAsyncWithHttpInfo
     *
     * Sync multiple Products
     *
     * @param  \KlimAPI\Model\Product[] $product (required)
     * @param  string $storeIdent Setup a new store **[here](https://klimapi.com/dashboard/ecommerce)** to get a store ident (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['syncBulkStore'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function syncBulkStoreAsyncWithHttpInfo($product, $storeIdent, string $contentType = self::contentTypes['syncBulkStore'][0])
    {
        $returnType = '';
        $request = $this->syncBulkStoreRequest($product, $storeIdent, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'syncBulkStore'
     *
     * @param  \KlimAPI\Model\Product[] $product (required)
     * @param  string $storeIdent Setup a new store **[here](https://klimapi.com/dashboard/ecommerce)** to get a store ident (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['syncBulkStore'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function syncBulkStoreRequest($product, $storeIdent, string $contentType = self::contentTypes['syncBulkStore'][0])
    {

        // verify the required parameter 'product' is set
        if ($product === null || (is_array($product) && count($product) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $product when calling syncBulkStore'
            );
        }

        // verify the required parameter 'storeIdent' is set
        if ($storeIdent === null || (is_array($storeIdent) && count($storeIdent) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $storeIdent when calling syncBulkStore'
            );
        }


        $resourcePath = '/stores/{store_ident}/sync/bulk';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // path params
        if ($storeIdent !== null) {
            $resourcePath = str_replace(
                '{' . 'store_ident' . '}',
                ObjectSerializer::toPathValue($storeIdent),
                $resourcePath
            );
        }


        $headers = $this->headerSelector->selectHeaders(
            [],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($product)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($product));
            } else {
                $httpBody = $product;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('X-API-KEY');
        if ($apiKey !== null) {
            $headers['X-API-KEY'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'POST',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation syncStore
     *
     * Sync a single Product
     *
     * @param  \KlimAPI\Model\Product $product product (required)
     * @param  string $storeIdent Setup a new store **[here](https://klimapi.com/dashboard/ecommerce)** to get a store ident (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['syncStore'] to see the possible values for this operation
     *
     * @throws \KlimAPI\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return void
     */
    public function syncStore($product, $storeIdent, string $contentType = self::contentTypes['syncStore'][0])
    {
        $this->syncStoreWithHttpInfo($product, $storeIdent, $contentType);
    }

    /**
     * Operation syncStoreWithHttpInfo
     *
     * Sync a single Product
     *
     * @param  \KlimAPI\Model\Product $product (required)
     * @param  string $storeIdent Setup a new store **[here](https://klimapi.com/dashboard/ecommerce)** to get a store ident (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['syncStore'] to see the possible values for this operation
     *
     * @throws \KlimAPI\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function syncStoreWithHttpInfo($product, $storeIdent, string $contentType = self::contentTypes['syncStore'][0])
    {
        $request = $this->syncStoreRequest($product, $storeIdent, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            return [null, $statusCode, $response->getHeaders()];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
            }
            throw $e;
        }
    }

    /**
     * Operation syncStoreAsync
     *
     * Sync a single Product
     *
     * @param  \KlimAPI\Model\Product $product (required)
     * @param  string $storeIdent Setup a new store **[here](https://klimapi.com/dashboard/ecommerce)** to get a store ident (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['syncStore'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function syncStoreAsync($product, $storeIdent, string $contentType = self::contentTypes['syncStore'][0])
    {
        return $this->syncStoreAsyncWithHttpInfo($product, $storeIdent, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation syncStoreAsyncWithHttpInfo
     *
     * Sync a single Product
     *
     * @param  \KlimAPI\Model\Product $product (required)
     * @param  string $storeIdent Setup a new store **[here](https://klimapi.com/dashboard/ecommerce)** to get a store ident (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['syncStore'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function syncStoreAsyncWithHttpInfo($product, $storeIdent, string $contentType = self::contentTypes['syncStore'][0])
    {
        $returnType = '';
        $request = $this->syncStoreRequest($product, $storeIdent, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'syncStore'
     *
     * @param  \KlimAPI\Model\Product $product (required)
     * @param  string $storeIdent Setup a new store **[here](https://klimapi.com/dashboard/ecommerce)** to get a store ident (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['syncStore'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function syncStoreRequest($product, $storeIdent, string $contentType = self::contentTypes['syncStore'][0])
    {

        // verify the required parameter 'product' is set
        if ($product === null || (is_array($product) && count($product) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $product when calling syncStore'
            );
        }

        // verify the required parameter 'storeIdent' is set
        if ($storeIdent === null || (is_array($storeIdent) && count($storeIdent) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $storeIdent when calling syncStore'
            );
        }


        $resourcePath = '/stores/{store_ident}/sync';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // path params
        if ($storeIdent !== null) {
            $resourcePath = str_replace(
                '{' . 'store_ident' . '}',
                ObjectSerializer::toPathValue($storeIdent),
                $resourcePath
            );
        }


        $headers = $this->headerSelector->selectHeaders(
            [],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($product)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($product));
            } else {
                $httpBody = $product;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('X-API-KEY');
        if ($apiKey !== null) {
            $headers['X-API-KEY'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'POST',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Create http client option
     *
     * @throws \RuntimeException on file opening failure
     * @return array of http client options
     */
    protected function createHttpClientOption()
    {
        $options = [];
        if ($this->config->getDebug()) {
            $options[RequestOptions::DEBUG] = fopen($this->config->getDebugFile(), 'a');
            if (!$options[RequestOptions::DEBUG]) {
                throw new \RuntimeException('Failed to open the debug file: ' . $this->config->getDebugFile());
            }
        }

        return $options;
    }
}
