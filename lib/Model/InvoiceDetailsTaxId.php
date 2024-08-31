<?php
/**
 * InvoiceDetailsTaxId
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
 * InvoiceDetailsTaxId Class Doc Comment
 *
 * @category Class
 * @description The customer’s tax ID.
 * @package  KlimAPI
 * @author   KlimAPI Team
 * @link     https://klimapi.com
 * @implements \ArrayAccess<string, mixed>
 */
class InvoiceDetailsTaxId implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model. bla
      *
      * @var string
      */
    protected static $openAPIModelName = 'InvoiceDetails_tax_id';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'type' => 'string',
        'value' => 'string'
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
        'value' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'type' => false,
        'value' => false
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
        'value' => 'value'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'type' => 'setType',
        'value' => 'setValue'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'type' => 'getType',
        'value' => 'getValue'
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

    public const TYPE_EU_VAT = 'eu_vat';
    public const TYPE_GB_VAT = 'gb_vat';
    public const TYPE_US_EIN = 'us_ein';
    public const TYPE_AD_NRT = 'ad_nrt';
    public const TYPE_AE_TRN = 'ae_trn';
    public const TYPE_AR_CUIT = 'ar_cuit';
    public const TYPE_AU_ABN = 'au_abn';
    public const TYPE_AU_ARN = 'au_arn';
    public const TYPE_BG_UIC = 'bg_uic';
    public const TYPE_BH_VAT = 'bh_vat';
    public const TYPE_BO_TIN = 'bo_tin';
    public const TYPE_BR_CNPJ = 'br_cnpj';
    public const TYPE_BR_CPF = 'br_cpf';
    public const TYPE_CA_BN = 'ca_bn';
    public const TYPE_CA_GST_HST = 'ca_gst_hst';
    public const TYPE_CA_PST_BC = 'ca_pst_bc';
    public const TYPE_CA_PST_MB = 'ca_pst_mb';
    public const TYPE_CA_PST_SK = 'ca_pst_sk';
    public const TYPE_CA_QST = 'ca_qst';
    public const TYPE_CH_UID = 'ch_uid';
    public const TYPE_CH_VAT = 'ch_vat';
    public const TYPE_CL_TIN = 'cl_tin';
    public const TYPE_CO_NIT = 'co_nit';
    public const TYPE_CR_TIN = 'cr_tin';
    public const TYPE_DE_STN = 'de_stn';
    public const TYPE_DO_RCN = 'do_rcn';
    public const TYPE_EC_RUC = 'ec_ruc';
    public const TYPE_EG_TIN = 'eg_tin';
    public const TYPE_ES_CIF = 'es_cif';
    public const TYPE_EU_OSS_VAT = 'eu_oss_vat';
    public const TYPE_GE_VAT = 'ge_vat';
    public const TYPE_HU_TIN = 'hu_tin';
    public const TYPE_ID_NPWP = 'id_npwp';
    public const TYPE_IL_VAT = 'il_vat';
    public const TYPE_IN_GST = 'in_gst';
    public const TYPE_IS_VAT = 'is_vat';
    public const TYPE_JP_CN = 'jp_cn';
    public const TYPE_JP_RN = 'jp_rn';
    public const TYPE_JP_TRN = 'jp_trn';
    public const TYPE_KE_PIN = 'ke_pin';
    public const TYPE_KR_BRN = 'kr_brn';
    public const TYPE_KZ_BIN = 'kz_bin';
    public const TYPE_LI_UID = 'li_uid';
    public const TYPE_MX_RFC = 'mx_rfc';
    public const TYPE_MY_FRP = 'my_frp';
    public const TYPE_MY_ITN = 'my_itn';
    public const TYPE_MY_SST = 'my_sst';
    public const TYPE_NG_TIN = 'ng_tin';
    public const TYPE_NO_VAT = 'no_vat';
    public const TYPE_NO_VOEC = 'no_voec';
    public const TYPE_NZ_GST = 'nz_gst';
    public const TYPE_OM_VAT = 'om_vat';
    public const TYPE_PE_RUC = 'pe_ruc';
    public const TYPE_PH_TIN = 'ph_tin';
    public const TYPE_RO_TIN = 'ro_tin';
    public const TYPE_RS_PIB = 'rs_pib';
    public const TYPE_RU_KPP = 'ru_kpp';
    public const TYPE_SA_VAT = 'sa_vat';
    public const TYPE_SG_GST = 'sg_gst';
    public const TYPE_SG_UEN = 'sg_uen';
    public const TYPE_SI_TIN = 'si_tin';
    public const TYPE_SV_NIT = 'sv_nit';
    public const TYPE_TH_VAT = 'th_vat';
    public const TYPE_TR_TIN = 'tr_tin';
    public const TYPE_TW_VAT = 'tw_vat';
    public const TYPE_UA_VAT = 'ua_vat';
    public const TYPE_UY_RUC = 'uy_ruc';
    public const TYPE_VE_RIF = 've_rif';
    public const TYPE_VN_TIN = 'vn_tin';
    public const TYPE_ZA_VAT = 'za_vat';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getTypeAllowableValues()
    {
        return [
            self::TYPE_EU_VAT,
            self::TYPE_GB_VAT,
            self::TYPE_US_EIN,
            self::TYPE_AD_NRT,
            self::TYPE_AE_TRN,
            self::TYPE_AR_CUIT,
            self::TYPE_AU_ABN,
            self::TYPE_AU_ARN,
            self::TYPE_BG_UIC,
            self::TYPE_BH_VAT,
            self::TYPE_BO_TIN,
            self::TYPE_BR_CNPJ,
            self::TYPE_BR_CPF,
            self::TYPE_CA_BN,
            self::TYPE_CA_GST_HST,
            self::TYPE_CA_PST_BC,
            self::TYPE_CA_PST_MB,
            self::TYPE_CA_PST_SK,
            self::TYPE_CA_QST,
            self::TYPE_CH_UID,
            self::TYPE_CH_VAT,
            self::TYPE_CL_TIN,
            self::TYPE_CO_NIT,
            self::TYPE_CR_TIN,
            self::TYPE_DE_STN,
            self::TYPE_DO_RCN,
            self::TYPE_EC_RUC,
            self::TYPE_EG_TIN,
            self::TYPE_ES_CIF,
            self::TYPE_EU_OSS_VAT,
            self::TYPE_GE_VAT,
            self::TYPE_HU_TIN,
            self::TYPE_ID_NPWP,
            self::TYPE_IL_VAT,
            self::TYPE_IN_GST,
            self::TYPE_IS_VAT,
            self::TYPE_JP_CN,
            self::TYPE_JP_RN,
            self::TYPE_JP_TRN,
            self::TYPE_KE_PIN,
            self::TYPE_KR_BRN,
            self::TYPE_KZ_BIN,
            self::TYPE_LI_UID,
            self::TYPE_MX_RFC,
            self::TYPE_MY_FRP,
            self::TYPE_MY_ITN,
            self::TYPE_MY_SST,
            self::TYPE_NG_TIN,
            self::TYPE_NO_VAT,
            self::TYPE_NO_VOEC,
            self::TYPE_NZ_GST,
            self::TYPE_OM_VAT,
            self::TYPE_PE_RUC,
            self::TYPE_PH_TIN,
            self::TYPE_RO_TIN,
            self::TYPE_RS_PIB,
            self::TYPE_RU_KPP,
            self::TYPE_SA_VAT,
            self::TYPE_SG_GST,
            self::TYPE_SG_UEN,
            self::TYPE_SI_TIN,
            self::TYPE_SV_NIT,
            self::TYPE_TH_VAT,
            self::TYPE_TR_TIN,
            self::TYPE_TW_VAT,
            self::TYPE_UA_VAT,
            self::TYPE_UY_RUC,
            self::TYPE_VE_RIF,
            self::TYPE_VN_TIN,
            self::TYPE_ZA_VAT,
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
        $this->setIfExists('value', $data ?? [], null);
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

        if ($this->container['value'] === null) {
            $invalidProperties[] = "'value' can't be null";
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
     * @param string $type Type of the tax ID
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
     * Gets value
     *
     * @return string
     */
    public function getValue()
    {
        return $this->container['value'];
    }

    /**
     * Sets value
     *
     * @param string $value Value of the tax ID
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


