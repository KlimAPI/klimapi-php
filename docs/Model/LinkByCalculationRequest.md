# # LinkByCalculationRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**calculationOptions** | [**\KlimAPI\Model\PendingByCalculationRequestCalculationOptionsInner[]**](PendingByCalculationRequestCalculationOptionsInner.md) | An Array of [Calculation Options](https://klimapi.com/resources/factors). See the full list of supported options [here](https://klimapi.com/resources/factors). |
**changeAllowed** | **bool** | Choose if the customer should be allowed to change the amount. | [optional] [default to false]
**successUrl** | **string** | The URL the customer is redirected to after the successful compensation. |
**cancelUrl** | **string** | The URL the customer is redirected to after a failed or aborted compensation. |
**orderCount** | **int** | The amount of pending Orders you want to receive. This is especially useful if you want to offer your customers several different projects for their compensation. | [optional] [default to 1]
**metadata** | **array<string,string>** | Add additional queryable information to the order as key-value pairs | [optional]
**fractionalDigits** | **int** | Normally, the calculation results are rounded to the nearest whole number. Specify here how many decimal places you would like to receive in addition. This only applies to calculation results, compensations are always made in whole kilograms | [optional] [default to 2]
**paymentType** | **string** | With `default` we will automatically provide payment methods based on the customers location, use `invoice` to enable payment by invoice for the given link. Please note that `invoice` bank transfer is only available if **X-CURRENCY** is set to `EUR`. The invoice can always be paid by card. | [optional] [default to 'default']

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
