<?php
/**
 * Page Renderer settings
 *
 * @author Simon Mitchell <kartano@gmail.com>
 *
 * @version            1.0.0            Prototype
 */

namespace SunsetCoders\PageRender;
use SunsetCoders\Exception;

/**
 * Class PageRenderSettings
 * @package SunsetCoders\PageRender
 */
class PageRenderSettings
{
    /** @var string The HTML Document to be included in the <!DOCTYPE ....> node of the DOM. This will HAVE NO EFFECT for standalone pages. */
    private $doctype;

    /** @var string The ISO Language code.  This will HAVE NO EFFECT for standalone pages.
     *  @see https://www.sitepoint.com/iso-2-letter-language-codes/
     */
    private $htmlLanguage;

    /** @var bool  TRUE if this page should ONLY render the RAW HTML for this page.  I.E:  We are rendering a particular dialog to be included on page. */
    private $standalonePage;

    /** @var string Page title.  This has no effect for pages that are STANDALONE. */
    private $title;

    /** @var bool TRUE if we need jQuery on this page. */
    private $usesJQuery;

    /** @var bool TRUE if we need jQueryUI on this page. */
    private $usesJQueryUI;

    /** @var bool TRUE if we should include a <FOOTER> .... </FOOTER> block on this page. */
    private $usesFooter;

    /** @var bool TRUE if we should include a <HEADER> .... </HEADER> block on the page. */
    private $usesHeader;

    /** @var bool TRUE if we should include includes for bootstrap 4 in this page.  Has no effect if the page is STANDALONE. */
    private $usesBootstrap;

    /** @var bool TRUE if the page should include the Angular JS Library. */
    private $usesAngularJS;

    /**
     * @throws Exception\PageRenderSettingsException Thrown if a combination of settings for the page is invalid.
     */
    public function assertSettingsAreValid(): void
    {
        static $validISOLanguageCodes = [
            'ab' => 'Abkhazian',
            'aa' => 'Afar',
            'af' => 'Afrikaans',
            'ak' => 'Akan',
            'sq' => 'Albanian',
            'am' => 'Amharic',
            'ar' => 'Arabic',
            'an' => 'Aragonese',
            'hy' => 'Armenian',
            'as' => 'Assamese',
            'av' => 'Avaric',
            'ae' => 'Avestan',
            'ay' => 'Aymara',
            'az' => 'Azerbaijani',
            'bm' => 'Bambara',
            'ba' => 'Bashkir',
            'eu' => 'Basque',
            'be' => 'Belarusian',
            'bn' => 'Bengali',
            'bh' => 'Bihari languages',
            'bi' => 'Bislama',
            'bs' => 'Bosnian',
            'br' => 'Breton',
            'bg' => 'Bulgarian',
            'my' => 'Burmese',
            'ca' => 'Catalan, Valencian',
            'km' => 'Central Khmer',
            'ch' => 'Chamorro',
            'ce' => 'Chechen',
            'ny' => 'Chichewa, Chewa, Nyanja',
            'zh' => 'Chinese',
            'cu' => 'Church Slavonic, Old Bulgarian, Old Church Slavonic',
            'cv' => 'Chuvash',
            'kw' => 'Cornish',
            'co' => 'Corsican',
            'cr' => 'Cree',
            'hr' => 'Croatian',
            'cs' => 'Czech',
            'da' => 'Danish',
            'dv' => 'Divehi, Dhivehi, Maldivian',
            'nl' => 'Dutch, Flemish',
            'dz' => 'Dzongkha',
            'en' => 'English',
            'eo' => 'Esperanto',
            'et' => 'Estonian',
            'ee' => 'Ewe',
            'fo' => 'Faroese',
            'fj' => 'Fijian',
            'fi' => 'Finnish',
            'fr' => 'French',
            'ff' => 'Fulah',
            'gd' => 'Gaelic, Scottish Gaelic',
            'gl' => 'Galician',
            'lg' => 'Ganda',
            'ka' => 'Georgian',
            'de' => 'German',
            'ki' => 'Gikuyu, Kikuyu',
            'el' => 'Greek (Modern)',
            'kl' => 'Greenlandic, Kalaallisut',
            'gn' => 'Guarani',
            'gu' => 'Gujarati',
            'ht' => 'Haitian, Haitian Creole',
            'ha' => 'Hausa',
            'he' => 'Hebrew',
            'hz' => 'Herero',
            'hi' => 'Hindi',
            'ho' => 'Hiri Motu',
            'hu' => 'Hungarian',
            'is' => 'Icelandic',
            'io' => 'Ido',
            'ig' => 'Igbo',
            'id' => 'Indonesian',
            'ia' => 'Interlingua (International Auxiliary Language Association)',
            'ie' => 'Interlingue',
            'iu' => 'Inuktitut',
            'ik' => 'Inupiaq',
            'ga' => 'Irish',
            'it' => 'Italian',
            'ja' => 'Japanese',
            'jv' => 'Javanese',
            'kn' => 'Kannada',
            'kr' => 'Kanuri',
            'ks' => 'Kashmiri',
            'kk' => 'Kazakh',
            'rw' => 'Kinyarwanda',
            'kv' => 'Komi',
            'kg' => 'Kongo',
            'ko' => 'Korean',
            'kj' => 'Kwanyama, Kuanyama',
            'ku' => 'Kurdish',
            'ky' => 'Kyrgyz',
            'lo' => 'Lao',
            'la' => 'Latin',
            'lv' => 'Latvian',
            'lb' => 'Letzeburgesch, Luxembourgish',
            'li' => 'Limburgish, Limburgan, Limburger',
            'ln' => 'Lingala',
            'lt' => 'Lithuanian',
            'lu' => 'Luba-Katanga',
            'mk' => 'Macedonian',
            'mg' => 'Malagasy',
            'ms' => 'Malay',
            'ml' => 'Malayalam',
            'mt' => 'Maltese',
            'gv' => 'Manx',
            'mi' => 'Maori',
            'mr' => 'Marathi',
            'mh' => 'Marshallese',
            'ro' => 'Moldovan, Moldavian, Romanian',
            'mn' => 'Mongolian',
            'na' => 'Nauru',
            'nv' => 'Navajo, Navaho',
            'nd' => 'Northern Ndebele',
            'ng' => 'Ndonga',
            'ne' => 'Nepali',
            'se' => 'Northern Sami',
            'no' => 'Norwegian',
            'nb' => 'Norwegian Bokmål',
            'nn' => 'Norwegian Nynorsk',
            'ii' => 'Nuosu, Sichuan Yi',
            'oc' => 'Occitan (post 1500)',
            'oj' => 'Ojibwa',
            'or' => 'Oriya',
            'om' => 'Oromo',
            'os' => 'Ossetian, Ossetic',
            'pi' => 'Pali',
            'pa' => 'Panjabi, Punjabi',
            'ps' => 'Pashto, Pushto',
            'fa' => 'Persian',
            'pl' => 'Polish',
            'pt' => 'Portuguese',
            'qu' => 'Quechua',
            'rm' => 'Romansh',
            'rn' => 'Rundi',
            'ru' => 'Russian',
            'sm' => 'Samoan',
            'sg' => 'Sango',
            'sa' => 'Sanskrit',
            'sc' => 'Sardinian',
            'sr' => 'Serbian',
            'sn' => 'Shona',
            'sd' => 'Sindhi',
            'si' => 'Sinhala, Sinhalese',
            'sk' => 'Slovak',
            'sl' => 'Slovenian',
            'so' => 'Somali',
            'st' => 'Sotho, Southern',
            'nr' => 'South Ndebele',
            'es' => 'Spanish, Castilian',
            'su' => 'Sundanese',
            'sw' => 'Swahili',
            'ss' => 'Swati',
            'sv' => 'Swedish',
            'tl' => 'Tagalog',
            'ty' => 'Tahitian',
            'tg' => 'Tajik',
            'ta' => 'Tamil',
            'tt' => 'Tatar',
            'te' => 'Telugu',
            'th' => 'Thai',
            'bo' => 'Tibetan',
            'ti' => 'Tigrinya',
            'to' => 'Tonga (Tonga Islands)',
            'ts' => 'Tsonga',
            'tn' => 'Tswana',
            'tr' => 'Turkish',
            'tk' => 'Turkmen',
            'tw' => 'Twi',
            'ug' => 'Uighur, Uyghur',
            'uk' => 'Ukrainian',
            'ur' => 'Urdu',
            'uz' => 'Uzbek',
            've' => 'Venda',
            'vi' => 'Vietnamese',
            'vo' => 'Volap_k',
            'wa' => 'Walloon',
            'cy' => 'Welsh',
            'fy' => 'Western Frisian',
            'wo' => 'Wolof',
            'xh' => 'Xhosa',
            'yi' => 'Yiddish',
            'yo' => 'Yoruba',
            'za' => 'Zhuang, Chuang',
            'zu' => 'Zulu'
        ];

        static $staticHTMLDocTypes = [
            'HTML',
            'HTML PUBLIC "-//W3C//DTD HTML 4.01//EN "http://www.w3.org/TR/html4/strict.dtd"',
            'HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"',
            'HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" "http://www.w3.org/TR/html4/frameset.dtd"',
            'html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"',
            'html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"',
            'html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd"',
            'html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd"',
            'html PUBLIC "-//W3C//DTD XHTML Basic 1.1//EN" "http://www.w3.org/TR/xhtml-basic/xhtml-basic11.dtd"',
            'math PUBLIC "-//W3C//DTD MathML 2.0//EN" "http://www.w3.org/Math/DTD/mathml2/mathml2.dtd"',
            'math SYSTEM "http://www.w3.org/Math/DTD/mathml1/mathml.dtd"',
            'html PUBLIC "-//W3C//DTD XHTML 1.1 plus MathML 2.0 plus SVG 1.1//EN" "http://www.w3.org/2002/04/xhtml-math-svg/xhtml-math-svg.dtd"',
            'html PUBLIC "-//W3C//DTD XHTML 1.1 plus MathML 2.0 plus SVG 1.1//EN" "http://www.w3.org/2002/04/xhtml-math-svg/xhtml-math-svg.dtd"',
            'svg:svg PUBLIC "-//W3C//DTD XHTML 1.1 plus MathML 2.0 plus SVG 1.1//EN" "http://www.w3.org/2002/04/xhtml-math-svg/xhtml-math-svg.dtd"',
            'svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd"',
            'svg PUBLIC "-//W3C//DTD SVG 1.0//EN" "http://www.w3.org/TR/2001/REC-SVG-20010904/DTD/svg10.dtd"',
            'svg PUBLIC "-//W3C//DTD SVG 1.1 Basic//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11-basic.dtd"',
            'svg PUBLIC "-//W3C//DTD SVG 1.1 Tiny//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11-tiny.dtd"',
            'html PUBLIC "-//IETF//DTD HTML 2.0//EN"',
            'html PUBLIC "-//W3C//DTD HTML 3.2 Final//EN"',
            'html PUBLIC "-//W3C//DTD XHTML Basic 1.0//EN" "http://www.w3.org/TR/xhtml-basic/xhtml-basic10.dtd"'
        ];

        // SM:  Validate page panguages and doc types.
        if (!$this->isStandalonePage()) {
            if ($this->getHtmlLanguage()=='') {
                throw new Exception\PageRenderSettingsException("Your page must specify a valid ISO 639-1 code.");
            } elseif (!in_array($this->htmlLanguage, $validISOLanguageCodes)) {
                throw new Exception\PageRenderSettingsException("{$this->htmlLanguage} is not a valid ISO 639-1 code.");
            }
            if ($this->doctype=='') {
                throw new Exception\PageRenderSettingsException("Your page must specify a valid DOCTYPE.");
            } elseif (!in_array($this->doctype, $staticHTMLDocTypes)) {
                throw new Exception\PageRenderSettingsException("{$this->htmlLanguage} is not a valid DOCTYPE.");
            }
        }

        if (!$this->isUsesJQuery()) {
            if ($this->isUsesJQueryUI()) {
                throw new Exception\PageRenderSettingsException("JQueryUI is being included, but jQuery is turned off.");
            } elseif ($this->isUsesAngularJS()) {
                throw new Exception\PageRenderSettingsException("AngularJS is being included, but jQuery is turned off.");
            }
        }
        return;
    }

    /**
     * @return bool
     */
    public function isStandalonePage(): bool
    {
        return $this->standalonePage;
    }

    /**
     * @param bool $standalonePage
     * @return PageRenderSettings
     */
    public function setStandalonePage(bool $standalonePage): PageRenderSettings
    {
        $this->standalonePage = $standalonePage;
        return $this;
    }

    /**
     * @return bool
     */
    public function isUsesJQuery(): bool
    {
        return $this->usesJQuery;
    }

    /**
     * @param bool $usesJQuery
     * @return PageRenderSettings
     */
    public function setUsesJQuery(bool $usesJQuery): PageRenderSettings
    {
        $this->usesJQuery = $usesJQuery;
        return $this;

    }

    /**
     * @return bool
     */
    public function isUsesJQueryUI(): bool
    {
        return $this->usesJQueryUI;
    }

    /**
     * @param bool $usesJQueryUI
     * @return PageRenderSettings
     */
    public function setUsesJQueryUI(bool $usesJQueryUI): PageRenderSettings
    {
        $this->usesJQueryUI = $usesJQueryUI;
        return $this;
    }

    /**
     * @return bool
     */
    public function isUsesHeader(): bool
    {
        return $this->usesHeader;
    }

    /**
     * @param bool $usesHeader
     * @return PageRenderSettings
     */
    public function setUsesHeader(bool $usesHeader): PageRenderSettings
    {
        $this->usesHeader = $usesHeader;
        return $this;
    }

    /**
     * @return bool
     */
    public function isUsesFooter(): bool
    {
        return $this->usesFooter;
    }

    /**
     * @param bool $usesFooter
     * @return PageRenderSettings
     */
    public function setUsesFooter(bool $usesFooter): PageRenderSettings
    {
        $this->usesFooter = $usesFooter;
        return $this;
    }

    /**
     * @return string
     */
    public function getDoctype(): string
    {
        return $this->doctype;
    }

    /**
     * @param string $doctype
     * @return PageRenderSettings
     */
    public function setDoctype(string $doctype): PageRenderSettings
    {
        $this->doctype = $doctype;
        return $this;
    }
    /**
     * @return string
     */
    public function getHtmlLanguage(): string
    {
        return $this->htmlLanguage;
    }

    /**
     * @param string $htmlLanguage
     * @return PageRenderSettings
     */
    public function setHtmlLanguage(string $htmlLanguage): PageRenderSettings
    {
        $this->htmlLanguage = $htmlLanguage;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return PageRenderSettings
     */
    public function setTitle(string $title): PageRenderSettings
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return bool
     */
    public function isUsesBootstrap(): bool
    {
        return $this->usesBootstrap;
    }

    /**
     * @param bool $usesBootstrap
     * @return PageRenderSettings
     */
    public function setUsesBootstrap(bool $usesBootstrap): PageRenderSettings
    {
        $this->usesBootstrap = $usesBootstrap;
        return $this;
    }

    /**
     * @return bool TRUE if the page should include the Angular JS library.
     */
    public function isUsesAngularJS(): bool
    {
        return $this->usesAngularJS;
    }

    /**
     * @param bool $usesAngularJS
     * @return PageRenderSettings
     */
    public function setUsesAngularJS(bool $usesAngularJS): PageRenderSettings
    {
        $this->usesAngularJS = $usesAngularJS;
        return $this;
    }
}
