<?php 
    use yii\helpers\Html;
    $this->title="EffectLog";
    $this->params['breadcrumbs'][] = 'Логи';
    foreach($unit as $element){
        $idUnit = Html::encode($element->id);
        $nameUnit = Html::encode($element->name);
    }
?>
<div class="site-log">
    <div class="container">
        <div class="data">
            <h1>Поставщик:&#32;<?= $nameUnit?></h1>
        </div>
    </div>
</div>