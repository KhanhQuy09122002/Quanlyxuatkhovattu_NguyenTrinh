<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Congtrinh */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="congtrinh-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ten_cong_trinh')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dia_diem')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tg_bat_dau')->textInput() ?>

    <?= $form->field($model, 'tg_ket_thuc')->textInput() ?>

    <?= $form->field($model, 'p_id')->textInput() ?>

    <?= $form->field($model, 'trang_thai')->textInput(['maxlength' => true]) ?>

 

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
