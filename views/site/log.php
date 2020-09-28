<?php 
    use yii\helpers\Html;
    use yii\widgets\LinkPager;

    $this->title="EffectLog";
    $this->params['breadcrumbs'][] = 'Логи';

    foreach($unit as $element){
        $idUnit = Html::encode($element->id);
        $nameUnit = Html::encode($element->name);
    }

    $maxCount; $maxCost;
    foreach($data['Effect'] as $element){
        $maxCount += $element['count'];
        $maxCost += $element['cost'];
    }
?>
<div class="site-log">
    <div class="data">
        <h1>Поставщик:&#32;<?= $nameUnit?></h1>
        <hr>
            <div class="stat container pt-4">
                <label>Статистика</label>
                <label>Количество: <?= $maxCount?></label>
                <label>Cумма: <?= $maxCost?></label>
            </div>
        <hr>
        <div class="config-board">
            <ul class="list-group list">
                <?php foreach($data['Effect'] as $element): ?>
                    <li class="list-group-item list-item">
                        <div>
                            <strong><?= $element['title']; ?></strong>
                            <small><?= 'Кол-во: '.$element['count']; ?></small>
                            <small><?= '| Цена: '.$element['cost']; ?></small>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>