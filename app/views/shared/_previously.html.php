<div id="previously" class="sidebar">
  <h1>Previously</h1>
  <?php echo $this->renderPartial(
    'news',
     array('locals' => array('page' => $this->page,
                             'pageCount' => $this->pageCount,
                             'summary' => $this->summary)));
?>
</div>
