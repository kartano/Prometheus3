<?php
/**
 * Page Rendering class
 *
 * @author Simon Mitchell <kartano@gmail.com>
 *
 * @version			1.0.0			Prototype.
 */
namespace SunsetCoders\PageRender;

/**
 * Class PageRender
 * @package SunsetCoders\PageRender
 */
abstract class PageRender
{
	/** @var PageRenderSettings Page render settings.*/
	private $renderSettings;

	/**
	 * PageRender constructor.
	 * @param PageRenderSettings $settings
	 */
	public function __construct(PageRenderSettings $settings)
	{
		$this->renderSettings=$settings;
	}
}
