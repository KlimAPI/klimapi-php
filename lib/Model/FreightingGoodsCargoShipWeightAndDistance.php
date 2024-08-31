<?php
/**
 * FreightingGoodsCargoShipWeightAndDistance
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
 * FreightingGoodsCargoShipWeightAndDistance Class Doc Comment
 *
 * @category Class
 * @package  KlimAPI
 * @author   KlimAPI Team
 * @link     https://klimapi.com
 * @implements \ArrayAccess<string, mixed>
 */
class FreightingGoodsCargoShipWeightAndDistance implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model. bla
      *
      * @var string
      */
    protected static $openAPIModelName = 'FreightingGoodsCargoShipWeightAndDistance';

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

    public const TYPE_FREIGHTING_GOODS = 'freighting_goods';
    public const SPECIFICATION_BULK_CARRIER = 'bulk_carrier';
    public const SPECIFICATION_GENERAL_CARGO = 'general_cargo';
    public const SPECIFICATION_CONTAINER_SHIP = 'container_ship';
    public const SPECIFICATION_VEHICLE_TRANSPORT = 'vehicle_transport';
    public const SPECIFICATION_RORO_FERRY = 'roro-ferry';
    public const SPECIFICATION_LARGE_ROPAX_FERRY = 'large_ropax_ferry';
    public const SPECIFICATION_REFRIGERATED_CARGO = 'refrigerated_cargo';
    public const SPECIFICATION_AVERAGE = 'average';
    public const DETAIL__200000_DWT = '200,000+_dwt';
    public const DETAIL__100000199999_DWT = '100,000–199,999_dwt';
    public const DETAIL__6000099999_DWT = '60,000–99,999_dwt';
    public const DETAIL__3500059999_DWT = '35,000–59,999_dwt';
    public const DETAIL__1000034999_DWT = '10,000–34,999_dwt';
    public const DETAIL__09999_DWT = '0–9999_dwt';
    public const DETAIL_AVERAGE = 'average';
    public const DETAIL__10000_DWT = '10,000+_dwt';
    public const DETAIL__50009999_DWT = '5000–9999_dwt';
    public const DETAIL__04999_DWT = '0–4999_dwt';
    public const DETAIL__10000_DWT_100_TEU = '10,000+_dwt_100+_teu';
    public const DETAIL__50009999_DWT_100_TEU = '5000–9999_dwt_100+_teu';
    public const DETAIL__04999_DWT_100_TEU = '0–4999_dwt_100+_teu';
    public const DETAIL__8000_TEU = '8000+_teu';
    public const DETAIL__50007999_TEU = '5000–7999_teu';
    public const DETAIL__30004999_TEU = '3000–4999_teu';
    public const DETAIL__20002999_TEU = '2000–2999_teu';
    public const DETAIL__10001999_TEU = '1000–1999_teu';
    public const DETAIL__0999_TEU = '0–999_teu';
    public const DETAIL__4000_CEU = '4000+_ceu';
    public const DETAIL__03999_CEU = '0–3999_ceu';
    public const DETAIL__2000_LM = '2000+_lm';
    public const DETAIL__01999_LM = '0–1999_lm';
    public const DETAIL_ALL_DWT = '_all_dwt';
    public const UNIT_METRIC_TONS_KILOMETERS = 'metric tons.kilometers';
    public const UNIT_METRIC_TONS_METERS = 'metric tons.meters';
    public const UNIT_METRIC_TONS_MILES = 'metric tons.miles';
    public const UNIT_KILOGRAMS_KILOMETERS = 'kilograms.kilometers';
    public const UNIT_KILOGRAMS_METERS = 'kilograms.meters';
    public const UNIT_KILOGRAMS_MILES = 'kilograms.miles';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getTypeAllowableValues()
    {
        return [
            self::TYPE_FREIGHTING_GOODS,
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
            self::SPECIFICATION_BULK_CARRIER,
            self::SPECIFICATION_GENERAL_CARGO,
            self::SPECIFICATION_CONTAINER_SHIP,
            self::SPECIFICATION_VEHICLE_TRANSPORT,
            self::SPECIFICATION_RORO_FERRY,
            self::SPECIFICATION_LARGE_ROPAX_FERRY,
            self::SPECIFICATION_REFRIGERATED_CARGO,
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
            self::DETAIL__200000_DWT,
            self::DETAIL__100000199999_DWT,
            self::DETAIL__6000099999_DWT,
            self::DETAIL__3500059999_DWT,
            self::DETAIL__1000034999_DWT,
            self::DETAIL__09999_DWT,
            self::DETAIL_AVERAGE,
            self::DETAIL__10000_DWT,
            self::DETAIL__50009999_DWT,
            self::DETAIL__04999_DWT,
            self::DETAIL__10000_DWT_100_TEU,
            self::DETAIL__50009999_DWT_100_TEU,
            self::DETAIL__04999_DWT_100_TEU,
            self::DETAIL__8000_TEU,
            self::DETAIL__50007999_TEU,
            self::DETAIL__30004999_TEU,
            self::DETAIL__20002999_TEU,
            self::DETAIL__10001999_TEU,
            self::DETAIL__0999_TEU,
            self::DETAIL__4000_CEU,
            self::DETAIL__03999_CEU,
            self::DETAIL__2000_LM,
            self::DETAIL__01999_LM,
            self::DETAIL_ALL_DWT,
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
            self::UNIT_METRIC_TONS_KILOMETERS,
            self::UNIT_METRIC_TONS_METERS,
            self::UNIT_METRIC_TONS_MILES,
            self::UNIT_KILOGRAMS_KILOMETERS,
            self::UNIT_KILOGRAMS_METERS,
            self::UNIT_KILOGRAMS_MILES,
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
        $this->setIfExists('activity', $data ?? [], 'cargo_ship');
        $this->setIfExists('specification', $data ?? [], 'average');
        $this->setIfExists('detail', $data ?? [], 'average');
        $this->setIfExists('value', $data ?? [], null);
        $this->setIfExists('unit', $data ?? [], 'metric tons.kilometers');
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
     * @param string|null $unit Distance a specific weight traveled in the given unit.    **Example:** 10 metric tons travel 50 kilometers. So the right `value` would be **500** and the `unit` would be **metric tons.kilometers**.    Need a more specific unit? See the **[full list of supported units (Sections 5 and 6)](https://convert.js.org/types/_unitsbymeasureraw)**.
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


