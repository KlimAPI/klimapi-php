# # PendingByCalculationRequestCalculationOptionsInner

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**type** | **string** |  |
**activity** | **string** | Describe the individual factor |
**specification** | **string** | Specify the individual factor |
**value** | **float** | The value in the given unit |
**unit** | **string** | Describe the unit used by the multiplier |
**detail** | **string** | **Hint:** Some specifications only support certain details. | [optional] [default to 'average']
**departure** | **string** | City, Postal Address, Train Station or IATA Code of the departure address |
**destination** | **string** | City, Postal Address, Train Station or IATA Code of the destination address |
**returnTrip** | **bool** | Decide if the trip is one way or return | [optional] [default to true]
**passengers** | **int** | The total of passengers travelling this route | [optional] [default to 1]
**weight** | **float** | The total weight travelling this route | [optional] [default to 1]
**weightUnit** | **string** | Need a more specific unit? See the **[full list of supported units (Section 5)](https://convert.js.org/types/_unitsbymeasureraw)**. | [optional] [default to 'metric tons']
**amount** | **int** | The amount of kg CO*2*e you want to add to the calculation. |
**multiplier** | **int** | Multiplier for the given amount | [optional] [default to 1]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
