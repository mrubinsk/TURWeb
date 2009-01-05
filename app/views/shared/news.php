<?php if ($this->page <= $this->pageCount): ?>
   <a href="#" id="olderLink" onClick="return updatePreviously(<?php echo (int)$this->page + 1?>);"><< Older</a>
<?php endif;?>
<?php if ($this->page > 0): ?>
   <a href="#" id="newerLink" onClick="return updatePreviously(<?php echo (int)$this->page - 1?>);">Newer >></a>
<?php endif;?>
<div class="clearer"></div>
<ul>
<?php foreach ($this->summary as $story):?>
  <li><a class="rfNewsHeader" href="<?php echo $story['story_link']?>"><?php echo $story['story_title']?></a>
  <?php if (!$this->summaryTitlesOnly):?>
    <div class="rfNewsBody"><?php echo $story['story_desc']?></div>
  <?php endif;?>
  </li>
<?php endforeach; ?>
</ul>