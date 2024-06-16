# # BuyPrice

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**priceAmount** | **float** | The total of the compensation in your given currency **excl. VAT**. Minimum order is 0.5 in your given currency. |
**recipientName** | **string** | The name which should be associated with the compensation |
**recipientEmail** | **string** | If a valid e-mail address is provided, we will send the certificate to this address | [optional]
**sendAt** | **\DateTime** | Timestamp of when the certificate should be send to the customer in ISO 8601 format (UTC). Defaults to the current timestamp. | [optional]
**metadata** | **array[]** | Add additional queryable information to the order as key-value pairs | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
