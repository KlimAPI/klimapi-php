<?php
/**
 * LinkByCarbonRequest
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
 * LinkByCarbonRequest Class Doc Comment
 *
 * @category Class
 * @package  KlimAPI
 * @author   KlimAPI Team
 * @link     https://klimapi.com
 * @implements \ArrayAccess<string, mixed>
 */
class LinkByCarbonRequest implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model. bla
      *
      * @var string
      */
    protected static $openAPIModelName = 'linkByCarbon_request';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'kgCO2e' => 'int',
        'changeAllowed' => 'bool',
        'successUrl' => 'string',
        'cancelUrl' => 'string',
        'orderCount' => 'int',
        'metadata' => 'array[]'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'kgCO2e' => null,
        'changeAllowed' => null,
        'successUrl' => null,
        'cancelUrl' => null,
        'orderCount' => null,
        'metadata' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'kgCO2e' => false,
        'changeAllowed' => false,
        'successUrl' => false,
        'cancelUrl' => false,
        'orderCount' => false,
        'metadata' => false
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
        'kgCO2e' => 'kgCO2e',
        'changeAllowed' => 'change_allowed',
        'successUrl' => 'success_url',
        'cancelUrl' => 'cancel_url',
        'orderCount' => 'order_count',
        'metadata' => 'metadata'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'kgCO2e' => 'setKgCO2e',
        'changeAllowed' => 'setChangeAllowed',
        'successUrl' => 'setSuccessUrl',
        'cancelUrl' => 'setCancelUrl',
        'orderCount' => 'setOrderCount',
        'metadata' => 'setMetadata'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'kgCO2e' => 'getKgCO2e',
        'changeAllowed' => 'getChangeAllowed',
        'successUrl' => 'getSuccessUrl',
        'cancelUrl' => 'getCancelUrl',
        'orderCount' => 'getOrderCount',
        'metadata' => 'getMetadata'
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
        $this->setIfExists('kgCO2e', $data ?? [], null);
        $this->setIfExists('changeAllowed', $data ?? [], false);
        $this->setIfExists('successUrl', $data ?? [], null);
        $this->setIfExists('cancelUrl', $data ?? [], null);
        $this->setIfExists('orderCount', $data ?? [], 1);
        $this->setIfExists('metadata', $data ?? [], null);
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

        if ($this->container['kgCO2e'] === null) {
            $invalidProperties[] = "'kgCO2e' can't be null";
        }
        if ($this->container['successUrl'] === null) {
            $invalidProperties[] = "'successUrl' can't be null";
        }
        if ($this->container['cancelUrl'] === null) {
            $invalidProperties[] = "'cancelUrl' can't be null";
        }
        if (!is_null($this->container['orderCount']) && ($this->container['orderCount'] > 3)) {
            $invalidProperties[] = "invalid value for 'orderCount', must be smaller than or equal to 3.";
        }

        if (!is_null($this->container['orderCount']) && ($this->container['orderCount'] < 1)) {
            $invalidProperties[] = "invalid value for 'orderCount', must be bigger than or equal to 1.";
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
     * Gets kgCO2e
     *
     * @return int
     */
    public function getKgCO2e()
    {
        return $this->container['kgCO2e'];
    }

    /**
     * Sets kgCO2e
     *
     * @param int $kgCO2e The amount of kg CO<sub>2</sub>e the compensation should provide
     *
     * @return self
     */
    public function setKgCO2e($kgCO2e)
    {
        if (is_null($kgCO2e)) {
            throw new \InvalidArgumentException('non-nullable kgCO2e cannot be null');
        }
        $this->container['kgCO2e'] = $kgCO2e;

        return $this;
    }

    /**
     * Gets changeAllowed
     *
     * @return bool|null
     */
    public function getChangeAllowed()
    {
        return $this->container['changeAllowed'];
    }

    /**
     * Sets changeAllowed
     *
     * @param bool|null $changeAllowed Choose if the customer should be allowed to change the amount.
     *
     * @return self
     */
    public function setChangeAllowed($changeAllowed)
    {
        if (is_null($changeAllowed)) {
            throw new \InvalidArgumentException('non-nullable changeAllowed cannot be null');
        }
        $this->container['changeAllowed'] = $changeAllowed;

        return $this;
    }

    /**
     * Gets successUrl
     *
     * @return string
     */
    public function getSuccessUrl()
    {
        return $this->container['successUrl'];
    }

    /**
     * Sets successUrl
     *
     * @param string $successUrl The URL the customer is redirected to after the successful compensation.
     *
     * @return self
     */
    public function setSuccessUrl($successUrl)
    {
        if (is_null($successUrl)) {
            throw new \InvalidArgumentException('non-nullable successUrl cannot be null');
        }
        $this->container['successUrl'] = $successUrl;

        return $this;
    }

    /**
     * Gets cancelUrl
     *
     * @return string
     */
    public function getCancelUrl()
    {
        return $this->container['cancelUrl'];
    }

    /**
     * Sets cancelUrl
     *
     * @param string $cancelUrl The URL the customer is redirected to after a failed or aborted compensation.
     *
     * @return self
     */
    public function setCancelUrl($cancelUrl)
    {
        if (is_null($cancelUrl)) {
            throw new \InvalidArgumentException('non-nullable cancelUrl cannot be null');
        }
        $this->container['cancelUrl'] = $cancelUrl;

        return $this;
    }

    /**
     * Gets orderCount
     *
     * @return int|null
     */
    public function getOrderCount()
    {
        return $this->container['orderCount'];
    }

    /**
     * Sets orderCount
     *
     * @param int|null $orderCount The amount of pending Orders you want to receive. This is especially useful if you want to offer your customers several different projects for their compensation.
     *
     * @return self
     */
    public function setOrderCount($orderCount)
    {
        if (is_null($orderCount)) {
            throw new \InvalidArgumentException('non-nullable orderCount cannot be null');
        }

        if (($orderCount > 3)) {
            throw new \InvalidArgumentException('invalid value for $orderCount when calling LinkByCarbonRequest., must be smaller than or equal to 3.');
        }
        if (($orderCount < 1)) {
            throw new \InvalidArgumentException('invalid value for $orderCount when calling LinkByCarbonRequest., must be bigger than or equal to 1.');
        }

        $this->container['orderCount'] = $orderCount;

        return $this;
    }

    /**
     * Gets metadata
     *
     * @return array[]|null
     */
    public function getMetadata()
    {
        return $this->container['metadata'];
    }

    /**
     * Sets metadata
     *
     * @param array[]|null $metadata Add additional queryable information to the order as key-value pairs
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


