<?php

use yii\widgets\DetailView;

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
            'nam_san_xuat',
            'bien_so_xe',
            'hinh_xe',
            'create_date',
            'create_user',
        ],
    ]) ?>

</div>
