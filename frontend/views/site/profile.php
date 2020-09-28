<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = Yii::$app->user->identity->username;

?>

<div class="wrap-profile">
    <div class="first-p">
        <span class="img-w"><img src="/assets/87b69638/img/user2-160x160.jpg" alt="" class="img-profile"></span>
        <p><?= Yii::$app->user->identity->username ?></p>
    </div>
    <div class="settings-p">
        <h1>Настройки</h1>
        <?php $form = ActiveForm::begin(['id' => 'up-form', 'enableClientValidation' => false]); ?>

        <?= $form
            ->field($model, 'username')
            ->label('Изменить имя:')
            ->textInput() ?>


        <?php ActiveForm::end(); ?>
    </div>
</div>


<script>
    $('body').on('input', '#loginform-username', function () {
        var name = $(this).val();
        $.ajax({
            type: "POST",
            url: document.location,
            data: $('#up-form').serialize(),
            success: function(msg){
                $('.first-p p').html(msg);
            }
        });
    });
</script>