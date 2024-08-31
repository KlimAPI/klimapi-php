<?php
/**
 * PendingByCalculationRequestCalculationOptionsInner
 *
 *
 * @category Class
 * @package  KlimAPI
 * @author   KlimAPI Team
 * @link     https://klimapi.com
 */

/**
 * KlimAPI - Calculation & Compensation API
 *
 * This API offers you the possibility to calculate and offset emissions, create checkout links, get statistics and much more.
 *
 * KlimAPI Version: v2
 * Contact: tech@klimapi.com
 */


namespace KlimAPI\Model;

use \ArrayAccess;
use \KlimAPI\ObjectSerializer;

/**
 * PendingByCalculationRequestCalculationOptionsInner Class Doc Comment
 *
 * @category Class
 * @package  KlimAPI
 * @author   KlimAPI Team
 * @link     https://klimapi.com
 * @implements \ArrayAccess<string, mixed>
 */
class PendingByCalculationRequestCalculationOptionsInner implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model. bla
      *
      * @var string
      */
    protected static $openAPIModelName = 'pendingByCalculation_request_calculation_options_inner';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'type' => 'string',
        'activity' => 'string',
        'specification' => 'string',
        'value' => 'float',
        'unit' => 'string',
        'detail' => 'string',
        'departure' => 'string',
        'destination' => 'string',
        'returnTrip' => 'bool',
        'passengers' => 'int',
        'weight' => 'float',
        'weightUnit' => 'string',
        'amount' => 'int',
        'multiplier' => 'int'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'type' => null,
        'activity' => null,
        'specification' => null,
        'value' => null,
        'unit' => null,
        'detail' => null,
        'departure' => null,
        'destination' => null,
        'returnTrip' => null,
        'passengers' => null,
        'weight' => null,
        'weightUnit' => null,
        'amount' => null,
        'multiplier' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'type' => false,
        'activity' => false,
        'specification' => false,
        'value' => false,
        'unit' => false,
        'detail' => false,
        'departure' => false,
        'destination' => false,
        'returnTrip' => false,
        'passengers' => false,
        'weight' => false,
        'weightUnit' => false,
        'amount' => false,
        'multiplier' => false
    ];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPITypes()
    {
        return self::$openAPITypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPIFormats()
    {
        return self::$openAPIFormats;
    }

    /**
     * Array of nullable properties
     *
     * @return array
     */
    protected static function openAPINullables(): array
    {
        return self::$openAPINullables;
    }

    /**
     * Checks if a property is nullable
     *
     * @param string $property
     * @return bool
     */
    public static function isNullable(string $property): bool
    {
        return self::openAPINullables()[$property] ?? false;
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'type' => 'type',
        'activity' => 'activity',
        'specification' => 'specification',
        'value' => 'value',
        'unit' => 'unit',
        'detail' => 'detail',
        'departure' => 'departure',
        'destination' => 'destination',
        'returnTrip' => 'return_trip',
        'passengers' => 'passengers',
        'weight' => 'weight',
        'weightUnit' => 'weight_unit',
        'amount' => 'amount',
        'multiplier' => 'multiplier'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'type' => 'setType',
        'activity' => 'setActivity',
        'specification' => 'setSpecification',
        'value' => 'setValue',
        'unit' => 'setUnit',
        'detail' => 'setDetail',
        'departure' => 'setDeparture',
        'destination' => 'setDestination',
        'returnTrip' => 'setReturnTrip',
        'passengers' => 'setPassengers',
        'weight' => 'setWeight',
        'weightUnit' => 'setWeightUnit',
        'amount' => 'setAmount',
        'multiplier' => 'setMultiplier'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'type' => 'getType',
        'activity' => 'getActivity',
        'specification' => 'getSpecification',
        'value' => 'getValue',
        'unit' => 'getUnit',
        'detail' => 'getDetail',
        'departure' => 'getDeparture',
        'destination' => 'getDestination',
        'returnTrip' => 'getReturnTrip',
        'passengers' => 'getPassengers',
        'weight' => 'getWeight',
        'weightUnit' => 'getWeightUnit',
        'amount' => 'getAmount',
        'multiplier' => 'getMultiplier'
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters()
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName()
    {
        return self::$openAPIModelName;
    }

    public const TYPE_FUELS = 'fuels';
    public const TYPE_BIOENERGY = 'bioenergy';
    public const TYPE_HEAT_AND_STEAM = 'heat_and_steam';
    public const TYPE_WATER_SUPPLY = 'water_supply';
    public const TYPE_WATER_TREATMENT = 'water_treatment';
    public const TYPE_MATERIAL_USE = 'material_use';
    public const TYPE_WASTE_DISPOSAL = 'waste_disposal';
    public const TYPE_HOTEL_STAY = 'hotel_stay';
    public const TYPE_TRAVEL_AIR = 'travel-air';
    public const TYPE_TRAVEL_SEA = 'travel-sea';
    public const TYPE_TRAVEL_LAND = 'travel-land';
    public const TYPE_FREIGHTING_GOODS = 'freighting_goods';
    public const TYPE_HOMEWORKING = 'homeworking';
    public const TYPE_INFRASTRUCTURE = 'infrastructure';
    public const TYPE_CLOUD_COMPUTING = 'cloud_computing';
    public const TYPE_FOOD = 'food';
    public const TYPE_ENERGY_CONSUMPTION = 'energy_consumption';
    public const TYPE_INDIVIDUAL_FACTOR = 'individual_factor';
    public const DETAIL_AF_SOUTH_1 = 'af-south-1';
    public const DETAIL_AP_EAST_1 = 'ap-east-1';
    public const DETAIL_AP_NORTHEAST_1 = 'ap-northeast-1';
    public const DETAIL_AP_NORTHEAST_2 = 'ap-northeast-2';
    public const DETAIL_AP_NORTHEAST_3 = 'ap-northeast-3';
    public const DETAIL_AP_SOUTH_1 = 'ap-south-1';
    public const DETAIL_AP_SOUTHEAST_1 = 'ap-southeast-1';
    public const DETAIL_AP_SOUTHEAST_2 = 'ap-southeast-2';
    public const DETAIL_CA_CENTRAL_1 = 'ca-central-1';
    public const DETAIL_CN_NORTH_1 = 'cn-north-1';
    public const DETAIL_CN_NORTHWEST_1 = 'cn-northwest-1';
    public const DETAIL_EU_CENTRAL_1 = 'eu-central-1';
    public const DETAIL_EU_NORTH_1 = 'eu-north-1';
    public const DETAIL_EU_SOUTH_1 = 'eu-south-1';
    public const DETAIL_EU_WEST_1 = 'eu-west-1';
    public const DETAIL_EU_WEST_2 = 'eu-west-2';
    public const DETAIL_EU_WEST_3 = 'eu-west-3';
    public const DETAIL_ME_SOUTH_1 = 'me-south-1';
    public const DETAIL_SA_EAST_1 = 'sa-east-1';
    public const DETAIL_US_EAST_1 = 'us-east-1';
    public const DETAIL_US_EAST_2 = 'us-east-2';
    public const DETAIL_US_GOV_EAST_1 = 'us-gov-east-1';
    public const DETAIL_US_GOV_WEST_1 = 'us-gov-west-1';
    public const DETAIL_US_WEST_1 = 'us-west-1';
    public const DETAIL_US_WEST_2 = 'us-west-2';
    public const DETAIL_AVERAGE = 'average';
    public const DETAIL_CENTRAL_INDIA = 'central-india';
    public const DETAIL_CENTRAL_US = 'central-us';
    public const DETAIL_EAST_ASIA = 'east-asia';
    public const DETAIL_EAST_US_2 = 'east-us-2';
    public const DETAIL_EAST_US_3 = 'east-us-3';
    public const DETAIL_EAST_US = 'east-us';
    public const DETAIL_NORTH_CENTRAL_US = 'north-central-us';
    public const DETAIL_NORTH_EUROPE = 'north-europe';
    public const DETAIL_SOUTH_CENTRAL_US = 'south-central-us';
    public const DETAIL_SOUTH_INDIA = 'south-india';
    public const DETAIL_SOUTHEAST_ASIA = 'southeast-asia';
    public const DETAIL_UK_SOUTH = 'uk-south';
    public const DETAIL_UK_WEST = 'uk-west';
    public const DETAIL_WEST_CENTRAL_US = 'west-central-us';
    public const DETAIL_WEST_EUROPE = 'west-europe';
    public const DETAIL_WEST_INDIA = 'west-india';
    public const DETAIL_WEST_US_2 = 'west-us-2';
    public const DETAIL_WEST_US_3 = 'west-us-3';
    public const DETAIL_WEST_US = 'west-us';
    public const DETAIL_ASIA_EAST_1 = 'asia-east-1';
    public const DETAIL_ASIA_EAST_2 = 'asia-east-2';
    public const DETAIL_ASIA_NORTHEAST_1 = 'asia-northeast-1';
    public const DETAIL_ASIA_NORTHEAST_2 = 'asia-northeast-2';
    public const DETAIL_ASIA_NORTHEAST_3 = 'asia-northeast-3';
    public const DETAIL_ASIA_SOUTH_1 = 'asia-south-1';
    public const DETAIL_ASIA_SOUTHEAST_1 = 'asia-southeast-1';
    public const DETAIL_ASIA_SOUTHEAST_2 = 'asia-southeast-2';
    public const DETAIL_AUSTRALIA_SOUTHEAST_1 = 'australia-southeast-1';
    public const DETAIL_EUROPE_NORTH_1 = 'europe-north-1';
    public const DETAIL_EUROPE_WEST_1 = 'europe-west-1';
    public const DETAIL_EUROPE_WEST_2 = 'europe-west-2';
    public const DETAIL_EUROPE_WEST_3 = 'europe-west-3';
    public const DETAIL_EUROPE_WEST_4 = 'europe-west-4';
    public const DETAIL_EUROPE_WEST_6 = 'europe-west-6';
    public const DETAIL_NORTHAMERICA_NORTHEAST_1 = 'northamerica-northeast-1';
    public const DETAIL_SOUTHAMERICA_EAST_1 = 'southamerica-east-1';
    public const DETAIL_US_CENTRAL_1 = 'us-central-1';
    public const DETAIL_US_EAST_4 = 'us-east-4';
    public const DETAIL_US_WEST_3 = 'us-west-3';
    public const DETAIL_US_WEST_4 = 'us-west-4';
    public const WEIGHT_UNIT_KILOGRAMS = 'kilograms';
    public const WEIGHT_UNIT_GRAMS = 'grams';
    public const WEIGHT_UNIT_METRIC_TONS = 'metric tons';
    public const WEIGHT_UNIT_IMPERIAL_TONS = 'imperial tons';
    public const WEIGHT_UNIT_POUNDS = 'pounds';
    public const WEIGHT_UNIT_OUNCES = 'ounces';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getTypeAllowableValues()
    {
        return [
            self::TYPE_FUELS,
            self::TYPE_BIOENERGY,
            self::TYPE_HEAT_AND_STEAM,
            self::TYPE_WATER_SUPPLY,
            self::TYPE_WATER_TREATMENT,
            self::TYPE_MATERIAL_USE,
            self::TYPE_WASTE_DISPOSAL,
            self::TYPE_HOTEL_STAY,
            self::TYPE_TRAVEL_AIR,
            self::TYPE_TRAVEL_SEA,
            self::TYPE_TRAVEL_LAND,
            self::TYPE_FREIGHTING_GOODS,
            self::TYPE_HOMEWORKING,
            self::TYPE_INFRASTRUCTURE,
            self::TYPE_CLOUD_COMPUTING,
            self::TYPE_FOOD,
            self::TYPE_ENERGY_CONSUMPTION,
            self::TYPE_INDIVIDUAL_FACTOR,
        ];
    }

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getDetailAllowableValues()
    {
        return [
            self::DETAIL_AF_SOUTH_1,
            self::DETAIL_AP_EAST_1,
            self::DETAIL_AP_NORTHEAST_1,
            self::DETAIL_AP_NORTHEAST_2,
            self::DETAIL_AP_NORTHEAST_3,
            self::DETAIL_AP_SOUTH_1,
            self::DETAIL_AP_SOUTHEAST_1,
            self::DETAIL_AP_SOUTHEAST_2,
            self::DETAIL_CA_CENTRAL_1,
            self::DETAIL_CN_NORTH_1,
            self::DETAIL_CN_NORTHWEST_1,
            self::DETAIL_EU_CENTRAL_1,
            self::DETAIL_EU_NORTH_1,
            self::DETAIL_EU_SOUTH_1,
            self::DETAIL_EU_WEST_1,
            self::DETAIL_EU_WEST_2,
            self::DETAIL_EU_WEST_3,
            self::DETAIL_ME_SOUTH_1,
            self::DETAIL_SA_EAST_1,
            self::DETAIL_US_EAST_1,
            self::DETAIL_US_EAST_2,
            self::DETAIL_US_GOV_EAST_1,
            self::DETAIL_US_GOV_WEST_1,
            self::DETAIL_US_WEST_1,
            self::DETAIL_US_WEST_2,
            self::DETAIL_AVERAGE,
            self::DETAIL_CENTRAL_INDIA,
            self::DETAIL_CENTRAL_US,
            self::DETAIL_EAST_ASIA,
            self::DETAIL_EAST_US_2,
            self::DETAIL_EAST_US_3,
            self::DETAIL_EAST_US,
            self::DETAIL_NORTH_CENTRAL_US,
            self::DETAIL_NORTH_EUROPE,
            self::DETAIL_SOUTH_CENTRAL_US,
            self::DETAIL_SOUTH_INDIA,
            self::DETAIL_SOUTHEAST_ASIA,
            self::DETAIL_UK_SOUTH,
            self::DETAIL_UK_WEST,
            self::DETAIL_WEST_CENTRAL_US,
            self::DETAIL_WEST_EUROPE,
            self::DETAIL_WEST_INDIA,
            self::DETAIL_WEST_US_2,
            self::DETAIL_WEST_US_3,
            self::DETAIL_WEST_US,
            self::DETAIL_ASIA_EAST_1,
            self::DETAIL_ASIA_EAST_2,
            self::DETAIL_ASIA_NORTHEAST_1,
            self::DETAIL_ASIA_NORTHEAST_2,
            self::DETAIL_ASIA_NORTHEAST_3,
            self::DETAIL_ASIA_SOUTH_1,
            self::DETAIL_ASIA_SOUTHEAST_1,
            self::DETAIL_ASIA_SOUTHEAST_2,
            self::DETAIL_AUSTRALIA_SOUTHEAST_1,
            self::DETAIL_EUROPE_NORTH_1,
            self::DETAIL_EUROPE_WEST_1,
            self::DETAIL_EUROPE_WEST_2,
            self::DETAIL_EUROPE_WEST_3,
            self::DETAIL_EUROPE_WEST_4,
            self::DETAIL_EUROPE_WEST_6,
            self::DETAIL_NORTHAMERICA_NORTHEAST_1,
            self::DETAIL_SOUTHAMERICA_EAST_1,
            self::DETAIL_US_CENTRAL_1,
            self::DETAIL_US_EAST_4,
            self::DETAIL_US_WEST_3,
            self::DETAIL_US_WEST_4,
        ];
    }

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getWeightUnitAllowableValues()
    {
        return [
            self::WEIGHT_UNIT_KILOGRAMS,
            self::WEIGHT_UNIT_GRAMS,
            self::WEIGHT_UNIT_METRIC_TONS,
            self::WEIGHT_UNIT_IMPERIAL_TONS,
            self::WEIGHT_UNIT_POUNDS,
            self::WEIGHT_UNIT_OUNCES,
        ];
    }

    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->setIfExists('type', $data ?? [], null);
        $this->setIfExists('activity', $data ?? [], null);
        $this->setIfExists('specification', $data ?? [], null);
        $this->setIfExists('value', $data ?? [], null);
        $this->setIfExists('unit', $data ?? [], null);
        $this->setIfExists('detail', $data ?? [], 'average');
        $this->setIfExists('departure', $data ?? [], null);
        $this->setIfExists('destination', $data ?? [], null);
        $this->setIfExists('returnTrip', $data ?? [], true);
        $this->setIfExists('passengers', $data ?? [], 1);
        $this->setIfExists('weight', $data ?? [], 1);
        $this->setIfExists('weightUnit', $data ?? [], 'metric tons');
        $this->setIfExists('amount', $data ?? [], null);
        $this->setIfExists('multiplier', $data ?? [], 1);
    }

    /**
    * Sets $this->container[$variableName] to the given data or to the given default Value
    *
    * @param string $variableName
    * @param array  $fields
    * @param mixed  $defaultValue
    */
    private function setIfExists(string $variableName, array $fields, $defaultValue): void
    {
        $this->container[$variableName] = $fields[$variableName] ?? $defaultValue;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['type'] === null) {
            $invalidProperties[] = "'type' can't be null";
        }
        $allowedValues = $this->getTypeAllowableValues();
        if (!is_null($this->container['type']) && !in_array($this->container['type'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'type', must be one of '%s'",
                $this->container['type'],
                implode("', '", $allowedValues)
            );
        }

        if ($this->container['activity'] === null) {
            $invalidProperties[] = "'activity' can't be null";
        }
        if ($this->container['specification'] === null) {
            $invalidProperties[] = "'specification' can't be null";
        }
        if ($this->container['value'] === null) {
            $invalidProperties[] = "'value' can't be null";
        }
        if ($this->container['unit'] === null) {
            $invalidProperties[] = "'unit' can't be null";
        }
        $allowedValues = $this->getDetailAllowableValues();
        if (!is_null($this->container['detail']) && !in_array($this->container['detail'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'detail', must be one of '%s'",
                $this->container['detail'],
                implode("', '", $allowedValues)
            );
        }

        if ($this->container['departure'] === null) {
            $invalidProperties[] = "'departure' can't be null";
        }
        if ($this->container['destination'] === null) {
            $invalidProperties[] = "'destination' can't be null";
        }
        $allowedValues = $this->getWeightUnitAllowableValues();
        if (!is_null($this->container['weightUnit']) && !in_array($this->container['weightUnit'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'weightUnit', must be one of '%s'",
                $this->container['weightUnit'],
                implode("', '", $allowedValues)
            );
        }

        if ($this->container['amount'] === null) {
            $invalidProperties[] = "'amount' can't be null";
        }
        if (($this->container['amount'] < 1)) {
            $invalidProperties[] = "invalid value for 'amount', must be bigger than or equal to 1.";
        }

        if (!is_null($this->container['multiplier']) && ($this->container['multiplier'] < 1)) {
            $invalidProperties[] = "invalid value for 'multiplier', must be bigger than or equal to 1.";
        }

        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }


    /**
     * Gets type
     *
     * @return string
     */
    public function getType()
    {
        return $this->container['type'];
    }

    /**
     * Sets type
     *
     * @param string $type type
     *
     * @return self
     */
    public function setType($type)
    {
        if (is_null($type)) {
            throw new \InvalidArgumentException('non-nullable type cannot be null');
        }
        $allowedValues = $this->getTypeAllowableValues();
        if (!in_array($type, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'type', must be one of '%s'",
                    $type,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['type'] = $type;

        return $this;
    }

    /**
     * Gets activity
     *
     * @return string
     */
    public function getActivity()
    {
        return $this->container['activity'];
    }

    /**
     * Sets activity
     *
     * @param string $activity Describe the individual factor
     *
     * @return self
     */
    public function setActivity($activity)
    {
        if (is_null($activity)) {
            throw new \InvalidArgumentException('non-nullable activity cannot be null');
        }
        $this->container['activity'] = $activity;

        return $this;
    }

    /**
     * Gets specification
     *
     * @return string
     */
    public function getSpecification()
    {
        return $this->container['specification'];
    }

    /**
     * Sets specification
     *
     * @param string $specification Specify the individual factor
     *
     * @return self
     */
    public function setSpecification($specification)
    {
        if (is_null($specification)) {
            throw new \InvalidArgumentException('non-nullable specification cannot be null');
        }
        $this->container['specification'] = $specification;

        return $this;
    }

    /**
     * Gets value
     *
     * @return float
     */
    public function getValue()
    {
        return $this->container['value'];
    }

    /**
     * Sets value
     *
     * @param float $value The value in the given unit
     *
     * @return self
     */
    public function setValue($value)
    {
        if (is_null($value)) {
            throw new \InvalidArgumentException('non-nullable value cannot be null');
        }
        $this->container['value'] = $value;

        return $this;
    }

    /**
     * Gets unit
     *
     * @return string
     */
    public function getUnit()
    {
        return $this->container['unit'];
    }

    /**
     * Sets unit
     *
     * @param string $unit Describe the unit used by the multiplier
     *
     * @return self
     */
    public function setUnit($unit)
    {
        if (is_null($unit)) {
            throw new \InvalidArgumentException('non-nullable unit cannot be null');
        }
        $this->container['unit'] = $unit;

        return $this;
    }

    /**
     * Gets detail
     *
     * @return string|null
     */
    public function getDetail()
    {
        return $this->container['detail'];
    }

    /**
     * Sets detail
     *
     * @param string|null $detail **Hint:** Some specifications only support certain details.
     *
     * @return self
     */
    public function setDetail($detail)
    {
        if (is_null($detail)) {
            throw new \InvalidArgumentException('non-nullable detail cannot be null');
        }
        $allowedValues = $this->getDetailAllowableValues();
        if (!in_array($detail, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'detail', must be one of '%s'",
                    $detail,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['detail'] = $detail;

        return $this;
    }

    /**
     * Gets departure
     *
     * @return string
     */
    public function getDeparture()
    {
        return $this->container['departure'];
    }

    /**
     * Sets departure
     *
     * @param string $departure City, Postal Address, Train Station or IATA Code of the departure address
     *
     * @return self
     */
    public function setDeparture($departure)
    {
        if (is_null($departure)) {
            throw new \InvalidArgumentException('non-nullable departure cannot be null');
        }
        $this->container['departure'] = $departure;

        return $this;
    }

    /**
     * Gets destination
     *
     * @return string
     */
    public function getDestination()
    {
        return $this->container['destination'];
    }

    /**
     * Sets destination
     *
     * @param string $destination City, Postal Address, Train Station or IATA Code of the destination address
     *
     * @return self
     */
    public function setDestination($destination)
    {
        if (is_null($destination)) {
            throw new \InvalidArgumentException('non-nullable destination cannot be null');
        }
        $this->container['destination'] = $destination;

        return $this;
    }

    /**
     * Gets returnTrip
     *
     * @return bool|null
     */
    public function getReturnTrip()
    {
        return $this->container['returnTrip'];
    }

    /**
     * Sets returnTrip
     *
     * @param bool|null $returnTrip Decide if the trip is one way or return
     *
     * @return self
     */
    public function setReturnTrip($returnTrip)
    {
        if (is_null($returnTrip)) {
            throw new \InvalidArgumentException('non-nullable returnTrip cannot be null');
        }
        $this->container['returnTrip'] = $returnTrip;

        return $this;
    }

    /**
     * Gets passengers
     *
     * @return int|null
     */
    public function getPassengers()
    {
        return $this->container['passengers'];
    }

    /**
     * Sets passengers
     *
     * @param int|null $passengers The total of passengers travelling this route
     *
     * @return self
     */
    public function setPassengers($passengers)
    {
        if (is_null($passengers)) {
            throw new \InvalidArgumentException('non-nullable passengers cannot be null');
        }
        $this->container['passengers'] = $passengers;

        return $this;
    }

    /**
     * Gets weight
     *
     * @return float|null
     */
    public function getWeight()
    {
        return $this->container['weight'];
    }

    /**
     * Sets weight
     *
     * @param float|null $weight The total weight travelling this route
     *
     * @return self
     */
    public function setWeight($weight)
    {
        if (is_null($weight)) {
            throw new \InvalidArgumentException('non-nullable weight cannot be null');
        }
        $this->container['weight'] = $weight;

        return $this;
    }

    /**
     * Gets weightUnit
     *
     * @return string|null
     */
    public function getWeightUnit()
    {
        return $this->container['weightUnit'];
    }

    /**
     * Sets weightUnit
     *
     * @param string|null $weightUnit Need a more specific unit? See the **[full list of supported units (Section 5)](https://convert.js.org/types/_unitsbymeasureraw)**.
     *
     * @return self
     */
    public function setWeightUnit($weightUnit)
    {
        if (is_null($weightUnit)) {
            throw new \InvalidArgumentException('non-nullable weightUnit cannot be null');
        }
        $allowedValues = $this->getWeightUnitAllowableValues();
        if (!in_array($weightUnit, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'weightUnit', must be one of '%s'",
                    $weightUnit,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['weightUnit'] = $weightUnit;

        return $this;
    }

    /**
     * Gets amount
     *
     * @return int
     */
    public function getAmount()
    {
        return $this->container['amount'];
    }

    /**
     * Sets amount
     *
     * @param int $amount The amount of kg CO*2*e you want to add to the calculation.
     *
     * @return self
     */
    public function setAmount($amount)
    {
        if (is_null($amount)) {
            throw new \InvalidArgumentException('non-nullable amount cannot be null');
        }

        if (($amount < 1)) {
            throw new \InvalidArgumentException('invalid value for $amount when calling PendingByCalculationRequestCalculationOptionsInner., must be bigger than or equal to 1.');
        }

        $this->container['amount'] = $amount;

        return $this;
    }

    /**
     * Gets multiplier
     *
     * @return int|null
     */
    public function getMultiplier()
    {
        return $this->container['multiplier'];
    }

    /**
     * Sets multiplier
     *
     * @param int|null $multiplier Multiplier for the given amount
     *
     * @return self
     */
    public function setMultiplier($multiplier)
    {
        if (is_null($multiplier)) {
            throw new \InvalidArgumentException('non-nullable multiplier cannot be null');
        }

        if (($multiplier < 1)) {
            throw new \InvalidArgumentException('invalid value for $multiplier when calling PendingByCalculationRequestCalculationOptionsInner., must be bigger than or equal to 1.');
        }

        $this->container['multiplier'] = $multiplier;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    public function offsetExists($offset): bool
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param integer $offset Offset
     *
     * @return mixed|null
     */
    #[\ReturnTypeWillChange]
    public function offsetGet($offset)
    {
        return $this->container[$offset] ?? null;
    }

    /**
     * Sets value based on offset.
     *
     * @param int|null $offset Offset
     * @param mixed    $value  Value to be set
     *
     * @return void
     */
    public function offsetSet($offset, $value): void
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     *
     * @param integer $offset Offset
     *
     * @return void
     */
    public function offsetUnset($offset): void
    {
        unset($this->container[$offset]);
    }

    /**
     * Serializes the object to a value that can be serialized natively by json_encode().
     * @link https://www.php.net/manual/en/jsonserializable.jsonserialize.php
     *
     * @return mixed Returns data which can be serialized by json_encode(), which is a value
     * of any type other than a resource.
     */
    #[\ReturnTypeWillChange]
    public function jsonSerialize()
    {
       return ObjectSerializer::sanitizeForSerialization($this);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString()
    {
        return json_encode(
            ObjectSerializer::sanitizeForSerialization($this),
            JSON_PRETTY_PRINT
        );
    }

    /**
     * Gets a header-safe presentation of the object
     *
     * @return string
     */
    public function toHeaderValue()
    {
        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}


