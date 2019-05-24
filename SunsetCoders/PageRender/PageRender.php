<?php
/**
 * Page Rendering class
 *
 * @author Simon Mitchell <kartano@gmail.com>
 *
 * @version            1.0.0            Prototype.
 */

namespace SunsetCoders\PageRender;

use SunsetCoders\DataAccess;
use SunsetCoders\Exception;
use SunsetCoders\Config;

/**
 * Class PageRender
 * @package SunsetCoders\PageRender
 */
abstract class PageRender
{
    /** @var PageRenderSettings Page render settings. */
    private $renderSettings;

    /** @var DataAccess\DataAccess The DataAccess */
    private $db;

    /**
     * PageRender constructor.
     * @param PageRenderSettings $settings
     * @param DataAccess\DataAccess $db
     * @throws Exception\PageRenderSettingsException
     */
    public function __construct(PageRenderSettings $settings, DataAccess\DataAccess $db)
    {
        try {
            $settings->assertSettingsAreValid();
        } catch (Exception\PageRenderSettingsException $exception) {
            throw $exception;
        }
        $this->setDb($db)->setRenderSettings($settings);
        $this->db = $db;
        $this->renderSettings = $settings;
    }

	/**
	 * @throws \Exception If the system failed to find the jQueryUI framework.
	 */
    public function RenderPage(): void
    {
    	// SM:  If this is NOT a standalone page (like a dialog) then we will render the entire HTML document.
        if (!$this->getRenderSettings()->isStandalonePage()) {
            ?><!DOCTYPE <?= $this->getRenderSettings()->getDoctype(); ?>>
            <HTML lang="<?= $this->getRenderSettings()->getHtmlLanguage(); ?>">
            <HEAD>
	            <META charset="utf-8">
	            <META name="viewport" content="width=device-width, initial-scale=1">
	            <TITLE><?= $this->getRenderSettings()->getTitle(); ?></TITLE>
                <?php
                if ($this->getRenderSettings()->getDescription()!='') {
                	?>
	                <meta name="description" content="<?=$this->getRenderSettings()->getDescription(); ?>">
                    <?php
                }
                $this->renderHeadStart();
                $this->renderLibraryIncludes();
                if ($this->getRenderSettings()->isUsesJQuery()) {
                	?>
	                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	                <?php
                }
                if ($this->getRenderSettings()->isUsesJQueryUI()) {
                    try {
                        $jqueryUITheme=Config\Config::getSettings()['themes']['jqueryui'];
                    } catch (\Exception $exception) {
                        throw $exception;
                    }
                	?>
	                <script src="https://code.jquery.com/ui/ 1.12.1/jquery-ui.min.js"></script>
	                <link rel="stylesheet" href="code.jquery.com/ui/1.12.1/themes/<?= $jqueryUITheme; ?>/jquery-ui.min.css">
	                <?php
                }
                if ($this->getRenderSettings()->isUsesBootstrap()) {
                    ?>
                    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
                    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
                    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
                    <?php
                }
                if ($this->isUsesAngularJS()) {
                	?>
	                <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.7.8/angular.js"></script>
                	<?php
                }
                $this->renderDocumentReadyJS();
                $this->renderJS();
                ?>
	            <script src="https://use.fontawesome.com/72f2b83a62.js"></script>
            </HEAD>
            <BODY>
                <DIV class="container-fluid">
                <?php
        } // End if standalone
        if ($this->getRenderSettings()->isUsesHeader()) {
            ?>
            <HEADER>
                <?php
                $this->renderHeader();
                ?>
            </HEADER>
            <?php
        } // End if uses HEADER
        ?>
        <SECTION>
            <?php
            $this->renderBody();
            ?>
        </SECTION>
        <?php
        if ($this->getRenderSettings()->isUsesFooter()) {
        ?>
            <FOOTER>
                <?php
                $this->renderBodyFooter();
                ?>
            </FOOTER>
        <?php
        } // End if uses FOOTER.
        if (!$this->getRenderSettings()->isStandalonePage()) {
            ?>
                <DIV class="container-fluid">
            </BODY>
        </HTML>
        <?php
        } // End if we are NOT on a standalone page.
    }

    /**
     * Render all the requires etc for third party tools and frameworks.
     */
    protected function renderLibraryIncludes(): void
    {
        //
    }

    /**
     * Render the start of the <HEAD> element.
     * Use this to include additional includes.
     */
    protected function renderHeadStart(): void
    {
        //
    }

    /**
     * Render initialization code for JS libraries - controls and such on your page.
     */
    protected function renderDocumentReadyJS(): void
    {
        //
    }

    /**
     * Render the global JS code inside the <HEAD> element.  Useful for event handling and validation functions.
     */
    protected function renderJS(): void
    {
        //
    }

    /**
     * Add code that needs to appear inside the <HEADER> block at the top of the page.
     */
    protected function renderHeader(): void
    {
        //
    }

    /**
     * Render the body content of the page.
     */
    protected function renderBody(): void
    {
        //
    }

    /**
     * Render the <FOOTER> section of the page.
     */
    protected function renderBodyFooter(): void
    {
        //
    }

    /**
     * @return PageRenderSettings
     */
    public function getRenderSettings(): PageRenderSettings
    {
        return $this->renderSettings;
    }

    /**
     * @param PageRenderSettings $renderSettings
     * @return PageRender
     */
    public function setRenderSettings(PageRenderSettings $renderSettings): PageRender
    {
        $this->renderSettings = $renderSettings;
        return $this;
    }

    /**
     * @return DataAccess\DataAccess
     */
    public function getDb(): DataAccess\DataAccess
    {
        return $this->db;
    }

    /**
     * @param DataAccess\DataAccess $db
     * @return PageRender
     */
    public function setDb(DataAccess\DataAccess $db): PageRender
    {
        $this->db = $db;
        return $this;
    }
}
