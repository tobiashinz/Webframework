<?php
require("include/config.php");

$page = $SITE->createPage('Welcome');


// output HTML head until body
echo $page->getHtmlHead();
?>
<h1>WebFramework</h1>

<!-- Widget example -->
<div data-widget="a_widget"></div>

<!-- Sprite example -->
<div class="sprite sprite--rate--green"></div>

<div class="grid">
    <div class="grid__item one-half lap-one-third palm-one-whole">
        Hallo 1
    </div><!--
 --><div class="grid__item one-half lap-two-thirds palm-one-whole">
        Hallo 2
        <h1 class="hidden--palm">I disappear</h1>
        <h1 class="hidden--desk">I appear</h1>
    </div>
</div>
<?php
    echo $page->getHtmlFooter();
?>