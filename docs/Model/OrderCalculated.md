# # OrderCalculated

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**orderId** | **string** |  | [optional]
**status** | **string** |  | [optional]
**certificateIssuedAt** | **\DateTime** | Timestamp of when the certificate was issued in ISO 8601 format (UTC) | [optional]
**certificateUrl** | **string** |  | [optional]
**certificatePdf** | **string** |  | [optional]
**price** | **float** | The total of the compensation in your given currency **excl. VAT**. | [optional]
**currency** | **string** |  | [optional]
**kgCO2e** | **int** | The amount of kg CO&lt;sub&gt;2&lt;/sub&gt;e. | [optional]
**metadata** | **array[]** | Add additional queryable information to the order as key-value pairs | [optional]
**project** | [**\KlimAPI\Model\Project**](Project.md) |  | [optional]
**results** | [**\KlimAPI\Model\CalculationResult[]**](CalculationResult.md) | An array of the calculation results | [optional]
**recipient** | [**\KlimAPI\Model\OrderRecipient**](OrderRecipient.md) |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)