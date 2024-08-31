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
[**linkByCalculation**](docs/Api/KlimApi.md#linkbycalculation) | **POST** /orders/link/calculate | By Calculation
[**linkByCarbon**](docs/Api/KlimApi.md#linkbycarbon) | **POST** /orders/link/carbon | By Carbon
[**linkByPrice**](docs/Api/KlimApi.md#linkbyprice) | **POST** /orders/link/price | By Price
[**me**](docs/Api/KlimApi.md#me) | **GET** /me | Get Authenticated User
[**orderByCalculation**](docs/Api/KlimApi.md#orderbycalculation) | **POST** /orders/process/calculate | By Calculation
[**orderByCarbon**](docs/Api/KlimApi.md#orderbycarbon) | **POST** /orders/process/carbon | By Carbon
[**orderByPrice**](docs/Api/KlimApi.md#orderbyprice) | **POST** /orders/process/price | By Price
[**pendingByCalculation**](docs/Api/KlimApi.md#pendingbycalculation) | **POST** /orders/pending/calculate | By Calculation
[**pendingByCarbon**](docs/Api/KlimApi.md#pendingbycarbon) | **POST** /orders/pending/carbon | By Carbon
[**pendingByPrice**](docs/Api/KlimApi.md#pendingbyprice) | **POST** /orders/pending/price | By Price
[**process**](docs/Api/KlimApi.md#process) | **POST** /orders/{order_id}/process | Process Pending Order
[**processCart**](docs/Api/KlimApi.md#processcart) | **POST** /stores/{store_ident}/cart/{order_id}/process | Process Cart
[**refund**](docs/Api/KlimApi.md#refund) | **DELETE** /orders/{order_id}/refund | Refund Order
[**removeWebhook**](docs/Api/KlimApi.md#removewebhook) | **DELETE** /webhooks/remove | Remove Webhook
[**syncBulkStore**](docs/Api/KlimApi.md#syncbulkstore) | **POST** /stores/{store_ident}/sync/bulk | Sync multiple Products
[**syncStore**](docs/Api/KlimApi.md#syncstore) | **POST** /stores/{store_ident}/sync | Sync a single Product


## Models

- [AddWebhookRequest](docs/Model/AddWebhookRequest.md)
- [BioenergyAverageEnergy](docs/Model/BioenergyAverageEnergy.md)
- [BioenergyAverageVolume](docs/Model/BioenergyAverageVolume.md)
- [BioenergyAverageWeight](docs/Model/BioenergyAverageWeight.md)
- [BioenergyBiofuelEnergy](docs/Model/BioenergyBiofuelEnergy.md)
- [BioenergyBiofuelVolume](docs/Model/BioenergyBiofuelVolume.md)
- [BioenergyBiofuelWeight](docs/Model/BioenergyBiofuelWeight.md)
- [BioenergyBiogasEnergy](docs/Model/BioenergyBiogasEnergy.md)
- [BioenergyBiogasWeight](docs/Model/BioenergyBiogasWeight.md)
- [BioenergyBiomassEnergy](docs/Model/BioenergyBiomassEnergy.md)
- [BioenergyBiomassWeight](docs/Model/BioenergyBiomassWeight.md)
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
- [CloudComputingAverageCpuHour](docs/Model/CloudComputingAverageCpuHour.md)
- [CloudComputingAverageGb](docs/Model/CloudComputingAverageGb.md)
- [CloudComputingAverageGbHour](docs/Model/CloudComputingAverageGbHour.md)
- [CloudComputingAverageTbHour](docs/Model/CloudComputingAverageTbHour.md)
- [CloudComputingCpuCpuHour](docs/Model/CloudComputingCpuCpuHour.md)
- [CloudComputingMemoryGbHour](docs/Model/CloudComputingMemoryGbHour.md)
- [CloudComputingNetworkGb](docs/Model/CloudComputingNetworkGb.md)
- [CloudComputingStorageTbHour](docs/Model/CloudComputingStorageTbHour.md)
- [EnergyConsumptionAverageEnergy](docs/Model/EnergyConsumptionAverageEnergy.md)
- [EnergyConsumptionByTypeEnergy](docs/Model/EnergyConsumptionByTypeEnergy.md)
- [FoodAverageCurrency](docs/Model/FoodAverageCurrency.md)
- [FoodBeveragesCurrency](docs/Model/FoodBeveragesCurrency.md)
- [FoodDairyProductsCurrency](docs/Model/FoodDairyProductsCurrency.md)
- [FoodFishProductsCurrency](docs/Model/FoodFishProductsCurrency.md)
- [FoodFoodProductsNotElsewhereSpecifiedCurrency](docs/Model/FoodFoodProductsNotElsewhereSpecifiedCurrency.md)
- [FoodMeatProductsBeefCurrency](docs/Model/FoodMeatProductsBeefCurrency.md)
- [FoodMeatProductsNotElsewhereSpecifiedCurrency](docs/Model/FoodMeatProductsNotElsewhereSpecifiedCurrency.md)
- [FoodMeatProductsPorkCurrency](docs/Model/FoodMeatProductsPorkCurrency.md)
- [FoodMeatProductsPoultryCurrency](docs/Model/FoodMeatProductsPoultryCurrency.md)
- [FoodProcessedRiceCurrency](docs/Model/FoodProcessedRiceCurrency.md)
- [FoodSugarCurrency](docs/Model/FoodSugarCurrency.md)
- [FoodTobaccoProductsCurrency](docs/Model/FoodTobaccoProductsCurrency.md)
- [FoodVegetableOilsAndFatsCurrency](docs/Model/FoodVegetableOilsAndFatsCurrency.md)
- [FreightingGoodsAverageDepartureAndDestination](docs/Model/FreightingGoodsAverageDepartureAndDestination.md)
- [FreightingGoodsAverageDistance](docs/Model/FreightingGoodsAverageDistance.md)
- [FreightingGoodsAverageWeightAndDistance](docs/Model/FreightingGoodsAverageWeightAndDistance.md)
- [FreightingGoodsCargoShipDepartureAndDestination](docs/Model/FreightingGoodsCargoShipDepartureAndDestination.md)
- [FreightingGoodsCargoShipWeightAndDistance](docs/Model/FreightingGoodsCargoShipWeightAndDistance.md)
- [FreightingGoodsFreightFlightsDepartureAndDestination](docs/Model/FreightingGoodsFreightFlightsDepartureAndDestination.md)
- [FreightingGoodsFreightFlightsWeightAndDistance](docs/Model/FreightingGoodsFreightFlightsWeightAndDistance.md)
- [FreightingGoodsHgvAllDieselDepartureAndDestination](docs/Model/FreightingGoodsHgvAllDieselDepartureAndDestination.md)
- [FreightingGoodsHgvAllDieselDistance](docs/Model/FreightingGoodsHgvAllDieselDistance.md)
- [FreightingGoodsHgvAllDieselWeightAndDistance](docs/Model/FreightingGoodsHgvAllDieselWeightAndDistance.md)
- [FreightingGoodsHgvRefrigeratedAllDieselDepartureAndDestination](docs/Model/FreightingGoodsHgvRefrigeratedAllDieselDepartureAndDestination.md)
- [FreightingGoodsHgvRefrigeratedAllDieselDistance](docs/Model/FreightingGoodsHgvRefrigeratedAllDieselDistance.md)
- [FreightingGoodsHgvRefrigeratedAllDieselWeightAndDistance](docs/Model/FreightingGoodsHgvRefrigeratedAllDieselWeightAndDistance.md)
- [FreightingGoodsRailDepartureAndDestination](docs/Model/FreightingGoodsRailDepartureAndDestination.md)
- [FreightingGoodsRailWeightAndDistance](docs/Model/FreightingGoodsRailWeightAndDistance.md)
- [FreightingGoodsRoadDepartureAndDestination](docs/Model/FreightingGoodsRoadDepartureAndDestination.md)
- [FreightingGoodsRoadWeightAndDistance](docs/Model/FreightingGoodsRoadWeightAndDistance.md)
- [FreightingGoodsSeaTankerDepartureAndDestination](docs/Model/FreightingGoodsSeaTankerDepartureAndDestination.md)
- [FreightingGoodsSeaTankerWeightAndDistance](docs/Model/FreightingGoodsSeaTankerWeightAndDistance.md)
- [FreightingGoodsVansDepartureAndDestination](docs/Model/FreightingGoodsVansDepartureAndDestination.md)
- [FreightingGoodsVansDistance](docs/Model/FreightingGoodsVansDistance.md)
- [FreightingGoodsVansWeightAndDistance](docs/Model/FreightingGoodsVansWeightAndDistance.md)
- [FuelsAverageVolume](docs/Model/FuelsAverageVolume.md)
- [FuelsAverageWeight](docs/Model/FuelsAverageWeight.md)
- [FuelsGaseousFuelsVolume](docs/Model/FuelsGaseousFuelsVolume.md)
- [FuelsGaseousFuelsWeight](docs/Model/FuelsGaseousFuelsWeight.md)
- [FuelsLiquidFuelsVolume](docs/Model/FuelsLiquidFuelsVolume.md)
- [FuelsLiquidFuelsWeight](docs/Model/FuelsLiquidFuelsWeight.md)
- [FuelsSolidFuelsWeight](docs/Model/FuelsSolidFuelsWeight.md)
- [GetMetricsRequest](docs/Model/GetMetricsRequest.md)
- [GetOrdersRequest](docs/Model/GetOrdersRequest.md)
- [GetOrdersRequestFilters](docs/Model/GetOrdersRequestFilters.md)
- [HeatAndSteamEnergy](docs/Model/HeatAndSteamEnergy.md)
- [HomeworkingPerFteWorkingHour](docs/Model/HomeworkingPerFteWorkingHour.md)
- [HotelStayRoomPerNight](docs/Model/HotelStayRoomPerNight.md)
- [IndividualFactor](docs/Model/IndividualFactor.md)
- [InfrastructureAverageCurrency](docs/Model/InfrastructureAverageCurrency.md)
- [InfrastructureRealEstateCurrency](docs/Model/InfrastructureRealEstateCurrency.md)
- [InvoiceDetails](docs/Model/InvoiceDetails.md)
- [InvoiceDetailsAddress](docs/Model/InvoiceDetailsAddress.md)
- [InvoiceDetailsTaxId](docs/Model/InvoiceDetailsTaxId.md)
- [LinkByCalculationRequest](docs/Model/LinkByCalculationRequest.md)
- [LinkByCarbonRequest](docs/Model/LinkByCarbonRequest.md)
- [LinkByPriceRequest](docs/Model/LinkByPriceRequest.md)
- [MaterialUseAverageCurrency](docs/Model/MaterialUseAverageCurrency.md)
- [MaterialUseAverageWeight](docs/Model/MaterialUseAverageWeight.md)
- [MaterialUseConstructionWeight](docs/Model/MaterialUseConstructionWeight.md)
- [MaterialUseElectricalItemsWeight](docs/Model/MaterialUseElectricalItemsWeight.md)
- [MaterialUseElectronicsCurrency](docs/Model/MaterialUseElectronicsCurrency.md)
- [MaterialUseFurnitureCurrency](docs/Model/MaterialUseFurnitureCurrency.md)
- [MaterialUseMetalWeight](docs/Model/MaterialUseMetalWeight.md)
- [MaterialUseOrganicWeight](docs/Model/MaterialUseOrganicWeight.md)
- [MaterialUseOtherWeight](docs/Model/MaterialUseOtherWeight.md)
- [MaterialUsePaperProductsCurrency](docs/Model/MaterialUsePaperProductsCurrency.md)
- [MaterialUsePaperWeight](docs/Model/MaterialUsePaperWeight.md)
- [MaterialUsePlasticWeight](docs/Model/MaterialUsePlasticWeight.md)
- [MaterialUseTextilesCurrency](docs/Model/MaterialUseTextilesCurrency.md)
- [MetadataOrders](docs/Model/MetadataOrders.md)
- [Order](docs/Model/Order.md)
- [OrderByCalculationRequest](docs/Model/OrderByCalculationRequest.md)
- [OrderCalculated](docs/Model/OrderCalculated.md)
- [OrderMetrics](docs/Model/OrderMetrics.md)
- [OrderRecipient](docs/Model/OrderRecipient.md)
- [PendingByCalculationRequest](docs/Model/PendingByCalculationRequest.md)
- [PendingByCalculationRequestCalculationOptionsInner](docs/Model/PendingByCalculationRequestCalculationOptionsInner.md)
- [PendingByCarbonRequest](docs/Model/PendingByCarbonRequest.md)
- [PendingByPriceRequest](docs/Model/PendingByPriceRequest.md)
- [PendingOrder](docs/Model/PendingOrder.md)
- [PendingOrderCalculated](docs/Model/PendingOrderCalculated.md)
- [PendingOrders](docs/Model/PendingOrders.md)
- [PendingOrdersCalculated](docs/Model/PendingOrdersCalculated.md)
- [ProcessOrder](docs/Model/ProcessOrder.md)
- [Product](docs/Model/Product.md)
- [Project](docs/Model/Project.md)
- [TravelAirAverageDepartureAndDestination](docs/Model/TravelAirAverageDepartureAndDestination.md)
- [TravelAirAveragePassengerDistance](docs/Model/TravelAirAveragePassengerDistance.md)
- [TravelAirFlightsDepartureAndDestination](docs/Model/TravelAirFlightsDepartureAndDestination.md)
- [TravelAirFlightsPassengerDistance](docs/Model/TravelAirFlightsPassengerDistance.md)
- [TravelLandAverageDepartureAndDestination](docs/Model/TravelLandAverageDepartureAndDestination.md)
- [TravelLandAverageDistance](docs/Model/TravelLandAverageDistance.md)
- [TravelLandAveragePassengerDistance](docs/Model/TravelLandAveragePassengerDistance.md)
- [TravelLandBusDepartureAndDestination](docs/Model/TravelLandBusDepartureAndDestination.md)
- [TravelLandBusPassengerDistance](docs/Model/TravelLandBusPassengerDistance.md)
- [TravelLandCarsByMarketSegmentDepartureAndDestination](docs/Model/TravelLandCarsByMarketSegmentDepartureAndDestination.md)
- [TravelLandCarsByMarketSegmentDistance](docs/Model/TravelLandCarsByMarketSegmentDistance.md)
- [TravelLandCarsBySizeDepartureAndDestination](docs/Model/TravelLandCarsBySizeDepartureAndDestination.md)
- [TravelLandCarsBySizeDistance](docs/Model/TravelLandCarsBySizeDistance.md)
- [TravelLandFootBikeDepartureAndDestination](docs/Model/TravelLandFootBikeDepartureAndDestination.md)
- [TravelLandFootBikePassengerDistance](docs/Model/TravelLandFootBikePassengerDistance.md)
- [TravelLandMotorbikeDepartureAndDestination](docs/Model/TravelLandMotorbikeDepartureAndDestination.md)
- [TravelLandMotorbikeDistance](docs/Model/TravelLandMotorbikeDistance.md)
- [TravelLandRailDepartureAndDestination](docs/Model/TravelLandRailDepartureAndDestination.md)
- [TravelLandRailPassengerDistance](docs/Model/TravelLandRailPassengerDistance.md)
- [TravelLandTaxisDepartureAndDestination](docs/Model/TravelLandTaxisDepartureAndDestination.md)
- [TravelLandTaxisDistance](docs/Model/TravelLandTaxisDistance.md)
- [TravelLandTaxisPassengerDistance](docs/Model/TravelLandTaxisPassengerDistance.md)
- [TravelSeaAverageDepartureAndDestination](docs/Model/TravelSeaAverageDepartureAndDestination.md)
- [TravelSeaAveragePassengerDistance](docs/Model/TravelSeaAveragePassengerDistance.md)
- [TravelSeaCruiseDays](docs/Model/TravelSeaCruiseDays.md)
- [TravelSeaFerryDepartureAndDestination](docs/Model/TravelSeaFerryDepartureAndDestination.md)
- [TravelSeaFerryPassengerDistance](docs/Model/TravelSeaFerryPassengerDistance.md)
- [WasteDisposalAverageWeight](docs/Model/WasteDisposalAverageWeight.md)
- [WasteDisposalConstructionWeight](docs/Model/WasteDisposalConstructionWeight.md)
- [WasteDisposalElectricalItemsWeight](docs/Model/WasteDisposalElectricalItemsWeight.md)
- [WasteDisposalMetalWeight](docs/Model/WasteDisposalMetalWeight.md)
- [WasteDisposalOtherWeight](docs/Model/WasteDisposalOtherWeight.md)
- [WasteDisposalPaperWeight](docs/Model/WasteDisposalPaperWeight.md)
- [WasteDisposalPlasticWeight](docs/Model/WasteDisposalPlasticWeight.md)
- [WasteDisposalRefuseWeight](docs/Model/WasteDisposalRefuseWeight.md)
- [WaterSupplyVolume](docs/Model/WaterSupplyVolume.md)
- [WaterTreatmentVolume](docs/Model/WaterTreatmentVolume.md)
