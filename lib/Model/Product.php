<?php
/**
 * Product
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
 * Product Class Doc Comment
 *
 * @category Class
 * @description A specific product element
 * @package  KlimAPI
 * @author   KlimAPI Team
 * @link     https://klimapi.com
 * @implements \ArrayAccess<string, mixed>
 */
class Product implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model. bla
      *
      * @var string
      */
    protected static $openAPIModelName = 'Product';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'productId' => 'string',
        'name' => 'string',
        'description' => 'string',
        'price' => 'float',
        'categories' => 'string[]',
        'tags' => 'string[]',
        'weight' => 'float',
        'weightUnit' => 'string',
        'madeIn' => 'string',
        'emissionFactor' => 'string',
        'emissionMultiplicator' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'productId' => null,
        'name' => null,
        'description' => null,
        'price' => null,
        'categories' => null,
        'tags' => null,
        'weight' => null,
        'weightUnit' => null,
        'madeIn' => null,
        'emissionFactor' => null,
        'emissionMultiplicator' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'productId' => false,
        'name' => false,
        'description' => false,
        'price' => false,
        'categories' => false,
        'tags' => false,
        'weight' => false,
        'weightUnit' => false,
        'madeIn' => false,
        'emissionFactor' => false,
        'emissionMultiplicator' => false
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
        'productId' => 'product_id',
        'name' => 'name',
        'description' => 'description',
        'price' => 'price',
        'categories' => 'categories',
        'tags' => 'tags',
        'weight' => 'weight',
        'weightUnit' => 'weight_unit',
        'madeIn' => 'made_in',
        'emissionFactor' => 'emission_factor',
        'emissionMultiplicator' => 'emission_multiplicator'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'productId' => 'setProductId',
        'name' => 'setName',
        'description' => 'setDescription',
        'price' => 'setPrice',
        'categories' => 'setCategories',
        'tags' => 'setTags',
        'weight' => 'setWeight',
        'weightUnit' => 'setWeightUnit',
        'madeIn' => 'setMadeIn',
        'emissionFactor' => 'setEmissionFactor',
        'emissionMultiplicator' => 'setEmissionMultiplicator'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'productId' => 'getProductId',
        'name' => 'getName',
        'description' => 'getDescription',
        'price' => 'getPrice',
        'categories' => 'getCategories',
        'tags' => 'getTags',
        'weight' => 'getWeight',
        'weightUnit' => 'getWeightUnit',
        'madeIn' => 'getMadeIn',
        'emissionFactor' => 'getEmissionFactor',
        'emissionMultiplicator' => 'getEmissionMultiplicator'
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

    public const WEIGHT_UNIT_T = 't';
    public const WEIGHT_UNIT_KG = 'kg';
    public const WEIGHT_UNIT_G = 'g';
    public const WEIGHT_UNIT_LB = 'lb';
    public const WEIGHT_UNIT_LBS = 'lbs';
    public const WEIGHT_UNIT_OZ = 'oz';
    public const EMISSION_MULTIPLICATOR_PRICE = 'price';
    public const EMISSION_MULTIPLICATOR_AMOUNT = 'amount';
    public const EMISSION_MULTIPLICATOR_WEIGHT = 'weight';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getWeightUnitAllowableValues()
    {
        return [
            self::WEIGHT_UNIT_T,
            self::WEIGHT_UNIT_KG,
            self::WEIGHT_UNIT_G,
            self::WEIGHT_UNIT_LB,
            self::WEIGHT_UNIT_LBS,
            self::WEIGHT_UNIT_OZ,
        ];
    }

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getEmissionMultiplicatorAllowableValues()
    {
        return [
            self::EMISSION_MULTIPLICATOR_PRICE,
            self::EMISSION_MULTIPLICATOR_AMOUNT,
            self::EMISSION_MULTIPLICATOR_WEIGHT,
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
        $this->setIfExists('productId', $data ?? [], null);
        $this->setIfExists('name', $data ?? [], null);
        $this->setIfExists('description', $data ?? [], null);
        $this->setIfExists('price', $data ?? [], null);
        $this->setIfExists('categories', $data ?? [], null);
        $this->setIfExists('tags', $data ?? [], null);
        $this->setIfExists('weight', $data ?? [], null);
        $this->setIfExists('weightUnit', $data ?? [], 'kg');
        $this->setIfExists('madeIn', $data ?? [], null);
        $this->setIfExists('emissionFactor', $data ?? [], null);
        $this->setIfExists('emissionMultiplicator', $data ?? [], null);
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

        if ($this->container['productId'] === null) {
            $invalidProperties[] = "'productId' can't be null";
        }
        if ($this->container['price'] === null) {
            $invalidProperties[] = "'price' can't be null";
        }
        $allowedValues = $this->getWeightUnitAllowableValues();
        if (!is_null($this->container['weightUnit']) && !in_array($this->container['weightUnit'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'weightUnit', must be one of '%s'",
                $this->container['weightUnit'],
                implode("', '", $allowedValues)
            );
        }

        $allowedValues = $this->getEmissionMultiplicatorAllowableValues();
        if (!is_null($this->container['emissionMultiplicator']) && !in_array($this->container['emissionMultiplicator'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'emissionMultiplicator', must be one of '%s'",
                $this->container['emissionMultiplicator'],
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
     * Gets productId
     *
     * @return string
     */
    public function getProductId()
    {
        return $this->container['productId'];
    }

    /**
     * Sets productId
     *
     * @param string $productId A unique identifier for the product
     *
     * @return self
     */
    public function setProductId($productId)
    {
        if (is_null($productId)) {
            throw new \InvalidArgumentException('non-nullable productId cannot be null');
        }
        $this->container['productId'] = $productId;

        return $this;
    }

    /**
     * Gets name
     *
     * @return string|null
     */
    public function getName()
    {
        return $this->container['name'];
    }

    /**
     * Sets name
     *
     * @param string|null $name The name of the product
     *
     * @return self
     */
    public function setName($name)
    {
        if (is_null($name)) {
            throw new \InvalidArgumentException('non-nullable name cannot be null');
        }
        $this->container['name'] = $name;

        return $this;
    }

    /**
     * Gets description
     *
     * @return string|null
     */
    public function getDescription()
    {
        return $this->container['description'];
    }

    /**
     * Sets description
     *
     * @param string|null $description A description of the product
     *
     * @return self
     */
    public function setDescription($description)
    {
        if (is_null($description)) {
            throw new \InvalidArgumentException('non-nullable description cannot be null');
        }
        $this->container['description'] = $description;

        return $this;
    }

    /**
     * Gets price
     *
     * @return float
     */
    public function getPrice()
    {
        return $this->container['price'];
    }

    /**
     * Sets price
     *
     * @param float $price The price of the product
     *
     * @return self
     */
    public function setPrice($price)
    {
        if (is_null($price)) {
            throw new \InvalidArgumentException('non-nullable price cannot be null');
        }
        $this->container['price'] = $price;

        return $this;
    }

    /**
     * Gets categories
     *
     * @return string[]|null
     */
    public function getCategories()
    {
        return $this->container['categories'];
    }

    /**
     * Sets categories
     *
     * @param string[]|null $categories The categories of the product
     *
     * @return self
     */
    public function setCategories($categories)
    {
        if (is_null($categories)) {
            throw new \InvalidArgumentException('non-nullable categories cannot be null');
        }
        $this->container['categories'] = $categories;

        return $this;
    }

    /**
     * Gets tags
     *
     * @return string[]|null
     */
    public function getTags()
    {
        return $this->container['tags'];
    }

    /**
     * Sets tags
     *
     * @param string[]|null $tags The tags of the product
     *
     * @return self
     */
    public function setTags($tags)
    {
        if (is_null($tags)) {
            throw new \InvalidArgumentException('non-nullable tags cannot be null');
        }
        $this->container['tags'] = $tags;

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
     * @param float|null $weight The weight of the product
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
     * @param string|null $weightUnit The weight unit of the product
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
     * Gets madeIn
     *
     * @return string|null
     */
    public function getMadeIn()
    {
        return $this->container['madeIn'];
    }

    /**
     * Sets madeIn
     *
     * @param string|null $madeIn The country of origin of the product
     *
     * @return self
     */
    public function setMadeIn($madeIn)
    {
        if (is_null($madeIn)) {
            throw new \InvalidArgumentException('non-nullable madeIn cannot be null');
        }
        $this->container['madeIn'] = $madeIn;

        return $this;
    }

    /**
     * Gets emissionFactor
     *
     * @return string|null
     */
    public function getEmissionFactor()
    {
        return $this->container['emissionFactor'];
    }

    /**
     * Sets emissionFactor
     *
     * @param string|null $emissionFactor Already know the emissions of the given product? Then you can provide the emission factor here. Unit: **kg CO<sub>2</sub>e**
     *
     * @return self
     */
    public function setEmissionFactor($emissionFactor)
    {
        if (is_null($emissionFactor)) {
            throw new \InvalidArgumentException('non-nullable emissionFactor cannot be null');
        }
        $this->container['emissionFactor'] = $emissionFactor;

        return $this;
    }

    /**
     * Gets emissionMultiplicator
     *
     * @return string|null
     */
    public function getEmissionMultiplicator()
    {
        return $this->container['emissionMultiplicator'];
    }

    /**
     * Sets emissionMultiplicator
     *
     * @param string|null $emissionMultiplicator Include the multiplicator of the given factor.
     *
     * @return self
     */
    public function setEmissionMultiplicator($emissionMultiplicator)
    {
        if (is_null($emissionMultiplicator)) {
            throw new \InvalidArgumentException('non-nullable emissionMultiplicator cannot be null');
        }
        $allowedValues = $this->getEmissionMultiplicatorAllowableValues();
        if (!in_array($emissionMultiplicator, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'emissionMultiplicator', must be one of '%s'",
                    $emissionMultiplicator,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['emissionMultiplicator'] = $emissionMultiplicator;

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


