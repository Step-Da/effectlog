<?php
    use yii\helpers\Html;
    use yii\bootstrap\ActiveForm;

    $this->title = 'Регистрация';
    $this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>Для регистрации нового аккаунта необходимо заполнить приведённые ниже.</p>
    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
                <?= $form->field($model, 'username')->textInput(['autofocus' => true])->hint('Введите свой логин')->label('Имя пользователя (логин)') ?>
                <?= $form->field($model, 'email')->hint('Введите адрес от действующей электронной почты')->label('Электронная почта')?>
                <?= $form->field($model, 'password')->passwordInput()->hint('Введите пароль, который вы точно не забудете.')->label('Пароль') ?>
                <div class="form-group">
                    <?= Html::submitButton('Регистрация', ['class' => 'btn btn-success', 'name' => 'signup-button']) ?>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>