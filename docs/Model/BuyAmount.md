# # BuyAmount

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**kgCO2e** | **int** | The amount of kg CO<sub>2</sub>e the compensation should provide |
**recipientName** | **string** | The name which should be associated with the compensation |
**recipientEmail** | **string** | If a valid e-mail address is provided, we will send the certificate to this address | [optional]
**sendAt** | **\DateTime** | Timestamp of when the certificate should be send to the customer in ISO 8601 format (UTC). Defaults to the current timestamp. | [optional]
**priceLimit** | **float** | Set an optional price limit. if the order would exceed the limit a error will be thrown. Set the limit in the given currency. | [optional]
**metadata** | **array<string,string>** | Add additional queryable information to the order as key-value pairs | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
