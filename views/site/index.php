<?php
    use yii\helpers\Html;
    $this->title = 'EffectLog';
?>
<div class="site-index">
    <div class="body-content">
        <?php if (sizeof($units)) : ?>
            <div id="loader" class="area-loader">
                <div class='loader-object'>
                    <span class="loader-list">
                        <span class="loader-inner"></span>
                    </span>
                    <div class="text-loader">Loading ...</div>
                </div>
            </div>
            <div class="area">
                <?php foreach ($units as $element) : ?>
                    <div class="card-field ">
                        <div class="card visibalFnOn">
                            <div class="box-card">
                                <div class="content-body-card">
                                    <h2 class="card-number"><?= Html::encode("{$element->id}"); ?></h2>
                                    <h3 class="card-title"><?= Html::encode("{$element->name}"); ?></h3>
                                    <?php if(Yii::$app->user->identity->username != null) :?>
                                        <?= Html::a('Перейти',['site/log', 'unit' => $element->id], ['class' => 'card-button'])?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else : ?>
            <p>
               <label class="empty-text">В данный момент активных поставщиков нет .&nbsp;.&nbsp;.</label>
            </p>
        <?php endif; ?>
    </div>
</div>