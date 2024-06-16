# # Product

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**productId** | **string** | A unique identifier for the product |
**name** | **string** | The name of the product | [optional]
**description** | **string** | A description of the product | [optional]
**price** | **float** | The price of the product |
**categories** | **string[]** | The categories of the product | [optional]
**tags** | **string[]** | The tags of the product | [optional]
**weight** | **float** | The weight of the product | [optional]
**weightUnit** | **string** | The weight unit of the product | [optional] [default to 'kg']
**madeIn** | **string** | The country of origin of the product | [optional]
**emissionFactor** | **string** | Already know the emissions of the given product? Then you can provide the emission factor here. Unit: **kg CO&lt;sub&gt;2&lt;/sub&gt;e** | [optional]
**emissionMultiplicator** | **string** | Include the multiplicator of the given factor. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
