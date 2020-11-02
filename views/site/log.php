<?php 
    use yii\helpers\Html;

    $this->title="EffectLog";
    $this->params['breadcrumbs'][] = 'Список';

    foreach($unit as $element){
        $idUnit = Html::encode($element->id);
        $nameUnit = Html::encode($element->name);
    }
?>
<div class="site-log">
    <div class="data">
        <h1>Поставщик:&nbsp;<?= $nameUnit?></h1>
        <hr>
            <div class="stat container pt-4">
                <label class="static">Всего элементов:&nbsp;<?= count($data);?></label>
                <label class="success-color">Успешные:&nbsp;<?= $success; ?></label>
                <label class="error-color">Ошибок:&nbsp;<?= $error; ?></label>
            </div>
        <hr>
        <div class="config-board">
            <ul class="list-group list">
                <?php foreach($data as $element): ?>
                <?php if($element[0] == $statusError): ?><li class="list-group-item list-item error"><?php else:?>
                    <li class="list-group-item list-item success"><?php endif;?>
                        <div>
                            <?= Html::a($element[1], ['site/view', 'name' => $element[1], 'url' => $url], ['class' => 'list-link']);?>
                        </div>
                    </li> 
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>