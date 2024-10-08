## Methods



## `addWebhook()`

```php
addWebhook($addWebhookRequest)
```

Add Webhook

Add a new Webhook to an integration. The webhook will be triggered by the given trigger.

### Example

```php
<?php
$klimapi = new KlimAPI\Api\KlimApi('your-private-api-key');

$addWebhookRequest = new \KlimAPI\Model\AddWebhookRequest(); // \KlimAPI\Model\AddWebhookRequest

$klimapi->addWebhook($addWebhookRequest);
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **addWebhookRequest** | [**\KlimAPI\Model\AddWebhookRequest**](../Model/AddWebhookRequest.md)|  | |

### Return type

void (empty response body)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `calculate()`

```php
calculate($calculateRequest): \KlimAPI\Model\CalculationResults
```

Calculate

**IMPORTANT:** Calling this route using API keys created in the **sandbox mode** is returning **random numbers** instead of **real calculations**.

### Example

```php
<?php
$klimapi = new KlimAPI\Api\KlimApi('your-private-api-key');

$calculateRequest = new \KlimAPI\Model\CalculateRequest(); // \KlimAPI\Model\CalculateRequest | Choose up to 100 Elements from the **[Calculation Options](https://klimapi.com/resources/factors)**. In this example it is just **Travel by Car**.

$result = $klimapi->calculate($calculateRequest);
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **calculateRequest** | [**\KlimAPI\Model\CalculateRequest**](../Model/CalculateRequest.md)| Choose up to 100 Elements from the **[Calculation Options](https://klimapi.com/resources/factors)**. In this example it is just **Travel by Car**. | |

### Return type

[**\KlimAPI\Model\CalculationResults**](../Model/CalculationResults.md)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `calculateCart()`

```php
calculateCart($cartItem, $storeIdent, $locale, $currency): \KlimAPI\Model\CartResult
```

Calculate

**IMPORTANT:** Calling this route using API keys created in the **sandbox mode** is returning **random numbers** instead of **real calculations**.

### Example

```php
<?php
$klimapi = new KlimAPI\Api\KlimApi('your-private-api-key');

$cartItem = array(new \KlimAPI\Model\CartItem()); // \KlimAPI\Model\CartItem[]
$storeIdent = 'storeIdent_example'; // string | Setup a new store **[here](https://klimapi.com/dashboard/ecommerce)** to get a store ident
$locale = 'DE'; // string | The locale in which the response should be returned
$currency = 'EUR'; // string | The currency of the returned offset price

$result = $klimapi->calculateCart($cartItem, $storeIdent, $locale, $currency);
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **cartItem** | [**\KlimAPI\Model\CartItem[]**](../Model/CartItem.md)|  | |
| **storeIdent** | **string**| Setup a new store **[here](https://klimapi.com/dashboard/ecommerce)** to get a store ident | |
| **locale** | **string**| The locale in which the response should be returned | [optional] [default to &#39;DE&#39;] |
| **currency** | **string**| The currency of the returned offset price | [optional] [default to &#39;EUR&#39;] |

### Return type

[**\KlimAPI\Model\CartResult**](../Model/CartResult.md)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getCategories()`

```php
getCategories($locale): \KlimAPI\Model\Category[]
```

Get all Categories

Use the method to get all activated categories for the given API key.

### Example

```php
<?php
$klimapi = new KlimAPI\Api\KlimApi('your-private-api-key');

$locale = 'DE'; // string | The locale in which the response should be returned

$result = $klimapi->getCategories($locale);
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **locale** | **string**| The locale in which the response should be returned | [optional] [default to &#39;DE&#39;] |

### Return type

[**\KlimAPI\Model\Category[]**](../Model/Category.md)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getCertificationAuthorities()`

```php
getCertificationAuthorities(): \KlimAPI\Model\CertificationAuthority[]
```

Get all Certification Authorities

Use this endpoint to get all external certification authorities we are using for our compensation projects. Learn more about our [Portfolio](https://klimapi.com/portfolio).

### Example

```php
<?php
$klimapi = new KlimAPI\Api\KlimApi('your-private-api-key');


$result = $klimapi->getCertificationAuthorities();
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\KlimAPI\Model\CertificationAuthority[]**](../Model/CertificationAuthority.md)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getMetrics()`

```php
getMetrics($getMetricsRequest): \KlimAPI\Model\OrderMetrics
```

Order Metrics

Get metrics to all orders

### Example

```php
<?php
$klimapi = new KlimAPI\Api\KlimApi('your-private-api-key');

$getMetricsRequest = new \KlimAPI\Model\GetMetricsRequest(); // \KlimAPI\Model\GetMetricsRequest | 

$result = $klimapi->getMetrics($getMetricsRequest);
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **getMetricsRequest** | [**\KlimAPI\Model\GetMetricsRequest**](../Model/GetMetricsRequest.md)|  | |

### Return type

[**\KlimAPI\Model\OrderMetrics**](../Model/OrderMetrics.md)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getOrder()`

```php
getOrder($orderId, $locale): \KlimAPI\Model\Order
```

Get Order

Here you can request information about a specific Order.

### Example

```php
<?php
$klimapi = new KlimAPI\Api\KlimApi('your-private-api-key');

$orderId = 'orderId_example'; // string | You can get the order_id from several endpoints, for example when creating an Order.
$locale = 'DE'; // string | The locale in which the response should be returned

$result = $klimapi->getOrder($orderId, $locale);
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **orderId** | **string**| You can get the order_id from several endpoints, for example when creating an Order. | |
| **locale** | **string**| The locale in which the response should be returned | [optional] [default to &#39;DE&#39;] |

### Return type

[**\KlimAPI\Model\Order**](../Model/Order.md)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getOrders()`

```php
getOrders($getOrdersRequest, $locale): \KlimAPI\Model\MetadataOrders
```

Get Orders

Query all orders

### Example

```php
<?php
$klimapi = new KlimAPI\Api\KlimApi('your-private-api-key');

$getOrdersRequest = new \KlimAPI\Model\GetOrdersRequest(); // \KlimAPI\Model\GetOrdersRequest | 
$locale = 'DE'; // string | The locale in which the response should be returned

$result = $klimapi->getOrders($getOrdersRequest, $locale);
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **getOrdersRequest** | [**\KlimAPI\Model\GetOrdersRequest**](../Model/GetOrdersRequest.md)|  | |
| **locale** | **string**| The locale in which the response should be returned | [optional] [default to &#39;DE&#39;] |

### Return type

[**\KlimAPI\Model\MetadataOrders**](../Model/MetadataOrders.md)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getPaymentLink()`

```php
getPaymentLink($paymentLinkId, $locale): \KlimAPI\Model\CheckoutLink
```

Get Checkout Link

Here you can request information about a specific Checkout Link.

### Example

```php
<?php
$klimapi = new KlimAPI\Api\KlimApi('your-private-api-key');

$paymentLinkId = 'paymentLinkId_example'; // string | The identifier of the checkout link that you want to be returned.
$locale = 'DE'; // string | The locale in which the response should be returned

$result = $klimapi->getPaymentLink($paymentLinkId, $locale);
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **paymentLinkId** | **string**| The identifier of the checkout link that you want to be returned. | |
| **locale** | **string**| The locale in which the response should be returned | [optional] [default to &#39;DE&#39;] |

### Return type

[**\KlimAPI\Model\CheckoutLink**](../Model/CheckoutLink.md)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getProject()`

```php
getProject($projectId, $locale): \KlimAPI\Model\Project
```

Get Project

Here you can request information to every project in our database.

### Example

```php
<?php
$klimapi = new KlimAPI\Api\KlimApi('your-private-api-key');

$projectId = 'projectId_example'; // string | You can get the project_id from several endpoints, for example when creating an Order.
$locale = 'DE'; // string | The locale in which the response should be returned

$result = $klimapi->getProject($projectId, $locale);
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **projectId** | **string**| You can get the project_id from several endpoints, for example when creating an Order. | |
| **locale** | **string**| The locale in which the response should be returned | [optional] [default to &#39;DE&#39;] |

### Return type

[**\KlimAPI\Model\Project**](../Model/Project.md)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getProjects()`

```php
getProjects($locale): \KlimAPI\Model\Project[]
```

Get all supported Projects

Get all projects you supported with the given API key.

### Example

```php
<?php
$klimapi = new KlimAPI\Api\KlimApi('your-private-api-key');

$locale = 'DE'; // string | The locale in which the response should be returned

$result = $klimapi->getProjects($locale);
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **locale** | **string**| The locale in which the response should be returned | [optional] [default to &#39;DE&#39;] |

### Return type

[**\KlimAPI\Model\Project[]**](../Model/Project.md)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `linkByCalculation()`

```php
linkByCalculation($linkByCalculationRequest, $locale, $currency): \KlimAPI\Model\CheckoutLinksCalculated
```

By Calculation

**IMPORTANT:** Calling this route using API keys created in the **sandbox mode** is returning **random numbers** instead of **real calculations**.

### Example

```php
<?php
$klimapi = new KlimAPI\Api\KlimApi('your-private-api-key');

$linkByCalculationRequest = new \KlimAPI\Model\LinkByCalculationRequest(); // \KlimAPI\Model\LinkByCalculationRequest | Choose up to 100 Elements from the **[Calculation Options](https://klimapi.com/resources/factors)**. In this example it is just **Travel by Car**.
$locale = 'DE'; // string | The locale in which the response should be returned
$currency = 'EUR'; // string | The currency of the returned offset price

$result = $klimapi->linkByCalculation($linkByCalculationRequest, $locale, $currency);
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **linkByCalculationRequest** | [**\KlimAPI\Model\LinkByCalculationRequest**](../Model/LinkByCalculationRequest.md)| Choose up to 100 Elements from the **[Calculation Options](https://klimapi.com/resources/factors)**. In this example it is just **Travel by Car**. | |
| **locale** | **string**| The locale in which the response should be returned | [optional] [default to &#39;DE&#39;] |
| **currency** | **string**| The currency of the returned offset price | [optional] [default to &#39;EUR&#39;] |

### Return type

[**\KlimAPI\Model\CheckoutLinksCalculated**](../Model/CheckoutLinksCalculated.md)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `linkByCarbon()`

```php
linkByCarbon($linkByCarbonRequest, $locale, $currency): \KlimAPI\Model\CheckoutLinks
```

By Carbon

Get the compensation instantly by kilogram CO2e.

### Example

```php
<?php
$klimapi = new KlimAPI\Api\KlimApi('your-private-api-key');

$linkByCarbonRequest = new \KlimAPI\Model\LinkByCarbonRequest(); // \KlimAPI\Model\LinkByCarbonRequest
$locale = 'DE'; // string | The locale in which the response should be returned
$currency = 'EUR'; // string | The currency of the returned offset price

$result = $klimapi->linkByCarbon($linkByCarbonRequest, $locale, $currency);
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **linkByCarbonRequest** | [**\KlimAPI\Model\LinkByCarbonRequest**](../Model/LinkByCarbonRequest.md)|  | [optional] |
| **locale** | **string**| The locale in which the response should be returned | [optional] [default to &#39;DE&#39;] |
| **currency** | **string**| The currency of the returned offset price | [optional] [default to &#39;EUR&#39;] |

### Return type

[**\KlimAPI\Model\CheckoutLinks**](../Model/CheckoutLinks.md)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `linkByPrice()`

```php
linkByPrice($linkByPriceRequest, $locale, $currency): \KlimAPI\Model\CheckoutLinks
```

By Price

Get the compensation instantly by price.

### Example

```php
<?php
$klimapi = new KlimAPI\Api\KlimApi('your-private-api-key');

$linkByPriceRequest = new \KlimAPI\Model\LinkByPriceRequest(); // \KlimAPI\Model\LinkByPriceRequest
$locale = 'DE'; // string | The locale in which the response should be returned
$currency = 'EUR'; // string | The currency of the returned offset price

$result = $klimapi->linkByPrice($linkByPriceRequest, $locale, $currency);
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **linkByPriceRequest** | [**\KlimAPI\Model\LinkByPriceRequest**](../Model/LinkByPriceRequest.md)|  | [optional] |
| **locale** | **string**| The locale in which the response should be returned | [optional] [default to &#39;DE&#39;] |
| **currency** | **string**| The currency of the returned offset price | [optional] [default to &#39;EUR&#39;] |

### Return type

[**\KlimAPI\Model\CheckoutLinks**](../Model/CheckoutLinks.md)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `me()`

```php
me(): object
```

Get Authenticated User

Get Information about the Authenticated User, the Integration and the given API Key.

### Example

```php
<?php
$klimapi = new KlimAPI\Api\KlimApi('your-private-api-key');


$result = $klimapi->me();
```

### Parameters

This endpoint does not need any parameter.

### Return type

**object**

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `orderByCalculation()`

```php
orderByCalculation($orderByCalculationRequest, $locale, $currency): \KlimAPI\Model\OrderCalculated
```

By Calculation

**IMPORTANT:** Calling this route using API keys created in the **sandbox mode** is returning **random numbers** instead of **real calculations**.

### Example

```php
<?php
$klimapi = new KlimAPI\Api\KlimApi('your-private-api-key');

$orderByCalculationRequest = new \KlimAPI\Model\OrderByCalculationRequest(); // \KlimAPI\Model\OrderByCalculationRequest | Choose up to 100 Elements from the **[Calculation Options](https://klimapi.com/resources/factors)**. In this example it is just **Travel by Car**.
$locale = 'DE'; // string | The locale in which the response should be returned
$currency = 'EUR'; // string | The currency of the returned offset price

$result = $klimapi->orderByCalculation($orderByCalculationRequest, $locale, $currency);
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **orderByCalculationRequest** | [**\KlimAPI\Model\OrderByCalculationRequest**](../Model/OrderByCalculationRequest.md)| Choose up to 100 Elements from the **[Calculation Options](https://klimapi.com/resources/factors)**. In this example it is just **Travel by Car**. | |
| **locale** | **string**| The locale in which the response should be returned | [optional] [default to &#39;DE&#39;] |
| **currency** | **string**| The currency of the returned offset price | [optional] [default to &#39;EUR&#39;] |

### Return type

[**\KlimAPI\Model\OrderCalculated**](../Model/OrderCalculated.md)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `orderByCarbon()`

```php
orderByCarbon($buyAmount, $locale, $currency): \KlimAPI\Model\Order
```

By Carbon

Get the compensation instantly by kilogram CO2e. For this route the API key has no limits.

### Example

```php
<?php
$klimapi = new KlimAPI\Api\KlimApi('your-private-api-key');

$buyAmount = new \KlimAPI\Model\BuyAmount(); // \KlimAPI\Model\BuyAmount
$locale = 'DE'; // string | The locale in which the response should be returned
$currency = 'EUR'; // string | The currency of the returned offset price

$result = $klimapi->orderByCarbon($buyAmount, $locale, $currency);
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **buyAmount** | [**\KlimAPI\Model\BuyAmount**](../Model/BuyAmount.md)|  | [optional] |
| **locale** | **string**| The locale in which the response should be returned | [optional] [default to &#39;DE&#39;] |
| **currency** | **string**| The currency of the returned offset price | [optional] [default to &#39;EUR&#39;] |

### Return type

[**\KlimAPI\Model\Order**](../Model/Order.md)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `orderByPrice()`

```php
orderByPrice($buyPrice, $locale, $currency): \KlimAPI\Model\Order
```

By Price

Get the compensation instantly by price. For this route the API key has no limits.

### Example

```php
<?php
$klimapi = new KlimAPI\Api\KlimApi('your-private-api-key');

$buyPrice = new \KlimAPI\Model\BuyPrice(); // \KlimAPI\Model\BuyPrice
$locale = 'DE'; // string | The locale in which the response should be returned
$currency = 'EUR'; // string | The currency of the returned offset price

$result = $klimapi->orderByPrice($buyPrice, $locale, $currency);
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **buyPrice** | [**\KlimAPI\Model\BuyPrice**](../Model/BuyPrice.md)|  | [optional] |
| **locale** | **string**| The locale in which the response should be returned | [optional] [default to &#39;DE&#39;] |
| **currency** | **string**| The currency of the returned offset price | [optional] [default to &#39;EUR&#39;] |

### Return type

[**\KlimAPI\Model\Order**](../Model/Order.md)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `pendingByCalculation()`

```php
pendingByCalculation($pendingByCalculationRequest, $locale, $currency): \KlimAPI\Model\PendingOrdersCalculated
```

By Calculation

**IMPORTANT:** Calling this route using API keys created in the **sandbox mode** is returning **random numbers** instead of **real calculations**.

### Example

```php
<?php
$klimapi = new KlimAPI\Api\KlimApi('your-private-api-key');

$pendingByCalculationRequest = new \KlimAPI\Model\PendingByCalculationRequest(); // \KlimAPI\Model\PendingByCalculationRequest | Choose up to 100 Elements from the **[Calculation Options](https://klimapi.com/resources/factors)**. In this example it is just **Travel by Car**.
$locale = 'DE'; // string | The locale in which the response should be returned
$currency = 'EUR'; // string | The currency of the returned offset price

$result = $klimapi->pendingByCalculation($pendingByCalculationRequest, $locale, $currency);
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **pendingByCalculationRequest** | [**\KlimAPI\Model\PendingByCalculationRequest**](../Model/PendingByCalculationRequest.md)| Choose up to 100 Elements from the **[Calculation Options](https://klimapi.com/resources/factors)**. In this example it is just **Travel by Car**. | |
| **locale** | **string**| The locale in which the response should be returned | [optional] [default to &#39;DE&#39;] |
| **currency** | **string**| The currency of the returned offset price | [optional] [default to &#39;EUR&#39;] |

### Return type

[**\KlimAPI\Model\PendingOrdersCalculated**](../Model/PendingOrdersCalculated.md)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `pendingByCarbon()`

```php
pendingByCarbon($pendingByCarbonRequest, $locale, $currency): \KlimAPI\Model\PendingOrders
```

By Carbon

Here you can create an Order by kilogram CO2e. Please note the request limits of your API key, normally it is 15000kg per request. We are happy to increase the limits on request, please write us a message.

### Example

```php
<?php
$klimapi = new KlimAPI\Api\KlimApi('your-private-api-key');

$pendingByCarbonRequest = new \KlimAPI\Model\PendingByCarbonRequest(); // \KlimAPI\Model\PendingByCarbonRequest
$locale = 'DE'; // string | The locale in which the response should be returned
$currency = 'EUR'; // string | The currency of the returned offset price

$result = $klimapi->pendingByCarbon($pendingByCarbonRequest, $locale, $currency);
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **pendingByCarbonRequest** | [**\KlimAPI\Model\PendingByCarbonRequest**](../Model/PendingByCarbonRequest.md)|  | |
| **locale** | **string**| The locale in which the response should be returned | [optional] [default to &#39;DE&#39;] |
| **currency** | **string**| The currency of the returned offset price | [optional] [default to &#39;EUR&#39;] |

### Return type

[**\KlimAPI\Model\PendingOrders**](../Model/PendingOrders.md)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `pendingByPrice()`

```php
pendingByPrice($pendingByPriceRequest, $locale, $currency): \KlimAPI\Model\PendingOrders
```

By Price

Here you can create an Order by price. Please note the request limits of your API key, normally it is 250€ per request. We are happy to increase the limits on request, please write us a message.

### Example

```php
<?php
$klimapi = new KlimAPI\Api\KlimApi('your-private-api-key');

$pendingByPriceRequest = new \KlimAPI\Model\PendingByPriceRequest(); // \KlimAPI\Model\PendingByPriceRequest
$locale = 'DE'; // string | The locale in which the response should be returned
$currency = 'EUR'; // string | The currency of the returned offset price

$result = $klimapi->pendingByPrice($pendingByPriceRequest, $locale, $currency);
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **pendingByPriceRequest** | [**\KlimAPI\Model\PendingByPriceRequest**](../Model/PendingByPriceRequest.md)|  | |
| **locale** | **string**| The locale in which the response should be returned | [optional] [default to &#39;DE&#39;] |
| **currency** | **string**| The currency of the returned offset price | [optional] [default to &#39;EUR&#39;] |

### Return type

[**\KlimAPI\Model\PendingOrders**](../Model/PendingOrders.md)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `process()`

```php
process($processOrder, $orderId, $locale): \KlimAPI\Model\Order
```

Process Pending Order

You accepted the given order. You may now show a confirmation or provide the link to the certificate.

### Example

```php
<?php
$klimapi = new KlimAPI\Api\KlimApi('your-private-api-key');

$processOrder = new \KlimAPI\Model\ProcessOrder(); // \KlimAPI\Model\ProcessOrder
$orderId = 'orderId_example'; // string | The order id specified in the Order
$locale = 'DE'; // string | The locale in which the response should be returned

$result = $klimapi->process($processOrder, $orderId, $locale);
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **processOrder** | [**\KlimAPI\Model\ProcessOrder**](../Model/ProcessOrder.md)|  | |
| **orderId** | **string**| The order id specified in the Order | |
| **locale** | **string**| The locale in which the response should be returned | [optional] [default to &#39;DE&#39;] |

### Return type

[**\KlimAPI\Model\Order**](../Model/Order.md)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `processCart()`

```php
processCart($processOrder, $storeIdent, $orderId, $locale): \KlimAPI\Model\Order
```

Process Cart

Process a given cart to offset the cart's emissions

### Example

```php
<?php
$klimapi = new KlimAPI\Api\KlimApi('your-private-api-key');

$processOrder = new \KlimAPI\Model\ProcessOrder(); // \KlimAPI\Model\ProcessOrder
$storeIdent = 'storeIdent_example'; // string | Setup a new store **[here](https://klimapi.com/dashboard/ecommerce)** to get a store ident
$orderId = 'orderId_example'; // string | The order id specified in the Order
$locale = 'DE'; // string | The locale in which the response should be returned

$result = $klimapi->processCart($processOrder, $storeIdent, $orderId, $locale);
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **processOrder** | [**\KlimAPI\Model\ProcessOrder**](../Model/ProcessOrder.md)|  | |
| **storeIdent** | **string**| Setup a new store **[here](https://klimapi.com/dashboard/ecommerce)** to get a store ident | |
| **orderId** | **string**| The order id specified in the Order | |
| **locale** | **string**| The locale in which the response should be returned | [optional] [default to &#39;DE&#39;] |

### Return type

[**\KlimAPI\Model\Order**](../Model/Order.md)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `refund()`

```php
refund($orderId)
```

Refund Order

**Refunding an Order is only available for 30 days after the initial create/process call. Refunding is not available for Checkout Link Orders**

### Example

```php
<?php
$klimapi = new KlimAPI\Api\KlimApi('your-private-api-key');

$orderId = 'orderId_example'; // string | The order id specified in the Order

$klimapi->refund($orderId);
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **orderId** | **string**| The order id specified in the Order | |

### Return type

void (empty response body)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `removeWebhook()`

```php
removeWebhook($addWebhookRequest)
```

Remove Webhook

Remove a Webhook from an integration.

### Example

```php
<?php
$klimapi = new KlimAPI\Api\KlimApi('your-private-api-key');

$addWebhookRequest = new \KlimAPI\Model\AddWebhookRequest(); // \KlimAPI\Model\AddWebhookRequest

$klimapi->removeWebhook($addWebhookRequest);
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **addWebhookRequest** | [**\KlimAPI\Model\AddWebhookRequest**](../Model/AddWebhookRequest.md)|  | |

### Return type

void (empty response body)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `syncBulkStore()`

```php
syncBulkStore($product, $storeIdent)
```

Sync multiple Products

Use the method to sync multiple products from the given store to our database.

### Example

```php
<?php
$klimapi = new KlimAPI\Api\KlimApi('your-private-api-key');

$product = array(new \KlimAPI\Model\Product()); // \KlimAPI\Model\Product[]
$storeIdent = 'storeIdent_example'; // string | Setup a new store **[here](https://klimapi.com/dashboard/ecommerce)** to get a store ident

$klimapi->syncBulkStore($product, $storeIdent);
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **product** | [**\KlimAPI\Model\Product[]**](../Model/Product.md)|  | |
| **storeIdent** | **string**| Setup a new store **[here](https://klimapi.com/dashboard/ecommerce)** to get a store ident | |

### Return type

void (empty response body)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `syncStore()`

```php
syncStore($product, $storeIdent)
```

Sync a single Product

Use the method to sync a single product from the given store to our database.

### Example

```php
<?php
$klimapi = new KlimAPI\Api\KlimApi('your-private-api-key');

$product = new \KlimAPI\Model\Product(); // \KlimAPI\Model\Product
$storeIdent = 'storeIdent_example'; // string | Setup a new store **[here](https://klimapi.com/dashboard/ecommerce)** to get a store ident

$klimapi->syncStore($product, $storeIdent);
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **product** | [**\KlimAPI\Model\Product**](../Model/Product.md)|  | |
| **storeIdent** | **string**| Setup a new store **[here](https://klimapi.com/dashboard/ecommerce)** to get a store ident | |

### Return type

void (empty response body)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
