<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\vattu\models\VatTu */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vat-tu-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ten_vat_tu')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'so_luong')->textInput() ?>

    <?= $form->field($model, 'don_gia')->textInput() ?>

<<<<<<< HEAD
    <?= $form->field($model, 'id_loai_vat_tu')->dropDownList(
    \yii\helpers\ArrayHelper::map(\app\modules\vattu\models\LoaiVatTu::find()->all(), 'id', 'ten_loai_vat_tu'),
    ['prompt' => 'Chọn Loại vật tư']
)->label('Loại vật tư') ?>

 
=======
    <?= $form->field($model, 'id_loai_vat_tu')->textInput() ?>

    <?= $form->field($model, 'create_date')->textInput() ?>

    <?= $form->field($model, 'create_user')->textInput() ?>
>>>>>>> 215b5c68c707533558d52bf6bb1b1aa4b19dc5d2

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
