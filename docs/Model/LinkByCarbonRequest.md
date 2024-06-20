# # LinkByCarbonRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**kgCO2e** | **int** | The amount of kg CO&lt;sub&gt;2&lt;/sub&gt;e the compensation should provide |
**changeAllowed** | **bool** | Choose if the customer should be allowed to change the amount. | [optional] [default to false]
**successUrl** | **string** | The URL the customer is redirected to after the successful compensation. |
**cancelUrl** | **string** | The URL the customer is redirected to after a failed or aborted compensation. |
**orderCount** | **int** | The amount of pending Orders you want to receive. This is especially useful if you want to offer your customers several different projects for their compensation. | [optional] [default to 1]
**metadata** | **array<string,string>** | Add additional queryable information to the order as key-value pairs | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
