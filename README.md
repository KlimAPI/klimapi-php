# klimapi-php

This API offers you the possibility to calculate and offset emissions, create checkout links, get statistics and much more.

For more information, please visit [https://klimapi.com/resources/docs](https://klimapi.com/resources/docs).

## Installation

`composer require klimapi/php`

## Setup new API Instance

```php
$klimapi = new KlimAPI\Api\KlimApi('your-private-api-key');
```

## Examples

### Create pending Order by Carbon

```php
$pendingByCarbonRequest = new \KlimAPI\Model\PendingByCarbonRequest([
    'kgCO2e' => 200
]);

$order = $klimapi->pendingByCarbon($pendingByCarbonRequest);
```

### Process Order

```php
$processOrder = new \KlimAPI\Model\ProcessOrder([
'recipientName' => 'Test Customer'
]);
$orderId = 'CA-0000-00000000';

$processed_order = $klimapi->process($processOrder, $orderId);
```

## Methods

Method | HTTP request | Description
------------- | ------------- | -------------
[**addWebhook**](docs/Api/KlimApi.md#addwebhook) | **POST** /webhooks/add | Add Webhook
[**calculate**](docs/Api/KlimApi.md#calculate) | **POST** /calculate | Calculate
[**calculateCart**](docs/Api/KlimApi.md#calculatecart) | **POST** /stores/{store_ident}/cart | Calculate
[**getCategories**](docs/Api/KlimApi.md#getcategories) | **GET** /categories | Get all Categories
[**getCertificationAuthorities**](docs/Api/KlimApi.md#getcertificationauthorities) | **GET** /certification_authorities | Get all Certification Authorities
[**getMetrics**](docs/Api/KlimApi.md#getmetrics) | **POST** /metrics | Order Metrics
[**getOrder**](docs/Api/KlimApi.md#getorder) | **GET** /orders/{order_id} | Get Order
[**getOrders**](docs/Api/KlimApi.md#getorders) | **POST** /orders | Get Orders
[**getPaymentLink**](docs/Api/KlimApi.md#getpaymentlink) | **GET** /orders/link/{payment_link_id} | Get Checkout Link
[**getProject**](docs/Api/KlimApi.md#getproject) | **GET** /projects/{project_id} | Get Project
[**getProjects**](docs/Api/KlimApi.md#getprojects) | **GET** /projects | Get all supported Projects
[**linkByCalculation**](docs/Api/KlimApi.md#linkbycalculation) | **POST** /orders/link/calculate | By calculation
[**linkByCarbon**](docs/Api/KlimApi.md#linkbycarbon) | **POST** /orders/link/carbon | By carbon
[**linkByPrice**](docs/Api/KlimApi.md#linkbyprice) | **POST** /orders/link/price | By price
[**me**](docs/Api/KlimApi.md#me) | **GET** /me | Get Authenticated User
[**orderByCalculation**](docs/Api/KlimApi.md#orderbycalculation) | **POST** /orders/process/calculate | By calculation
[**orderByCarbon**](docs/Api/KlimApi.md#orderbycarbon) | **POST** /orders/process/carbon | By carbon
[**orderByPrice**](docs/Api/KlimApi.md#orderbyprice) | **POST** /orders/process/price | By price
[**pendingByCalculation**](docs/Api/KlimApi.md#pendingbycalculation) | **POST** /orders/pending/calculate | By calculation
[**pendingByCarbon**](docs/Api/KlimApi.md#pendingbycarbon) | **POST** /orders/pending/carbon | By carbon
[**pendingByPrice**](docs/Api/KlimApi.md#pendingbyprice) | **POST** /orders/pending/price | By price
[**process**](docs/Api/KlimApi.md#process) | **POST** /orders/{order_id}/process | Process pending Order
[**processCart**](docs/Api/KlimApi.md#processcart) | **POST** /stores/{store_ident}/cart/{order_id}/process | Process cart
[**refund**](docs/Api/KlimApi.md#refund) | **DELETE** /orders/{order_id}/refund | Refund Order
[**removeWebhook**](docs/Api/KlimApi.md#removewebhook) | **DELETE** /webhooks/remove | Remove Webhook
[**syncBulkStore**](docs/Api/KlimApi.md#syncbulkstore) | **POST** /stores/{store_ident}/sync/bulk | Sync multiple Products
[**syncStore**](docs/Api/KlimApi.md#syncstore) | **POST** /stores/{store_ident}/sync | Sync a single Product


## Models

- [AddWebhookRequest](docs/Model/AddWebhookRequest.md)
- [BuyAmount](docs/Model/BuyAmount.md)
- [BuyPrice](docs/Model/BuyPrice.md)
- [CalculateRequest](docs/Model/CalculateRequest.md)
- [CalculationResult](docs/Model/CalculationResult.md)
- [CalculationResults](docs/Model/CalculationResults.md)
- [CartItem](docs/Model/CartItem.md)
- [CartResult](docs/Model/CartResult.md)
- [CartResultCalculationResultsInner](docs/Model/CartResultCalculationResultsInner.md)
- [CartResultSettings](docs/Model/CartResultSettings.md)
- [Category](docs/Model/Category.md)
- [CertificationAuthority](docs/Model/CertificationAuthority.md)
- [CheckoutLink](docs/Model/CheckoutLink.md)
- [CheckoutLinkCalculated](docs/Model/CheckoutLinkCalculated.md)
- [CheckoutLinks](docs/Model/CheckoutLinks.md)
- [CheckoutLinksCalculated](docs/Model/CheckoutLinksCalculated.md)
- [GetMetricsRequest](docs/Model/GetMetricsRequest.md)
- [GetOrdersRequest](docs/Model/GetOrdersRequest.md)
- [GetOrdersRequestFilters](docs/Model/GetOrdersRequestFilters.md)
- [LinkByCalculationRequest](docs/Model/LinkByCalculationRequest.md)
- [LinkByCarbonRequest](docs/Model/LinkByCarbonRequest.md)
- [LinkByPriceRequest](docs/Model/LinkByPriceRequest.md)
- [MetadataOrders](docs/Model/MetadataOrders.md)
- [Order](docs/Model/Order.md)
- [OrderByCalculationRequest](docs/Model/OrderByCalculationRequest.md)
- [OrderCalculated](docs/Model/OrderCalculated.md)
- [OrderMetrics](docs/Model/OrderMetrics.md)
- [OrderRecipient](docs/Model/OrderRecipient.md)
- [PendingByCalculationRequest](docs/Model/PendingByCalculationRequest.md)
- [PendingByCarbonRequest](docs/Model/PendingByCarbonRequest.md)
- [PendingByPriceRequest](docs/Model/PendingByPriceRequest.md)
- [PendingOrder](docs/Model/PendingOrder.md)
- [PendingOrderCalculated](docs/Model/PendingOrderCalculated.md)
- [PendingOrders](docs/Model/PendingOrders.md)
- [PendingOrdersCalculated](docs/Model/PendingOrdersCalculated.md)
- [ProcessOrder](docs/Model/ProcessOrder.md)
- [Product](docs/Model/Product.md)
- [Project](docs/Model/Project.md)
