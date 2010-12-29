<?php
header('Content-Type: text/html');
echo $this->renderPartial('news', array('locals' => array('page' => $this->page,
                                                          'pageCount' => $this->pageCount,
                                                          'summary' => $this->summary)));