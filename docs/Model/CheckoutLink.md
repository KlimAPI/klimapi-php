# # CheckoutLink

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**paymentLink** | **string** | The checkout link you can transfer to the customer. | [optional]
**paymentLinkId** | **string** | The checkout link id, used to make further calls to the API. | [optional]
**certificateIssuedAt** | **\DateTime** | When payment_received is true, timestamp of when the certificate was issued in ISO 8601 format (UTC) | [optional]
**certificateUrl** | **string** | When payment_received is true, the url to the certificate will be given. | [optional]
**certificatePdf** | **string** | When payment_received is true, the url to the certificate pdf will be given. | [optional]
**orderId** | **string** | The id of the order created for the checkout link. | [optional]
**kgCO2e** | **int** | The amount of kg CO&lt;sub&gt;2&lt;/sub&gt;e. | [optional]
**price** | **float** | The total of the compensation in your given currency **incl. VAT**. | [optional]
**currency** | **string** |  | [optional]
**paymentReceived** | **string** | This indicates if the order via the checkout link is already fulfilled or not. | [optional]
**project** | [**\KlimAPI\Model\Project**](Project.md) |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
