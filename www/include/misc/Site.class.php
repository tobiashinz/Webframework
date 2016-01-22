<?php
/**
 * Site
 *
 * @author Tobias Hinz <hallo@tobiashinz.de>
 */
class Site {
    /**
     * Location of directory where site lives
     * @var string
     */
    var $basepath;

    /**
     * Location (URL) of site
     * @var site
     */
    var $basepathHttp;

    /**
     * Location of web directory relative to basepath
     * @var string
     */
    var $basepathWww;

    /**
     * Language of site
     * @var string
     */
    var $language = 'en';

    /**
     * General title of the site
     * @var string
     */
    var $name;

    /**
     * Constructor
     * @param string $basepath     Location of directory
     * @param string $name General Title of the site
     * @param string $basepathHttp Location (URL) of site
     * @param string $basepathWww  Location of web directory relative to basepath
     */
    function __construct($basepath, $name = 'WebFramework', $basepathHttp = 'http://localhost:8888', $basepathWww = 'www') {
        $this->basepath = $basepath;
        $this->name = $name;
        $this->basepathHttp = $basepathHttp;
        $this->basepathWww = $this->basepath . DIRECTORY_SEPARATOR . $basepathWww;
    }

    /**
     * Create a new page
     * @param  string $title Title of the new page
     * @return Page          The page
     */
    public function createPage($title) {
        $page = new Page($title);
        $page->site = $this;
        $page->language = $this->language;

        return $page;
    }
}
?>