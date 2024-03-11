<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Xe */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="xe-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'hieu_xe')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hang_xe')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nam_san_xuat')->dropDownList(
    range(date('Y') - 100, date('Y')),
    ['prompt' => 'Chọn năm']
) ?>

    <?= $form->field($model, 'bien_so_xe')->textInput() ?>

    <?= $form->field($model, 'file')->fileInput()->label('Hình ảnh xe') ?>

    <?php
    // JavaScript code to store the value of hinh_xe when the form is submitted
    $js = <<<JS
    $(document).on('beforeSubmit', 'form#{$form->id}', function(e){
        e.preventDefault(); // Prevent form submission
        var hinh_xe_value = $('#hinh_xe_input').val(); // Get the value of hinh_xe
        // Store the value of hinh_xe in localStorage
        localStorage.setItem('hinh_xe_value', hinh_xe_value);
        // Now you can submit the form
        this.submit();
    });
JS;
    $this->registerJs($js);
    ?>

    <?php if (!Yii::$app->request->isAjax){ ?>
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    <?php } ?>

    <?php ActiveForm::end(); ?>

</div>
