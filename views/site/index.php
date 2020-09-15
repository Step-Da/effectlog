<?php
    use yii\helpers\Html;
    $this->title = 'EffectLog';
?>
<div class="site-index">
    <div class="body-content">
        <div class="area">
            <?//php foreach($unit as $element):?>
                <div class="card-field">
                    <div class="card">
                        <div class="box-card">
                            <div class="content-body-card">
                                <h2 class="card-number"><?= Html::encode("{$element->id}"); ?></h2>
                                <h3 class="card-title"><?= Html::encode("{$element->name}"); ?></h3>
                                <a class="card-button" href="#">Select Log</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?//php endforeach; ?>
        </div>
    </div>
</div>
