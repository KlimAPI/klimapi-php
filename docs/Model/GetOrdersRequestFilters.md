# # GetOrdersRequestFilters

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**metadata** | **array<string,string>** | Add additional queryable information to the order as key-value pairs | [optional]
**status** | **string** | The status of the orders you want to receive | [optional] [default to 'processed']
**recipientName** | **string** | The recipient name of the orders you want to receive | [optional]
**recipientEmail** | **string** | The recipient email of the orders you want to receive | [optional]
**price** | **float** | The price of the orders you want to receive | [optional]
**currency** | **string** | The currency of the orders you want to receive | [optional]
**kgCO2e** | **int** | The amount of kg CO<sub>2</sub>e of the orders you want to receive | [optional]
**from** | **\DateTime** | Specify a timeframe for your response in ISO 8601 format (UTC) | [optional]
**to** | **\DateTime** | Specify a timeframe for your response in ISO 8601 format (UTC) | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
