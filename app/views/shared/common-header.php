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
                     '<?php echo $this->urlWriter->urlFor('gotopage/')?>' + page);
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

  <!-- Main Navigation -->
  <div class="navigation">
    <a href="<?php echo $this->urlWriter->urlFor('home')?>">Home</a>
    <a href ="<?php echo $this->urlWriter->urlFor('software')?>">Software</a>
    <a href="<?php echo $this->urlWriter->urlFor('about')?>">About</a>
    <div class="clearer"><span></span></div>
  </div>