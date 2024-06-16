<?php
/**
 * CheckoutLinkCalculated
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
 * CheckoutLinkCalculated Class Doc Comment
 *
 * @category Class
 * @package  KlimAPI
 * @author   KlimAPI Team
 * @link     https://klimapi.com
 * @implements \ArrayAccess<string, mixed>
 */
class CheckoutLinkCalculated implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model. bla
      *
      * @var string
      */
    protected static $openAPIModelName = 'CheckoutLinkCalculated';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'paymentLink' => 'string',
        'paymentLinkId' => 'string',
        'certificateIssuedAt' => '\DateTime',
        'certificateUrl' => 'string',
        'certificatePdf' => 'string',
        'orderId' => 'string',
        'kgCO2e' => 'int',
        'price' => 'float',
        'currency' => 'string',
        'paymentReceived' => 'string',
        'project' => '\KlimAPI\Model\Project',
        'results' => '\KlimAPI\Model\CalculationResult[]'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'paymentLink' => null,
        'paymentLinkId' => null,
        'certificateIssuedAt' => 'date-time',
        'certificateUrl' => null,
        'certificatePdf' => null,
        'orderId' => null,
        'kgCO2e' => null,
        'price' => null,
        'currency' => null,
        'paymentReceived' => null,
        'project' => null,
        'results' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'paymentLink' => false,
        'paymentLinkId' => false,
        'certificateIssuedAt' => false,
        'certificateUrl' => false,
        'certificatePdf' => false,
        'orderId' => false,
        'kgCO2e' => false,
        'price' => false,
        'currency' => false,
        'paymentReceived' => false,
        'project' => false,
        'results' => false
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
        'paymentLink' => 'payment_link',
        'paymentLinkId' => 'payment_link_id',
        'certificateIssuedAt' => 'certificate_issued_at',
        'certificateUrl' => 'certificate_url',
        'certificatePdf' => 'certificate_pdf',
        'orderId' => 'order_id',
        'kgCO2e' => 'kgCO2e',
        'price' => 'price',
        'currency' => 'currency',
        'paymentReceived' => 'payment_received',
        'project' => 'project',
        'results' => 'results'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'paymentLink' => 'setPaymentLink',
        'paymentLinkId' => 'setPaymentLinkId',
        'certificateIssuedAt' => 'setCertificateIssuedAt',
        'certificateUrl' => 'setCertificateUrl',
        'certificatePdf' => 'setCertificatePdf',
        'orderId' => 'setOrderId',
        'kgCO2e' => 'setKgCO2e',
        'price' => 'setPrice',
        'currency' => 'setCurrency',
        'paymentReceived' => 'setPaymentReceived',
        'project' => 'setProject',
        'results' => 'setResults'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'paymentLink' => 'getPaymentLink',
        'paymentLinkId' => 'getPaymentLinkId',
        'certificateIssuedAt' => 'getCertificateIssuedAt',
        'certificateUrl' => 'getCertificateUrl',
        'certificatePdf' => 'getCertificatePdf',
        'orderId' => 'getOrderId',
        'kgCO2e' => 'getKgCO2e',
        'price' => 'getPrice',
        'currency' => 'getCurrency',
        'paymentReceived' => 'getPaymentReceived',
        'project' => 'getProject',
        'results' => 'getResults'
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

    public const CURRENCY_EUR = 'EUR';
    public const CURRENCY_USD = 'USD';
    public const CURRENCY_GBP = 'GBP';
    public const CURRENCY_CHF = 'CHF';
    public const CURRENCY_CAD = 'CAD';
    public const CURRENCY_NOK = 'NOK';
    public const CURRENCY_SEK = 'SEK';
    public const CURRENCY_DKK = 'DKK';
    public const CURRENCY_INR = 'INR';
    public const CURRENCY_ALL = 'ALL';
    public const CURRENCY_AMD = 'AMD';
    public const CURRENCY_ANG = 'ANG';
    public const CURRENCY_AOA = 'AOA';
    public const CURRENCY_ARS = 'ARS';
    public const CURRENCY_AUD = 'AUD';
    public const CURRENCY_AWG = 'AWG';
    public const CURRENCY_AZN = 'AZN';
    public const CURRENCY_BAM = 'BAM';
    public const CURRENCY_BBD = 'BBD';
    public const CURRENCY_BDT = 'BDT';
    public const CURRENCY_BGN = 'BGN';
    public const CURRENCY_BMD = 'BMD';
    public const CURRENCY_BND = 'BND';
    public const CURRENCY_BOB = 'BOB';
    public const CURRENCY_BRL = 'BRL';
    public const CURRENCY_BSD = 'BSD';
    public const CURRENCY_BWP = 'BWP';
    public const CURRENCY_BZD = 'BZD';
    public const CURRENCY_COP = 'COP';
    public const CURRENCY_CRC = 'CRC';
    public const CURRENCY_CVE = 'CVE';
    public const CURRENCY_CZK = 'CZK';
    public const CURRENCY_DOP = 'DOP';
    public const CURRENCY_DZD = 'DZD';
    public const CURRENCY_EGP = 'EGP';
    public const CURRENCY_ETB = 'ETB';
    public const CURRENCY_FJD = 'FJD';
    public const CURRENCY_FKP = 'FKP';
    public const CURRENCY_GEL = 'GEL';
    public const CURRENCY_GIP = 'GIP';
    public const CURRENCY_GMD = 'GMD';
    public const CURRENCY_GTQ = 'GTQ';
    public const CURRENCY_GYD = 'GYD';
    public const CURRENCY_HKD = 'HKD';
    public const CURRENCY_HNL = 'HNL';
    public const CURRENCY_HTG = 'HTG';
    public const CURRENCY_HUF = 'HUF';
    public const CURRENCY_IDR = 'IDR';
    public const CURRENCY_ILS = 'ILS';
    public const CURRENCY_ISK = 'ISK';
    public const CURRENCY_JMD = 'JMD';
    public const CURRENCY_KES = 'KES';
    public const CURRENCY_KGS = 'KGS';
    public const CURRENCY_KHR = 'KHR';
    public const CURRENCY_KYD = 'KYD';
    public const CURRENCY_KZT = 'KZT';
    public const CURRENCY_LAK = 'LAK';
    public const CURRENCY_LBP = 'LBP';
    public const CURRENCY_LKR = 'LKR';
    public const CURRENCY_LRD = 'LRD';
    public const CURRENCY_LSL = 'LSL';
    public const CURRENCY_MAD = 'MAD';
    public const CURRENCY_MDL = 'MDL';
    public const CURRENCY_MKD = 'MKD';
    public const CURRENCY_MMK = 'MMK';
    public const CURRENCY_MNT = 'MNT';
    public const CURRENCY_MOP = 'MOP';
    public const CURRENCY_MUR = 'MUR';
    public const CURRENCY_MVR = 'MVR';
    public const CURRENCY_MWK = 'MWK';
    public const CURRENCY_MXN = 'MXN';
    public const CURRENCY_MYR = 'MYR';
    public const CURRENCY_MZN = 'MZN';
    public const CURRENCY_NAD = 'NAD';
    public const CURRENCY_NGN = 'NGN';
    public const CURRENCY_NIO = 'NIO';
    public const CURRENCY_NPR = 'NPR';
    public const CURRENCY_NZD = 'NZD';
    public const CURRENCY_PAB = 'PAB';
    public const CURRENCY_PEN = 'PEN';
    public const CURRENCY_PGK = 'PGK';
    public const CURRENCY_PHP = 'PHP';
    public const CURRENCY_PKR = 'PKR';
    public const CURRENCY_PLN = 'PLN';
    public const CURRENCY_QAR = 'QAR';
    public const CURRENCY_RON = 'RON';
    public const CURRENCY_RSD = 'RSD';
    public const CURRENCY_SBD = 'SBD';
    public const CURRENCY_SCR = 'SCR';
    public const CURRENCY_SGD = 'SGD';
    public const CURRENCY_SHP = 'SHP';
    public const CURRENCY_SLE = 'SLE';
    public const CURRENCY_SOS = 'SOS';
    public const CURRENCY_SRD = 'SRD';
    public const CURRENCY_STD = 'STD';
    public const CURRENCY_SZL = 'SZL';
    public const CURRENCY_THB = 'THB';
    public const CURRENCY_TJS = 'TJS';
    public const CURRENCY_TOP = 'TOP';
    public const CURRENCY__TRY = 'TRY';
    public const CURRENCY_TTD = 'TTD';
    public const CURRENCY_TWD = 'TWD';
    public const CURRENCY_TZS = 'TZS';
    public const CURRENCY_UAH = 'UAH';
    public const CURRENCY_UYU = 'UYU';
    public const CURRENCY_UZS = 'UZS';
    public const CURRENCY_WST = 'WST';
    public const CURRENCY_XCD = 'XCD';
    public const CURRENCY_YER = 'YER';
    public const CURRENCY_ZAR = 'ZAR';
    public const CURRENCY_ZMW = 'ZMW';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getCurrencyAllowableValues()
    {
        return [
            self::CURRENCY_EUR,
            self::CURRENCY_USD,
            self::CURRENCY_GBP,
            self::CURRENCY_CHF,
            self::CURRENCY_CAD,
            self::CURRENCY_NOK,
            self::CURRENCY_SEK,
            self::CURRENCY_DKK,
            self::CURRENCY_INR,
            self::CURRENCY_ALL,
            self::CURRENCY_AMD,
            self::CURRENCY_ANG,
            self::CURRENCY_AOA,
            self::CURRENCY_ARS,
            self::CURRENCY_AUD,
            self::CURRENCY_AWG,
            self::CURRENCY_AZN,
            self::CURRENCY_BAM,
            self::CURRENCY_BBD,
            self::CURRENCY_BDT,
            self::CURRENCY_BGN,
            self::CURRENCY_BMD,
            self::CURRENCY_BND,
            self::CURRENCY_BOB,
            self::CURRENCY_BRL,
            self::CURRENCY_BSD,
            self::CURRENCY_BWP,
            self::CURRENCY_BZD,
            self::CURRENCY_COP,
            self::CURRENCY_CRC,
            self::CURRENCY_CVE,
            self::CURRENCY_CZK,
            self::CURRENCY_DOP,
            self::CURRENCY_DZD,
            self::CURRENCY_EGP,
            self::CURRENCY_ETB,
            self::CURRENCY_FJD,
            self::CURRENCY_FKP,
            self::CURRENCY_GEL,
            self::CURRENCY_GIP,
            self::CURRENCY_GMD,
            self::CURRENCY_GTQ,
            self::CURRENCY_GYD,
            self::CURRENCY_HKD,
            self::CURRENCY_HNL,
            self::CURRENCY_HTG,
            self::CURRENCY_HUF,
            self::CURRENCY_IDR,
            self::CURRENCY_ILS,
            self::CURRENCY_ISK,
            self::CURRENCY_JMD,
            self::CURRENCY_KES,
            self::CURRENCY_KGS,
            self::CURRENCY_KHR,
            self::CURRENCY_KYD,
            self::CURRENCY_KZT,
            self::CURRENCY_LAK,
            self::CURRENCY_LBP,
            self::CURRENCY_LKR,
            self::CURRENCY_LRD,
            self::CURRENCY_LSL,
            self::CURRENCY_MAD,
            self::CURRENCY_MDL,
            self::CURRENCY_MKD,
            self::CURRENCY_MMK,
            self::CURRENCY_MNT,
            self::CURRENCY_MOP,
            self::CURRENCY_MUR,
            self::CURRENCY_MVR,
            self::CURRENCY_MWK,
            self::CURRENCY_MXN,
            self::CURRENCY_MYR,
            self::CURRENCY_MZN,
            self::CURRENCY_NAD,
            self::CURRENCY_NGN,
            self::CURRENCY_NIO,
            self::CURRENCY_NPR,
            self::CURRENCY_NZD,
            self::CURRENCY_PAB,
            self::CURRENCY_PEN,
            self::CURRENCY_PGK,
            self::CURRENCY_PHP,
            self::CURRENCY_PKR,
            self::CURRENCY_PLN,
            self::CURRENCY_QAR,
            self::CURRENCY_RON,
            self::CURRENCY_RSD,
            self::CURRENCY_SBD,
            self::CURRENCY_SCR,
            self::CURRENCY_SGD,
            self::CURRENCY_SHP,
            self::CURRENCY_SLE,
            self::CURRENCY_SOS,
            self::CURRENCY_SRD,
            self::CURRENCY_STD,
            self::CURRENCY_SZL,
            self::CURRENCY_THB,
            self::CURRENCY_TJS,
            self::CURRENCY_TOP,
            self::CURRENCY__TRY,
            self::CURRENCY_TTD,
            self::CURRENCY_TWD,
            self::CURRENCY_TZS,
            self::CURRENCY_UAH,
            self::CURRENCY_UYU,
            self::CURRENCY_UZS,
            self::CURRENCY_WST,
            self::CURRENCY_XCD,
            self::CURRENCY_YER,
            self::CURRENCY_ZAR,
            self::CURRENCY_ZMW,
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
        $this->setIfExists('paymentLink', $data ?? [], null);
        $this->setIfExists('paymentLinkId', $data ?? [], null);
        $this->setIfExists('certificateIssuedAt', $data ?? [], null);
        $this->setIfExists('certificateUrl', $data ?? [], null);
        $this->setIfExists('certificatePdf', $data ?? [], null);
        $this->setIfExists('orderId', $data ?? [], null);
        $this->setIfExists('kgCO2e', $data ?? [], null);
        $this->setIfExists('price', $data ?? [], null);
        $this->setIfExists('currency', $data ?? [], null);
        $this->setIfExists('paymentReceived', $data ?? [], null);
        $this->setIfExists('project', $data ?? [], null);
        $this->setIfExists('results', $data ?? [], null);
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

        $allowedValues = $this->getCurrencyAllowableValues();
        if (!is_null($this->container['currency']) && !in_array($this->container['currency'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'currency', must be one of '%s'",
                $this->container['currency'],
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
     * Gets paymentLink
     *
     * @return string|null
     */
    public function getPaymentLink()
    {
        return $this->container['paymentLink'];
    }

    /**
     * Sets paymentLink
     *
     * @param string|null $paymentLink The checkout link you can transfer to the customer.
     *
     * @return self
     */
    public function setPaymentLink($paymentLink)
    {
        if (is_null($paymentLink)) {
            throw new \InvalidArgumentException('non-nullable paymentLink cannot be null');
        }
        $this->container['paymentLink'] = $paymentLink;

        return $this;
    }

    /**
     * Gets paymentLinkId
     *
     * @return string|null
     */
    public function getPaymentLinkId()
    {
        return $this->container['paymentLinkId'];
    }

    /**
     * Sets paymentLinkId
     *
     * @param string|null $paymentLinkId The checkout link id, used to make further calls to the API.
     *
     * @return self
     */
    public function setPaymentLinkId($paymentLinkId)
    {
        if (is_null($paymentLinkId)) {
            throw new \InvalidArgumentException('non-nullable paymentLinkId cannot be null');
        }
        $this->container['paymentLinkId'] = $paymentLinkId;

        return $this;
    }

    /**
     * Gets certificateIssuedAt
     *
     * @return \DateTime|null
     */
    public function getCertificateIssuedAt()
    {
        return $this->container['certificateIssuedAt'];
    }

    /**
     * Sets certificateIssuedAt
     *
     * @param \DateTime|null $certificateIssuedAt When payment_received is true, timestamp of when the certificate was issued in ISO 8601 format (UTC)
     *
     * @return self
     */
    public function setCertificateIssuedAt($certificateIssuedAt)
    {
        if (is_null($certificateIssuedAt)) {
            throw new \InvalidArgumentException('non-nullable certificateIssuedAt cannot be null');
        }
        $this->container['certificateIssuedAt'] = $certificateIssuedAt;

        return $this;
    }

    /**
     * Gets certificateUrl
     *
     * @return string|null
     */
    public function getCertificateUrl()
    {
        return $this->container['certificateUrl'];
    }

    /**
     * Sets certificateUrl
     *
     * @param string|null $certificateUrl When payment_received is true, the url to the certificate will be given.
     *
     * @return self
     */
    public function setCertificateUrl($certificateUrl)
    {
        if (is_null($certificateUrl)) {
            throw new \InvalidArgumentException('non-nullable certificateUrl cannot be null');
        }
        $this->container['certificateUrl'] = $certificateUrl;

        return $this;
    }

    /**
     * Gets certificatePdf
     *
     * @return string|null
     */
    public function getCertificatePdf()
    {
        return $this->container['certificatePdf'];
    }

    /**
     * Sets certificatePdf
     *
     * @param string|null $certificatePdf When payment_received is true, the url to the certificate pdf will be given.
     *
     * @return self
     */
    public function setCertificatePdf($certificatePdf)
    {
        if (is_null($certificatePdf)) {
            throw new \InvalidArgumentException('non-nullable certificatePdf cannot be null');
        }
        $this->container['certificatePdf'] = $certificatePdf;

        return $this;
    }

    /**
     * Gets orderId
     *
     * @return string|null
     */
    public function getOrderId()
    {
        return $this->container['orderId'];
    }

    /**
     * Sets orderId
     *
     * @param string|null $orderId The id of the order created for the checkout link.
     *
     * @return self
     */
    public function setOrderId($orderId)
    {
        if (is_null($orderId)) {
            throw new \InvalidArgumentException('non-nullable orderId cannot be null');
        }
        $this->container['orderId'] = $orderId;

        return $this;
    }

    /**
     * Gets kgCO2e
     *
     * @return int|null
     */
    public function getKgCO2e()
    {
        return $this->container['kgCO2e'];
    }

    /**
     * Sets kgCO2e
     *
     * @param int|null $kgCO2e The amount of kg CO<sub>2</sub>e.
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
     * Gets price
     *
     * @return float|null
     */
    public function getPrice()
    {
        return $this->container['price'];
    }

    /**
     * Sets price
     *
     * @param float|null $price The total of the compensation in your given currency **incl. VAT**.
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
     * Gets currency
     *
     * @return string|null
     */
    public function getCurrency()
    {
        return $this->container['currency'];
    }

    /**
     * Sets currency
     *
     * @param string|null $currency currency
     *
     * @return self
     */
    public function setCurrency($currency)
    {
        if (is_null($currency)) {
            throw new \InvalidArgumentException('non-nullable currency cannot be null');
        }
        $allowedValues = $this->getCurrencyAllowableValues();
        if (!in_array($currency, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'currency', must be one of '%s'",
                    $currency,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['currency'] = $currency;

        return $this;
    }

    /**
     * Gets paymentReceived
     *
     * @return string|null
     */
    public function getPaymentReceived()
    {
        return $this->container['paymentReceived'];
    }

    /**
     * Sets paymentReceived
     *
     * @param string|null $paymentReceived This indicates if the order via the checkout link is already fulfilled or not.
     *
     * @return self
     */
    public function setPaymentReceived($paymentReceived)
    {
        if (is_null($paymentReceived)) {
            throw new \InvalidArgumentException('non-nullable paymentReceived cannot be null');
        }
        $this->container['paymentReceived'] = $paymentReceived;

        return $this;
    }

    /**
     * Gets project
     *
     * @return \KlimAPI\Model\Project|null
     */
    public function getProject()
    {
        return $this->container['project'];
    }

    /**
     * Sets project
     *
     * @param \KlimAPI\Model\Project|null $project project
     *
     * @return self
     */
    public function setProject($project)
    {
        if (is_null($project)) {
            throw new \InvalidArgumentException('non-nullable project cannot be null');
        }
        $this->container['project'] = $project;

        return $this;
    }

    /**
     * Gets results
     *
     * @return \KlimAPI\Model\CalculationResult[]|null
     */
    public function getResults()
    {
        return $this->container['results'];
    }

    /**
     * Sets results
     *
     * @param \KlimAPI\Model\CalculationResult[]|null $results An array of the calculation results
     *
     * @return self
     */
    public function setResults($results)
    {
        if (is_null($results)) {
            throw new \InvalidArgumentException('non-nullable results cannot be null');
        }
        $this->container['results'] = $results;

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


