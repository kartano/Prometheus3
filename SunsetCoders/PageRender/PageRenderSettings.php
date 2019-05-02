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

    /**
     * @throws Exception\PageRenderSettingsException Thrown if a combination of settings for the page is invalid.
     */
    public function assertSettingsAreValid(): void
    {
        if (!$this->isUsesJQuery() && $this->isUsesJQueryUI()) {
            throw new Exception\PageRenderSettingsException("JQueryUI is being included, but jQuery is turned off.");
        }
        // TO DO:  Check for any invalid combination of settings.
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
}
