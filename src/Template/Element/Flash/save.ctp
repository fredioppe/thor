<?php
$class = 'message';
if (!empty($params['class'])) {
    $class .= ' ' . $params['class'];
}                                             //<div class="<?= h($class) "><?= h($message) </div>
?>




<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i><?= __('Atenção!')?></h4>
                <?= h($message) ?>
              </div>