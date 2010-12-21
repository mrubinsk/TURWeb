<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1"/>
<meta name="description" content="description"/>
<meta name="keywords" content="keywords"/>
<meta name="author" content="author"/>
<link rel="stylesheet" type="text/css" href="http://<?php echo $this->host_base?>/css/screen.css" media="screen"/>
<?php if (!empty($this->feedurl)):?>
    <link rel="alternate" type="application/rss+xml" title="RSS" href="<?php echo $this->feedurl?>" />
<?php endif ?>
<title><?php echo $this->page_title?></title>
<script type="text/javascript" src="http://portal.theupstairsroom.com/horde/js/prototype.js"></script>
<script type="text/javascript">
function updatePreviously(page)
{
    new Ajax.Updater('previously',
                     '<?php echo 'http://' . $this->host_base . '/gotopage/'?>' + page);
    return false;
}
</script>
</head>
<body>
 <div class="container">
  <!-- Page Banner -->
  <div class="header">
  <!-- Fix me - this is sloppy HTML -->
  <a href="<?php echo $this->urlWriter->urlFor('home')?>">
   <div class="title">
     <h1>theUpstairsRoom</h1>
   </div>
  </a>
  </div>
<?php echo $this->renderPartial('nav');?>
    <div class="main">
     <!--  Main content area -->
     <?php echo $this->contentTag('div', $this->contentForLayout, array('class' => 'content'));?>
     <!--  End main content area -->

     <!-- Right Hand Bar -->
     <div class="sidenav">
      <?php echo $this->renderPartial('poweredby'); ?>
      <?php echo $this->renderPartial('twitter');?>
      <?php echo $this->renderPartial('downloads'); ?>
      <?php echo $this->renderPartial('cloud'); ?>
      <?php echo $this->renderPartial('previously');?>
      <?php echo $this->renderPartial('ads'); ?>
     </div>
     <div class="clearer"></div>
   </div>
 <?php echo $this->renderPartial('footer.html.php');?>