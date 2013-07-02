<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1"/>
<meta name="description" content="description"/>
<meta name="keywords" content="keywords"/>
<meta name="author" content="author"/>
<link rel="stylesheet" type="text/css" href="http://<?php echo $this->host_base?>/css/screen.css" media="screen"/>
<link rel="stylesheet" type="text/css" href="http://h4.theupstairsroom.com/horde/js/syntaxhighlighter/styles/shThemeEclipse.css"/>
<link rel="stylesheet" type="text/css" href="http://h4.theupstairsroom.com/horde/js/syntaxhighlighter/styles/shCoreEclipse.css"/>
<?php if (!empty($this->feedurl)):?>
    <link rel="alternate" type="application/rss+xml" title="RSS" href="<?php echo $this->feedurl?>" />
<?php endif ?>
<title><?php echo $this->page_title?></title>
<script type="text/javascript" src="http://h4.theupstairsroom.com/horde/js/prototype.js"></script>
<script type="text/javascript" src="http://h4.theupstairsroom.com/horde/js/syntaxhighlighter/scripts/shCore.js"></script>
<script type="text/javascript" src="http://h4.theupstairsroom.com/horde/js/syntaxhighlighter/scripts/shAutoloader.js"></script>
<script type="text/javascript">
    document.observe('dom:loaded', function() {
        var path = 'http://h4.theupstairsroom.com/horde/js/syntaxhighlighter/scripts/';
        SyntaxHighlighter.autoloader(
          'applescript ' + path + 'shBrushAppleScript.js',
          'bash shell ' + path + 'shBrushBash.js',
          'css ' + path + 'shBrushCss.js',
          'diff patch pas ' + path + 'shBrushDiff.js',
          'js jscript javascript ' + path + 'shBrushJScript.js',
          'perl pl '+ path + 'shBrushPerl.js',
          'php ' + path + 'shBrushPhp.js',
          'text plain ' + path + 'shBrushPlain.js',
          'sql ' + path + 'shBrushSql.js',
          'xml xhtml xslt html ' + path + 'shBrushXml.js'
        );
        SyntaxHighlighter.defaults['toolbar'] = false;
        SyntaxHighlighter.all();
    });

    function updatePreviously(page)
    {
        new Ajax.Updater('previously',
                     '<?php echo 'http://' . $this->host_base . '/gotopage/'?>' + page);
        return false;
    }
</script>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-23347823-1']);
  _gaq.push(['_setDomainName', '.theupstairsroom.com']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</head>
<body>
 <div class="maincontainer">
  <!-- Page Banner -->
<?php echo $this->renderPartial('banner');?>
    <div class="main">
     <!--  Main content area -->
     <?php echo $this->contentTag('div', $this->contentForLayout, array('class' => 'content'));?>
     <!--  End main content area -->

     <!-- Right Hand Bar -->
     <div class="sidenav">
      <?php echo $this->renderPartial('poweredby')?>
      <?php echo $this->renderPartial('twitter')?>
      <?php echo $this->renderPartial('wishlist')?>
      <?php echo $this->renderPartial('photostream')?>
      <?php echo $this->renderPartial('cloud')?>
      <?php echo $this->renderPartial(
        'previously',
        array(
          'locals' => array('page' => $this->page,
          'pageCount' => $this->pageCount,
          'summary' => $this->summary)))?>
     </div>
     <div class="clearer"></div>
   </div>
 <?php echo $this->renderPartial('footer.html.php')?>
