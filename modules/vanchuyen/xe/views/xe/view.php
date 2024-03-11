<?php

use yii\widgets\DetailView;
use yii\helpers\Html;
/* @var $this yii\web\View */
/* @var $model app\models\Xe */
?>
<div class="xe-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'hieu_xe',
            'hang_xe',
              [
                'attribute' => 'nam_san_xuat',
                'value' => function ($model) {
                    return $model->nam_san_xuat; 
                },
            ],
            'bien_so_xe',
             [
                
                'attribute' => 'hinh_xe',
                'label' => 'Hình xe',
                'format' => 'html', 
                'value' => function ($model) {
                    $imageUrl = Yii::$app->urlManager->createUrl($model->hinh_xe);
                    return Html::img($imageUrl, ['class' => 'img-thumbnail', 'style' => 'width:100px;height:100px;']);
                },
            ],
            'create_date',
            'create_user',
        ],
    ]) ?>

</div>
