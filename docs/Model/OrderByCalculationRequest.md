# # OrderByCalculationRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**calculationOptions** | [**\KlimAPI\Model\PendingByCalculationRequestCalculationOptionsInner[]**](PendingByCalculationRequestCalculationOptionsInner.md) | An Array of [Calculation Options](https://klimapi.com/resources/factors). See the full list of supported options [here](https://klimapi.com/resources/factors). |
**recipientName** | **string** | The name which should be associated with the compensation | [optional]
**recipientEmail** | **string** | If a valid e-mail address is provided, we will send the certificate to this address | [optional]
**sendAt** | **\DateTime** | Timestamp of when the certificate should be send to the customer in ISO 8601 format (UTC). Defaults to the current timestamp. | [optional]
**priceLimit** | **float** | Set an optional price limit. if the order would exceed the limit a error will be thrown. Set the limit in the given currency. | [optional]
**metadata** | **array<string,string>** | Add additional queryable information to the order as key-value pairs | [optional]
**fractionalDigits** | **int** | Normally, the calculation results are rounded to the nearest whole number. Specify here how many decimal places you would like to receive in addition. This only applies to calculation results, compensations are always made in whole kilograms | [optional] [default to 2]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
