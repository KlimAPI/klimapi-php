# # FreightingGoodsFreightFlightsDepartureAndDestination

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**type** | **string** |  |
**activity** | **string** |  | [optional] [default to 'freight_flights']
**specification** | **string** |  | [optional] [default to 'average']
**departure** | **string** | City, Postal Address, Train Station or IATA Code of the departure address |
**destination** | **string** | City, Postal Address, Train Station or IATA Code of the destination address |
**returnTrip** | **bool** | Decide if the trip is one way or return | [optional] [default to true]
**weight** | **float** | The total weight travelling this route | [optional] [default to 1]
**weightUnit** | **string** | Need a more specific unit? See the **[full list of supported units (Section 5)](https://convert.js.org/types/_unitsbymeasureraw)**. | [optional] [default to 'metric tons']

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
