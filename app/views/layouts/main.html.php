<?php echo $this->renderPartial('header'); ?>
<body>
 <div class="container">
<?php echo $this->renderPartial('banner');?>
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