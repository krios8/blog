<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = 'Создание записи';
$ctlist = $ct->find()->all();
$ctall = ArrayHelper::map($ctlist, 'id', 'name');

?>

<?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

<?= $form->field($posts, 'name')->textInput() ?>

<?= $form->field($posts, 'text')->textarea() ?>

<?= $form->field($posts, 'categoria_id')->dropDownList($ctall) ?>

<?= $form->field($img, 'imageFile')->fileInput()->label('Картинка') ?>

<div class="form-group">
    <?= Html::submitButton('Запостить', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
</div>
<?php if (Yii::$app->controller->action->id == 'upost'): ?>
    <div class="form-group">
        <?= Html::button('Удалить', ['class' => 'btn btn-primary delete', 'name' => 'login-button', 'style' => 'background: #bf0000;border: none;']) ?>
    </div>
<?php endif; ?>

<?php ActiveForm::end(); ?>

<script>
    $('.delete').on('click', function () {
        $.ajax({
            type: "POST",
            url: document.location,
            data: {del: 1},
            success: function(res){
                document.location.href="/";
            }
        });
    });

</script>
