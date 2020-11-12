<?php 
use yii\helpers\Html;

$this->title="EffectLog";
$this->params['breadcrumbs'][] = 'Список';
?>
<div class="site-log">
    <div class="data">
        <h1>Поставщик:&nbsp;<?= $unit['name']; ?></h1>
        <hr>
            <!-- Статистика -->
            <div class="stat container pt-4">
                <label class="static borderStatistics">Всего элементов:&nbsp;<?= count($data);?></label>
                <label class="success-color borderStatistics">Успешные:&nbsp;<?= $success; ?></label>
                <label class="error-color borderStatistics">Ошибок:&nbsp;<?= $error; ?></label>
            </div>
        <hr>
        <!-- Лист компонентов обновления остатков -->
        <div class="config-board">
            <ul class="list-group list">
                <?php foreach($data as $element): ?>
                <?php if($element[0] == $statusError): ?><li class="list-group-item list-item error list-link"><?php else:?>
                    <li class="list-group-item list-item success list-link"><?php endif;?>
                        <div>
                            <?= Html::a($element[1], ['site/view', 'name' => $element[1], 'url' => $url, 'unit' => $unit['id']], ['class' => 'list-link']);?>
                        </div>
                    </li> 
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>