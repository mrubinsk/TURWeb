<?php
if ($this->page + 2 <= $this->pageCount) {
    echo $this->contentTag('a', $this->escape('<< Older'),
        array('href' => '#',
              'id' => 'olderLink',
              'onClick' => 'return updatePreviously(' . ((int)$this->page + 1) . ');'));
}
if ($this->page > 0) {
    echo $this->contentTag('a', $this->escape('Newer >>'),
    array('href' => '#',
          'id' => 'newerLink',
          'onClick' => 'return updatePreviously(' . ((int)$this->page - 1) . ');'));
}

echo $this->contentTag('div', '&nbsp;', array('class' => 'clearer'));
?>
<ul>
<?php
    foreach ($this->summary as $story) {
        echo $this->contentTag('li',
            $this->contentTag('a', $story['title'], array('href' => $story['permalink'], 'class' => 'rfNewsHeader'))
             . ((!$this->summaryTitlesOnly) ? $this->contentTag('div', $story['description'], array('class' => 'rfNewsHeader')) : ''));
    }
?>
</ul>
