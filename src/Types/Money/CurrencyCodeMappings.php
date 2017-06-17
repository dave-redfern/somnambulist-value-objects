<?php
/*
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR
 * A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT
 * OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL,
 * SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT
 * LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE,
 * DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE
 * OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 * This software consists of voluntary contributions made by many individuals
 * and is licensed under the MIT license.
 */

namespace Somnambulist\ValueObjects\Types\Money;

/**
 * Class CurrencyCodeMappings
 *
 * Derived from: https://www.iban.com/currency-codes.html
 *
 * @package    Somnambulist\ValueObjects\Types\Money
 * @subpackage Somnambulist\ValueObjects\Types\Money\CurrencyCodeMappings
 */
class CurrencyCodeMappings
{

    /**
     * @param CurrencyCode $code
     *
     * @return string
     */
    public static function name(CurrencyCode $code)
    {
        return static::$mappings[$code->value()];
    }

    /**
     * @param CurrencyCode $code
     *
     * @return int
     */
    public static function precision(CurrencyCode $code)
    {
        if (array_key_exists($code->value(), static::$precision)) {
            return static::$precision[$code->value()];
        }

        return 2;
    }

    /**
     * @var array
     */
    private static $mappings = [
        CurrencyCode::AED => 'UAE Dirham',
        CurrencyCode::AFN => 'Afghani',
        CurrencyCode::ALL => 'Lek',
        CurrencyCode::AMD => 'Armenian Dram',
        CurrencyCode::ANG => 'Netherlands Antillean Guilder',
        CurrencyCode::AOA => 'Kwanza',
        CurrencyCode::ARS => 'Argentine Peso',
        CurrencyCode::AUD => 'Australian Dollar',
        CurrencyCode::AWG => 'Aruban Florin',
        CurrencyCode::AZN => 'Azerbaijanian Manat',
        CurrencyCode::BAM => 'Convertible Mark',
        CurrencyCode::BBD => 'Barbados Dollar',
        CurrencyCode::BDT => 'Taka',
        CurrencyCode::BGN => 'Bulgarian Lev',
        CurrencyCode::BHD => 'Bahraini Dinar',
        CurrencyCode::BIF => 'Burundi Franc',
        CurrencyCode::BMD => 'Bermudian Dollar',
        CurrencyCode::BND => 'Brunei Dollar',
        CurrencyCode::BOB => 'Boliviano',
        CurrencyCode::BRL => 'Brazilian Real',
        CurrencyCode::BSD => 'Bahamian Dollar',
        CurrencyCode::BTN => 'Ngultrum',
        CurrencyCode::BWP => 'Pula',
        CurrencyCode::BYR => 'Belarussian Ruble',
        CurrencyCode::BZD => 'Belize Dollar',
        CurrencyCode::CAD => 'Canadian Dollar',
        CurrencyCode::CDF => 'Congolese Franc',
        CurrencyCode::CHF => 'Swiss Franc',
        CurrencyCode::CLF => 'Unidad de Fomento',
        CurrencyCode::CLP => 'Chilean Peso',
        CurrencyCode::CNY => 'Yuan Renminbi',
        CurrencyCode::COP => 'Colombian Peso',
        CurrencyCode::CRC => 'Costa Rican Colon',
        CurrencyCode::CUP => 'Cuban Peso',
        CurrencyCode::CVE => 'Cabo Verde Escudo',
        CurrencyCode::CZK => 'Czech Koruna',
        CurrencyCode::DJF => 'Djibouti Franc',
        CurrencyCode::DKK => 'Danish Krone',
        CurrencyCode::DOP => 'Dominican Peso',
        CurrencyCode::DZD => 'Algerian Dinar',
        CurrencyCode::EGP => 'Egyptian Pound',
        CurrencyCode::ETB => 'Ethiopian Birr',
        CurrencyCode::EUR => 'Euro',
        CurrencyCode::FJD => 'Fiji Dollar',
        CurrencyCode::FKP => 'Falkland Islands Pound',
        CurrencyCode::GBP => 'Pound Sterling',
        CurrencyCode::GEL => 'Lari',
        CurrencyCode::GHS => 'Ghana Cedi',
        CurrencyCode::GIP => 'Gibraltar Pound',
        CurrencyCode::GMD => 'Dalasi',
        CurrencyCode::GNF => 'Guinea Franc',
        CurrencyCode::GTQ => 'Quetzal',
        CurrencyCode::GYD => 'Guyana Dollar',
        CurrencyCode::HKD => 'Hong Kong Dollar',
        CurrencyCode::HNL => 'Lempira',
        CurrencyCode::HRK => 'Kuna',
        CurrencyCode::HTG => 'Gourde',
        CurrencyCode::HUF => 'Forint',
        CurrencyCode::IDR => 'Rupiah',
        CurrencyCode::ILS => 'New Israeli Sheqel',
        CurrencyCode::INR => 'Indian Rupee',
        CurrencyCode::IQD => 'Iraqi Dinar',
        CurrencyCode::IRR => 'Iranian Rial',
        CurrencyCode::ISK => 'Iceland Krona',
        CurrencyCode::JMD => 'Jamaican Dollar',
        CurrencyCode::JOD => 'Jordanian Dinar',
        CurrencyCode::JPY => 'Yen',
        CurrencyCode::KES => 'Kenyan Shilling',
        CurrencyCode::KGS => 'Som',
        CurrencyCode::KHR => 'Riel',
        CurrencyCode::KMF => 'Comoro Franc',
        CurrencyCode::KPW => 'North Korean Won',
        CurrencyCode::KRW => 'Won',
        CurrencyCode::KWD => 'Kuwaiti Dinar',
        CurrencyCode::KYD => 'Cayman Islands Dollar',
        CurrencyCode::KZT => 'Tenge',
        CurrencyCode::LAK => 'Kip',
        CurrencyCode::LBP => 'Lebanese Pound',
        CurrencyCode::LKR => 'Sri Lanka Rupee',
        CurrencyCode::LRD => 'Liberian Dollar',
        CurrencyCode::LSL => 'Loti',
        CurrencyCode::LYD => 'Libyan Dinar',
        CurrencyCode::MAD => 'Moroccan Dirham',
        CurrencyCode::MDL => 'Moldovan Leu',
        CurrencyCode::MGA => 'Malagasy Ariary',
        CurrencyCode::MKD => 'Denar',
        CurrencyCode::MMK => 'Kyat',
        CurrencyCode::MNT => 'Tugrik',
        CurrencyCode::MOP => 'Pataca',
        CurrencyCode::MRO => 'Ouguiya',
        CurrencyCode::MUR => 'Mauritius Rupee',
        CurrencyCode::MVR => 'Rufiyaa',
        CurrencyCode::MWK => 'Kwacha',
        CurrencyCode::MXN => 'Mexican Peso',
        CurrencyCode::MYR => 'Malaysian Ringgit',
        CurrencyCode::MZN => 'Mozambique Metical',
        CurrencyCode::NAD => 'Namibia Dollar',
        CurrencyCode::NGN => 'Naira',
        CurrencyCode::NIO => 'Cordoba Oro',
        CurrencyCode::NOK => 'Norwegian Krone',
        CurrencyCode::NPR => 'Nepalese Rupee',
        CurrencyCode::NZD => 'New Zealand Dollar',
        CurrencyCode::OMR => 'Rial Omani',
        CurrencyCode::PAB => 'Balboa',
        CurrencyCode::PEN => 'Nuevo Sol',
        CurrencyCode::PGK => 'Kina',
        CurrencyCode::PHP => 'Philippine Peso',
        CurrencyCode::PKR => 'Pakistan Rupee',
        CurrencyCode::PLN => 'Zloty',
        CurrencyCode::PYG => 'Guarani',
        CurrencyCode::QAR => 'Qatari Rial',
        CurrencyCode::RON => 'Romanian Leu',
        CurrencyCode::RSD => 'Serbian Dinar',
        CurrencyCode::RUB => 'Russian Ruble',
        CurrencyCode::RWF => 'Rwanda Franc',
        CurrencyCode::SAR => 'Saudi Riyal',
        CurrencyCode::SBD => 'Solomon Islands Dollar',
        CurrencyCode::SCR => 'Seychelles Rupee',
        CurrencyCode::SDG => 'Sudanese Pound',
        CurrencyCode::SEK => 'Swedish Krona',
        CurrencyCode::SGD => 'Singapore Dollar',
        CurrencyCode::SHP => 'Saint Helena Pound',
        CurrencyCode::SLL => 'Leone',
        CurrencyCode::SOS => 'Somali Shilling',
        CurrencyCode::SRD => 'Surinam Dollar',
        CurrencyCode::STD => 'Dobra',
        CurrencyCode::SVC => 'El Salvador Colon',
        CurrencyCode::SYP => 'Syrian Pound',
        CurrencyCode::SZL => 'Lilangeni',
        CurrencyCode::THB => 'Baht',
        CurrencyCode::TJS => 'Somoni',
        CurrencyCode::TMT => 'Turkmenistan New Manat',
        CurrencyCode::TND => 'Tunisian Dinar',
        CurrencyCode::TOP => 'Pa’anga',
        CurrencyCode::TRY => 'Turkish Lira',
        CurrencyCode::TTD => 'Trinidad and Tobago Dollar',
        CurrencyCode::TWD => 'New Taiwan Dollar',
        CurrencyCode::TZS => 'Tanzanian Shilling',
        CurrencyCode::UAH => 'Hryvnia',
        CurrencyCode::UGX => 'Uganda Shilling',
        CurrencyCode::USD => 'US Dollar',
        CurrencyCode::UYU => 'Peso Uruguayo',
        CurrencyCode::UZS => 'Uzbekistan Sum',
        CurrencyCode::VEF => 'Bolivar',
        CurrencyCode::VND => 'Dong',
        CurrencyCode::VUV => 'Vatu',
        CurrencyCode::WST => 'Tala',
        CurrencyCode::XAF => 'CFA Franc BEAC',
        CurrencyCode::XCD => 'East Caribbean Dollar',
        CurrencyCode::XDR => 'SDR (Special Drawing Right)',
        CurrencyCode::XOF => 'CFA Franc BCEAO',
        CurrencyCode::XPF => 'CFP Franc',
        CurrencyCode::YER => 'Yemeni Rial',
        CurrencyCode::ZAR => 'Rand',
        CurrencyCode::ZWL => 'Zimbabwe Dollar',
    ];

    /**
     * @var array
     */
    private static $precision = [
        CurrencyCode::BHD => 3,
        CurrencyCode::BIF => 0,
        CurrencyCode::CLF => 4,
        CurrencyCode::CLP => 0,
        CurrencyCode::CVE => 0,
        CurrencyCode::DJF => 0,
        CurrencyCode::GNF => 0,
        CurrencyCode::IQD => 3,
        CurrencyCode::ISK => 0,
        CurrencyCode::JOD => 3,
        CurrencyCode::JPY => 0,
        CurrencyCode::KMF => 0,
        CurrencyCode::KRW => 0,
        CurrencyCode::KWD => 3,
        CurrencyCode::LYD => 3,
        CurrencyCode::OMR => 3,
        CurrencyCode::PYG => 0,
        CurrencyCode::RWF => 0,
        CurrencyCode::TND => 3,
        CurrencyCode::UGX => 0,
        CurrencyCode::VND => 0,
        CurrencyCode::VUV => 0,
        CurrencyCode::XAF => 0,
        CurrencyCode::XOF => 0,
        CurrencyCode::XPF => 0,
    ];
}
