<?php
/**
 * InfrastructureRealEstateCurrency
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
 * InfrastructureRealEstateCurrency Class Doc Comment
 *
 * @category Class
 * @package  KlimAPI
 * @author   KlimAPI Team
 * @link     https://klimapi.com
 * @implements \ArrayAccess<string, mixed>
 */
class InfrastructureRealEstateCurrency implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model. bla
      *
      * @var string
      */
    protected static $openAPIModelName = 'InfrastructureRealEstateCurrency';

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

    public const TYPE_INFRASTRUCTURE = 'infrastructure';
    public const SPECIFICATION_AT = 'at';
    public const SPECIFICATION_AU = 'au';
    public const SPECIFICATION_BE = 'be';
    public const SPECIFICATION_BG = 'bg';
    public const SPECIFICATION_BR = 'br';
    public const SPECIFICATION_CA = 'ca';
    public const SPECIFICATION_CH = 'ch';
    public const SPECIFICATION_CN = 'cn';
    public const SPECIFICATION_CY = 'cy';
    public const SPECIFICATION_CZ = 'cz';
    public const SPECIFICATION_DE = 'de';
    public const SPECIFICATION_DK = 'dk';
    public const SPECIFICATION_EE = 'ee';
    public const SPECIFICATION_ES = 'es';
    public const SPECIFICATION_FI = 'fi';
    public const SPECIFICATION_FR = 'fr';
    public const SPECIFICATION_GB = 'gb';
    public const SPECIFICATION_GR = 'gr';
    public const SPECIFICATION_HR = 'hr';
    public const SPECIFICATION_HU = 'hu';
    public const SPECIFICATION_ID = 'id';
    public const SPECIFICATION_IE = 'ie';
    public const SPECIFICATION_IN = 'in';
    public const SPECIFICATION_IT = 'it';
    public const SPECIFICATION_JP = 'jp';
    public const SPECIFICATION_KR = 'kr';
    public const SPECIFICATION_LT = 'lt';
    public const SPECIFICATION_LU = 'lu';
    public const SPECIFICATION_LV = 'lv';
    public const SPECIFICATION_MT = 'mt';
    public const SPECIFICATION_MX = 'mx';
    public const SPECIFICATION_NL = 'nl';
    public const SPECIFICATION_NO = 'no';
    public const SPECIFICATION_PL = 'pl';
    public const SPECIFICATION_PT = 'pt';
    public const SPECIFICATION_RO = 'ro';
    public const SPECIFICATION_RU = 'ru';
    public const SPECIFICATION_SE = 'se';
    public const SPECIFICATION_SI = 'si';
    public const SPECIFICATION_SK = 'sk';
    public const SPECIFICATION_TR = 'tr';
    public const SPECIFICATION_TW = 'tw';
    public const SPECIFICATION_US = 'us';
    public const SPECIFICATION_ZA = 'za';
    public const SPECIFICATION_AVERAGE = 'average';
    public const UNIT_EUR = 'EUR';
    public const UNIT_USD = 'USD';
    public const UNIT_GBP = 'GBP';
    public const UNIT_CHF = 'CHF';
    public const UNIT_CAD = 'CAD';
    public const UNIT_NOK = 'NOK';
    public const UNIT_SEK = 'SEK';
    public const UNIT_DKK = 'DKK';
    public const UNIT_INR = 'INR';
    public const UNIT_ALL = 'ALL';
    public const UNIT_AMD = 'AMD';
    public const UNIT_ANG = 'ANG';
    public const UNIT_AOA = 'AOA';
    public const UNIT_ARS = 'ARS';
    public const UNIT_AUD = 'AUD';
    public const UNIT_AWG = 'AWG';
    public const UNIT_AZN = 'AZN';
    public const UNIT_BAM = 'BAM';
    public const UNIT_BBD = 'BBD';
    public const UNIT_BDT = 'BDT';
    public const UNIT_BGN = 'BGN';
    public const UNIT_BMD = 'BMD';
    public const UNIT_BND = 'BND';
    public const UNIT_BOB = 'BOB';
    public const UNIT_BRL = 'BRL';
    public const UNIT_BSD = 'BSD';
    public const UNIT_BWP = 'BWP';
    public const UNIT_BZD = 'BZD';
    public const UNIT_COP = 'COP';
    public const UNIT_CRC = 'CRC';
    public const UNIT_CVE = 'CVE';
    public const UNIT_CZK = 'CZK';
    public const UNIT_DOP = 'DOP';
    public const UNIT_DZD = 'DZD';
    public const UNIT_EGP = 'EGP';
    public const UNIT_ETB = 'ETB';
    public const UNIT_FJD = 'FJD';
    public const UNIT_FKP = 'FKP';
    public const UNIT_GEL = 'GEL';
    public const UNIT_GIP = 'GIP';
    public const UNIT_GMD = 'GMD';
    public const UNIT_GTQ = 'GTQ';
    public const UNIT_GYD = 'GYD';
    public const UNIT_HKD = 'HKD';
    public const UNIT_HNL = 'HNL';
    public const UNIT_HTG = 'HTG';
    public const UNIT_HUF = 'HUF';
    public const UNIT_IDR = 'IDR';
    public const UNIT_ILS = 'ILS';
    public const UNIT_ISK = 'ISK';
    public const UNIT_JMD = 'JMD';
    public const UNIT_KES = 'KES';
    public const UNIT_KGS = 'KGS';
    public const UNIT_KHR = 'KHR';
    public const UNIT_KYD = 'KYD';
    public const UNIT_KZT = 'KZT';
    public const UNIT_LAK = 'LAK';
    public const UNIT_LBP = 'LBP';
    public const UNIT_LKR = 'LKR';
    public const UNIT_LRD = 'LRD';
    public const UNIT_LSL = 'LSL';
    public const UNIT_MAD = 'MAD';
    public const UNIT_MDL = 'MDL';
    public const UNIT_MKD = 'MKD';
    public const UNIT_MMK = 'MMK';
    public const UNIT_MNT = 'MNT';
    public const UNIT_MOP = 'MOP';
    public const UNIT_MUR = 'MUR';
    public const UNIT_MVR = 'MVR';
    public const UNIT_MWK = 'MWK';
    public const UNIT_MXN = 'MXN';
    public const UNIT_MYR = 'MYR';
    public const UNIT_MZN = 'MZN';
    public const UNIT_NAD = 'NAD';
    public const UNIT_NGN = 'NGN';
    public const UNIT_NIO = 'NIO';
    public const UNIT_NPR = 'NPR';
    public const UNIT_NZD = 'NZD';
    public const UNIT_PAB = 'PAB';
    public const UNIT_PEN = 'PEN';
    public const UNIT_PGK = 'PGK';
    public const UNIT_PHP = 'PHP';
    public const UNIT_PKR = 'PKR';
    public const UNIT_PLN = 'PLN';
    public const UNIT_QAR = 'QAR';
    public const UNIT_RON = 'RON';
    public const UNIT_RSD = 'RSD';
    public const UNIT_SBD = 'SBD';
    public const UNIT_SCR = 'SCR';
    public const UNIT_SGD = 'SGD';
    public const UNIT_SHP = 'SHP';
    public const UNIT_SLE = 'SLE';
    public const UNIT_SOS = 'SOS';
    public const UNIT_SRD = 'SRD';
    public const UNIT_STD = 'STD';
    public const UNIT_SZL = 'SZL';
    public const UNIT_THB = 'THB';
    public const UNIT_TJS = 'TJS';
    public const UNIT_TOP = 'TOP';
    public const UNIT__TRY = 'TRY';
    public const UNIT_TTD = 'TTD';
    public const UNIT_TWD = 'TWD';
    public const UNIT_TZS = 'TZS';
    public const UNIT_UAH = 'UAH';
    public const UNIT_UYU = 'UYU';
    public const UNIT_UZS = 'UZS';
    public const UNIT_WST = 'WST';
    public const UNIT_XCD = 'XCD';
    public const UNIT_YER = 'YER';
    public const UNIT_ZAR = 'ZAR';
    public const UNIT_ZMW = 'ZMW';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getTypeAllowableValues()
    {
        return [
            self::TYPE_INFRASTRUCTURE,
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
            self::SPECIFICATION_AT,
            self::SPECIFICATION_AU,
            self::SPECIFICATION_BE,
            self::SPECIFICATION_BG,
            self::SPECIFICATION_BR,
            self::SPECIFICATION_CA,
            self::SPECIFICATION_CH,
            self::SPECIFICATION_CN,
            self::SPECIFICATION_CY,
            self::SPECIFICATION_CZ,
            self::SPECIFICATION_DE,
            self::SPECIFICATION_DK,
            self::SPECIFICATION_EE,
            self::SPECIFICATION_ES,
            self::SPECIFICATION_FI,
            self::SPECIFICATION_FR,
            self::SPECIFICATION_GB,
            self::SPECIFICATION_GR,
            self::SPECIFICATION_HR,
            self::SPECIFICATION_HU,
            self::SPECIFICATION_ID,
            self::SPECIFICATION_IE,
            self::SPECIFICATION_IN,
            self::SPECIFICATION_IT,
            self::SPECIFICATION_JP,
            self::SPECIFICATION_KR,
            self::SPECIFICATION_LT,
            self::SPECIFICATION_LU,
            self::SPECIFICATION_LV,
            self::SPECIFICATION_MT,
            self::SPECIFICATION_MX,
            self::SPECIFICATION_NL,
            self::SPECIFICATION_NO,
            self::SPECIFICATION_PL,
            self::SPECIFICATION_PT,
            self::SPECIFICATION_RO,
            self::SPECIFICATION_RU,
            self::SPECIFICATION_SE,
            self::SPECIFICATION_SI,
            self::SPECIFICATION_SK,
            self::SPECIFICATION_TR,
            self::SPECIFICATION_TW,
            self::SPECIFICATION_US,
            self::SPECIFICATION_ZA,
            self::SPECIFICATION_AVERAGE,
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
            self::UNIT_EUR,
            self::UNIT_USD,
            self::UNIT_GBP,
            self::UNIT_CHF,
            self::UNIT_CAD,
            self::UNIT_NOK,
            self::UNIT_SEK,
            self::UNIT_DKK,
            self::UNIT_INR,
            self::UNIT_ALL,
            self::UNIT_AMD,
            self::UNIT_ANG,
            self::UNIT_AOA,
            self::UNIT_ARS,
            self::UNIT_AUD,
            self::UNIT_AWG,
            self::UNIT_AZN,
            self::UNIT_BAM,
            self::UNIT_BBD,
            self::UNIT_BDT,
            self::UNIT_BGN,
            self::UNIT_BMD,
            self::UNIT_BND,
            self::UNIT_BOB,
            self::UNIT_BRL,
            self::UNIT_BSD,
            self::UNIT_BWP,
            self::UNIT_BZD,
            self::UNIT_COP,
            self::UNIT_CRC,
            self::UNIT_CVE,
            self::UNIT_CZK,
            self::UNIT_DOP,
            self::UNIT_DZD,
            self::UNIT_EGP,
            self::UNIT_ETB,
            self::UNIT_FJD,
            self::UNIT_FKP,
            self::UNIT_GEL,
            self::UNIT_GIP,
            self::UNIT_GMD,
            self::UNIT_GTQ,
            self::UNIT_GYD,
            self::UNIT_HKD,
            self::UNIT_HNL,
            self::UNIT_HTG,
            self::UNIT_HUF,
            self::UNIT_IDR,
            self::UNIT_ILS,
            self::UNIT_ISK,
            self::UNIT_JMD,
            self::UNIT_KES,
            self::UNIT_KGS,
            self::UNIT_KHR,
            self::UNIT_KYD,
            self::UNIT_KZT,
            self::UNIT_LAK,
            self::UNIT_LBP,
            self::UNIT_LKR,
            self::UNIT_LRD,
            self::UNIT_LSL,
            self::UNIT_MAD,
            self::UNIT_MDL,
            self::UNIT_MKD,
            self::UNIT_MMK,
            self::UNIT_MNT,
            self::UNIT_MOP,
            self::UNIT_MUR,
            self::UNIT_MVR,
            self::UNIT_MWK,
            self::UNIT_MXN,
            self::UNIT_MYR,
            self::UNIT_MZN,
            self::UNIT_NAD,
            self::UNIT_NGN,
            self::UNIT_NIO,
            self::UNIT_NPR,
            self::UNIT_NZD,
            self::UNIT_PAB,
            self::UNIT_PEN,
            self::UNIT_PGK,
            self::UNIT_PHP,
            self::UNIT_PKR,
            self::UNIT_PLN,
            self::UNIT_QAR,
            self::UNIT_RON,
            self::UNIT_RSD,
            self::UNIT_SBD,
            self::UNIT_SCR,
            self::UNIT_SGD,
            self::UNIT_SHP,
            self::UNIT_SLE,
            self::UNIT_SOS,
            self::UNIT_SRD,
            self::UNIT_STD,
            self::UNIT_SZL,
            self::UNIT_THB,
            self::UNIT_TJS,
            self::UNIT_TOP,
            self::UNIT__TRY,
            self::UNIT_TTD,
            self::UNIT_TWD,
            self::UNIT_TZS,
            self::UNIT_UAH,
            self::UNIT_UYU,
            self::UNIT_UZS,
            self::UNIT_WST,
            self::UNIT_XCD,
            self::UNIT_YER,
            self::UNIT_ZAR,
            self::UNIT_ZMW,
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
        $this->setIfExists('activity', $data ?? [], 'real_estate');
        $this->setIfExists('specification', $data ?? [], 'average');
        $this->setIfExists('value', $data ?? [], null);
        $this->setIfExists('unit', $data ?? [], 'EUR');
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
     * @param string|null $unit unit
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


