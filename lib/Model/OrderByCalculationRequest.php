<?php
/**
 * OrderByCalculationRequest
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
 * OrderByCalculationRequest Class Doc Comment
 *
 * @category Class
 * @package  KlimAPI
 * @author   KlimAPI Team
 * @link     https://klimapi.com
 * @implements \ArrayAccess<string, mixed>
 */
class OrderByCalculationRequest implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model. bla
      *
      * @var string
      */
    protected static $openAPIModelName = 'orderByCalculation_request';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'calculationOptions' => 'mixed[]',
        'recipientName' => 'string',
        'recipientEmail' => 'string',
        'sendAt' => '\DateTime',
        'priceLimit' => 'float',
        'metadata' => 'array<string,string>',
        'fractionalDigits' => 'int'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'calculationOptions' => null,
        'recipientName' => null,
        'recipientEmail' => null,
        'sendAt' => 'date-time',
        'priceLimit' => null,
        'metadata' => null,
        'fractionalDigits' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'calculationOptions' => false,
        'recipientName' => false,
        'recipientEmail' => false,
        'sendAt' => false,
        'priceLimit' => false,
        'metadata' => false,
        'fractionalDigits' => false
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
        'calculationOptions' => 'calculation_options',
        'recipientName' => 'recipient_name',
        'recipientEmail' => 'recipient_email',
        'sendAt' => 'send_at',
        'priceLimit' => 'price_limit',
        'metadata' => 'metadata',
        'fractionalDigits' => 'fractional_digits'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'calculationOptions' => 'setCalculationOptions',
        'recipientName' => 'setRecipientName',
        'recipientEmail' => 'setRecipientEmail',
        'sendAt' => 'setSendAt',
        'priceLimit' => 'setPriceLimit',
        'metadata' => 'setMetadata',
        'fractionalDigits' => 'setFractionalDigits'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'calculationOptions' => 'getCalculationOptions',
        'recipientName' => 'getRecipientName',
        'recipientEmail' => 'getRecipientEmail',
        'sendAt' => 'getSendAt',
        'priceLimit' => 'getPriceLimit',
        'metadata' => 'getMetadata',
        'fractionalDigits' => 'getFractionalDigits'
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
        $this->setIfExists('calculationOptions', $data ?? [], null);
        $this->setIfExists('recipientName', $data ?? [], null);
        $this->setIfExists('recipientEmail', $data ?? [], null);
        $this->setIfExists('sendAt', $data ?? [], null);
        $this->setIfExists('priceLimit', $data ?? [], null);
        $this->setIfExists('metadata', $data ?? [], null);
        $this->setIfExists('fractionalDigits', $data ?? [], 2);
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

        if ($this->container['calculationOptions'] === null) {
            $invalidProperties[] = "'calculationOptions' can't be null";
        }
        if (!is_null($this->container['priceLimit']) && ($this->container['priceLimit'] < 0.5)) {
            $invalidProperties[] = "invalid value for 'priceLimit', must be bigger than or equal to 0.5.";
        }

        if (!is_null($this->container['fractionalDigits']) && ($this->container['fractionalDigits'] < 0)) {
            $invalidProperties[] = "invalid value for 'fractionalDigits', must be bigger than or equal to 0.";
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
     * Gets calculationOptions
     *
     * @return mixed[]
     */
    public function getCalculationOptions()
    {
        return $this->container['calculationOptions'];
    }

    /**
     * Sets calculationOptions
     *
     * @param mixed[] $calculationOptions An Array of [Calculation Options](/resources/factors).
     *
     * @return self
     */
    public function setCalculationOptions($calculationOptions)
    {
        if (is_null($calculationOptions)) {
            throw new \InvalidArgumentException('non-nullable calculationOptions cannot be null');
        }
        $this->container['calculationOptions'] = $calculationOptions;

        return $this;
    }

    /**
     * Gets recipientName
     *
     * @return string|null
     */
    public function getRecipientName()
    {
        return $this->container['recipientName'];
    }

    /**
     * Sets recipientName
     *
     * @param string|null $recipientName The name which should be associated with the compensation
     *
     * @return self
     */
    public function setRecipientName($recipientName)
    {
        if (is_null($recipientName)) {
            throw new \InvalidArgumentException('non-nullable recipientName cannot be null');
        }
        $this->container['recipientName'] = $recipientName;

        return $this;
    }

    /**
     * Gets recipientEmail
     *
     * @return string|null
     */
    public function getRecipientEmail()
    {
        return $this->container['recipientEmail'];
    }

    /**
     * Sets recipientEmail
     *
     * @param string|null $recipientEmail If a valid e-mail address is provided, we will send the certificate to this address
     *
     * @return self
     */
    public function setRecipientEmail($recipientEmail)
    {
        if (is_null($recipientEmail)) {
            throw new \InvalidArgumentException('non-nullable recipientEmail cannot be null');
        }
        $this->container['recipientEmail'] = $recipientEmail;

        return $this;
    }

    /**
     * Gets sendAt
     *
     * @return \DateTime|null
     */
    public function getSendAt()
    {
        return $this->container['sendAt'];
    }

    /**
     * Sets sendAt
     *
     * @param \DateTime|null $sendAt Timestamp of when the certificate should be send to the customer in ISO 8601 format (UTC). Defaults to the current timestamp.
     *
     * @return self
     */
    public function setSendAt($sendAt)
    {
        if (is_null($sendAt)) {
            throw new \InvalidArgumentException('non-nullable sendAt cannot be null');
        }
        $this->container['sendAt'] = $sendAt;

        return $this;
    }

    /**
     * Gets priceLimit
     *
     * @return float|null
     */
    public function getPriceLimit()
    {
        return $this->container['priceLimit'];
    }

    /**
     * Sets priceLimit
     *
     * @param float|null $priceLimit Set an optional price limit. if the order would exceed the limit a error will be thrown. Set the limit in the given currency.
     *
     * @return self
     */
    public function setPriceLimit($priceLimit)
    {
        if (is_null($priceLimit)) {
            throw new \InvalidArgumentException('non-nullable priceLimit cannot be null');
        }

        if (($priceLimit < 0.5)) {
            throw new \InvalidArgumentException('invalid value for $priceLimit when calling OrderByCalculationRequest., must be bigger than or equal to 0.5.');
        }

        $this->container['priceLimit'] = $priceLimit;

        return $this;
    }

    /**
     * Gets metadata
     *
     * @return array<string,string>|null
     */
    public function getMetadata()
    {
        return $this->container['metadata'];
    }

    /**
     * Sets metadata
     *
     * @param array<string,string>|null $metadata Add additional queryable information to the order as key-value pairs
     *
     * @return self
     */
    public function setMetadata($metadata)
    {
        if (is_null($metadata)) {
            throw new \InvalidArgumentException('non-nullable metadata cannot be null');
        }
        $this->container['metadata'] = $metadata;

        return $this;
    }

    /**
     * Gets fractionalDigits
     *
     * @return int|null
     */
    public function getFractionalDigits()
    {
        return $this->container['fractionalDigits'];
    }

    /**
     * Sets fractionalDigits
     *
     * @param int|null $fractionalDigits Normally, the calculation results are rounded to the nearest whole number. Specify here how many decimal places you would like to receive in addition. This only applies to calculation results, compensations are always made in whole kilograms
     *
     * @return self
     */
    public function setFractionalDigits($fractionalDigits)
    {
        if (is_null($fractionalDigits)) {
            throw new \InvalidArgumentException('non-nullable fractionalDigits cannot be null');
        }

        if (($fractionalDigits < 0)) {
            throw new \InvalidArgumentException('invalid value for $fractionalDigits when calling OrderByCalculationRequest., must be bigger than or equal to 0.');
        }

        $this->container['fractionalDigits'] = $fractionalDigits;

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


