<?php
/**
 * CloudComputingMemoryGbHour
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
 * CloudComputingMemoryGbHour Class Doc Comment
 *
 * @category Class
 * @package  KlimAPI
 * @author   KlimAPI Team
 * @link     https://klimapi.com
 * @implements \ArrayAccess<string, mixed>
 */
class CloudComputingMemoryGbHour implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model. bla
      *
      * @var string
      */
    protected static $openAPIModelName = 'CloudComputingMemoryGbHour';

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
        'value' => 'float',
        'unit' => 'string'
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
        'value' => null,
        'unit' => null
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
        'value' => false,
        'unit' => false
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
        'value' => 'value',
        'unit' => 'unit'
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
        'value' => 'setValue',
        'unit' => 'setUnit'
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
        'value' => 'getValue',
        'unit' => 'getUnit'
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

    public const TYPE_CLOUD_COMPUTING = 'cloud_computing';
    public const SPECIFICATION_AWS = 'aws';
    public const SPECIFICATION_AZURE = 'azure';
    public const SPECIFICATION_GCP = 'gcp';
    public const SPECIFICATION_AVERAGE = 'average';
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
    public const UNIT_GB_HOUR = 'gb-hour';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getTypeAllowableValues()
    {
        return [
            self::TYPE_CLOUD_COMPUTING,
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
            self::SPECIFICATION_AWS,
            self::SPECIFICATION_AZURE,
            self::SPECIFICATION_GCP,
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
    public function getUnitAllowableValues()
    {
        return [
            self::UNIT_GB_HOUR,
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
        $this->setIfExists('activity', $data ?? [], 'memory');
        $this->setIfExists('specification', $data ?? [], 'average');
        $this->setIfExists('detail', $data ?? [], 'average');
        $this->setIfExists('value', $data ?? [], null);
        $this->setIfExists('unit', $data ?? [], 'gb-hour');
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

        if ($this->container['value'] === null) {
            $invalidProperties[] = "'value' can't be null";
        }
        $allowedValues = $this->getUnitAllowableValues();
        if (!is_null($this->container['unit']) && !in_array($this->container['unit'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'unit', must be one of '%s'",
                $this->container['unit'],
                implode("', '", $allowedValues)
            );
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
     * @return string|null
     */
    public function getUnit()
    {
        return $this->container['unit'];
    }

    /**
     * Sets unit
     *
     * @param string|null $unit Need another unit? Contact us!
     *
     * @return self
     */
    public function setUnit($unit)
    {
        if (is_null($unit)) {
            throw new \InvalidArgumentException('non-nullable unit cannot be null');
        }
        $allowedValues = $this->getUnitAllowableValues();
        if (!in_array($unit, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'unit', must be one of '%s'",
                    $unit,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['unit'] = $unit;

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


