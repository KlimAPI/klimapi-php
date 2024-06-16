# # LinkByPriceRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**priceAmount** | **float** | The total of the compensation in your given currency **incl. VAT**. Minimum order is 0.5 in your given currency. |
**changeAllowed** | **bool** | Choose if the customer should be allowed to change the amount. | [optional] [default to false]
**successUrl** | **string** | The URL the customer is redirected to after the successful compensation. |
**cancelUrl** | **string** | The URL the customer is redirected to after a failed or aborted compensation. |
**orderCount** | **int** | The amount of pending Orders you want to receive. This is especially useful if you want to offer your customers several different projects for their compensation. | [optional] [default to 1]
**metadata** | **array[]** | Add additional queryable information to the order as key-value pairs | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
