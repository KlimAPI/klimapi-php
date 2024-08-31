<?php
/**
 * TravelLandCarsBySizeDepartureAndDestination
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
 * TravelLandCarsBySizeDepartureAndDestination Class Doc Comment
 *
 * @category Class
 * @package  KlimAPI
 * @author   KlimAPI Team
 * @link     https://klimapi.com
 * @implements \ArrayAccess<string, mixed>
 */
class TravelLandCarsBySizeDepartureAndDestination implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model. bla
      *
      * @var string
      */
    protected static $openAPIModelName = 'TravelLandCarsBySizeDepartureAndDestination';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'type' => 'string',
        'activity' => 'string',
        'specification' => 'string',
        'detail' => 'string',
        'departure' => 'string',
        'destination' => 'string',
        'returnTrip' => 'bool'
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
        'detail' => null,
        'departure' => null,
        'destination' => null,
        'returnTrip' => null
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
        'detail' => false,
        'departure' => false,
        'destination' => false,
        'returnTrip' => false
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
        'detail' => 'detail',
        'departure' => 'departure',
        'destination' => 'destination',
        'returnTrip' => 'return_trip'
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
        'detail' => 'setDetail',
        'departure' => 'setDeparture',
        'destination' => 'setDestination',
        'returnTrip' => 'setReturnTrip'
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
        'detail' => 'getDetail',
        'departure' => 'getDeparture',
        'destination' => 'getDestination',
        'returnTrip' => 'getReturnTrip'
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

    public const TYPE_TRAVEL_LAND = 'travel-land';
    public const SPECIFICATION_SMALL_CAR = 'small_car';
    public const SPECIFICATION_MEDIUM_CAR = 'medium_car';
    public const SPECIFICATION_LARGE_CAR = 'large_car';
    public const SPECIFICATION_AVERAGE = 'average';
    public const DETAIL_DIESEL = 'diesel';
    public const DETAIL_PETROL = 'petrol';
    public const DETAIL_HYBRID = 'hybrid';
    public const DETAIL_PLUG_IN_HYBRID_ELECTRIC_VEHICLE = 'plug-in_hybrid_electric_vehicle';
    public const DETAIL_BATTERY_ELECTRIC_VEHICLE = 'battery_electric_vehicle';
    public const DETAIL_AVERAGE = 'average';
    public const DETAIL_CNG = 'cng';
    public const DETAIL_LPG = 'lpg';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getTypeAllowableValues()
    {
        return [
            self::TYPE_TRAVEL_LAND,
        ];
    }

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getSpecificationAllowableValues()
    {
        return [
            self::SPECIFICATION_SMALL_CAR,
            self::SPECIFICATION_MEDIUM_CAR,
            self::SPECIFICATION_LARGE_CAR,
            self::SPECIFICATION_AVERAGE,
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
            self::DETAIL_DIESEL,
            self::DETAIL_PETROL,
            self::DETAIL_HYBRID,
            self::DETAIL_PLUG_IN_HYBRID_ELECTRIC_VEHICLE,
            self::DETAIL_BATTERY_ELECTRIC_VEHICLE,
            self::DETAIL_AVERAGE,
            self::DETAIL_CNG,
            self::DETAIL_LPG,
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
        $this->setIfExists('activity', $data ?? [], 'cars_by_size');
        $this->setIfExists('specification', $data ?? [], 'average');
        $this->setIfExists('detail', $data ?? [], 'average');
        $this->setIfExists('departure', $data ?? [], null);
        $this->setIfExists('destination', $data ?? [], null);
        $this->setIfExists('returnTrip', $data ?? [], true);
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

        $allowedValues = $this->getSpecificationAllowableValues();
        if (!is_null($this->container['specification']) && !in_array($this->container['specification'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'specification', must be one of '%s'",
                $this->container['specification'],
                implode("', '", $allowedValues)
            );
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
     * @return string|null
     */
    public function getActivity()
    {
        return $this->container['activity'];
    }

    /**
     * Sets activity
     *
     * @param string|null $activity activity
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
     * @return string|null
     */
    public function getSpecification()
    {
        return $this->container['specification'];
    }

    /**
     * Sets specification
     *
     * @param string|null $specification specification
     *
     * @return self
     */
    public function setSpecification($specification)
    {
        if (is_null($specification)) {
            throw new \InvalidArgumentException('non-nullable specification cannot be null');
        }
        $allowedValues = $this->getSpecificationAllowableValues();
        if (!in_array($specification, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'specification', must be one of '%s'",
                    $specification,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['specification'] = $specification;

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


