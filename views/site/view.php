<?php
  use yii\helpers\Url;

  $this->title = "EffectLog";
  $this->params['breadcrumbs'][] = array(
    'label' => 'Список',
    'url' => Url::toRoute('log?unit='.$unit),
  );
  $this->params['breadcrumbs'][] = $item[1];;
?>

<div>
    <ul class="menu">
      <li><?= $item[1]?></li>
      <li><span>Статус</span>
        <em>
            <?php if($item[0] == $statusError): ?> Ошибка&nbsp;(<?= $item[0]; ?>)
            <?php else: ?> Успех&nbsp;(<?= $item[0]; ?>) <?php endif; ?>
        </em></li>
      <li><span>Артикул</span><em><?= $item[2]?></em></li>
      <li><span>Код</span><em><?= $item[3]?></em></li>
    </ul>
</div>