<?php
/**
 * Page
 *
 * @author Tobias Hinz <hallo@tobiashinz.de>
 */
class Page {
    /**
     * The site the page lives on
     * @var Site
     */
    var $site;

    /**
     * Javascript page-type
     * @var string
     */
    var $javascriptPageType = 'main_page';

    /**
     * Language of page
     * @var string
     */
    var $language;

    /**
     * Meta description
     * @var string
     */
    var $metaDescription = '';

    /**
     * Title of the page
     * @var string
     */
    var $title;

    /**
     * Constructor
     * @param string $title Title of page
     */
    function __construct($title) {
        $this->title = $title;
    }

    /**
     * Get the footer for HTML
     * @return string           HTML code
     */
    public function getHtmlFooter() {
        return '</body>'
             . '</html>';
    }

    /**
     * Get the head for HTML
     * @return string          HTML code
     */
    public function getHtmlHead() {
        return '<!DOCTYPE html>'
             . '<html lang="' . $this->language . '">'
             . '<head>'
             . '<meta charset="utf-8">'
             . '<meta name="viewport" content="width=device-width" />'
             . '<title>' . $this->getHtmlTitle() . '</title>'
             . '<script>var PAGE_TYPE = "' . $this->javascriptPageType . '";</script>'
             . (file_exists($this->site->basepathWww . DIRECTORY_SEPARATOR . 'dist' . DIRECTORY_SEPARATOR . 'css' . DIRECTORY_SEPARATOR . 'critical.css') ? '<style type="text/css">' . file_get_contents($this->site->basepathWww . DIRECTORY_SEPARATOR . 'dist' . DIRECTORY_SEPARATOR . 'css' . DIRECTORY_SEPARATOR . 'critical.css') . '</style>' : '')
             . (file_exists($this->site->basepathWww . DIRECTORY_SEPARATOR . 'dist' . DIRECTORY_SEPARATOR . 'css' . DIRECTORY_SEPARATOR . 'screen.min.css') ? '<link rel="stylesheet" href="dist/css/screen.min.css?v=' . md5_file($this->site->basepathWww . DIRECTORY_SEPARATOR . 'dist' . DIRECTORY_SEPARATOR . 'css' . DIRECTORY_SEPARATOR . 'screen.min.css') . '">' : '')
             . (file_exists($this->site->basepathWww . DIRECTORY_SEPARATOR . 'dist' . DIRECTORY_SEPARATOR . 'js' . DIRECTORY_SEPARATOR . 'scripts.min.js') ? '<script async="async" src="dist/js/scripts.min.js?v=' . md5_file($this->site->basepathWww . DIRECTORY_SEPARATOR . 'dist' . DIRECTORY_SEPARATOR . 'js' . DIRECTORY_SEPARATOR . 'scripts.min.js') . '"></script>' : '')
             . '<meta name="description" content="' . $this->metaDescription . '">'
             . '</head>'
             . '<body>';
    }

    /**
     * Get the title for HTML title tag
     * @return string Title
     */
    public function getHtmlTitle() {
        return $this->site->name . ' - ' . $this->title;
    }
}
?>
