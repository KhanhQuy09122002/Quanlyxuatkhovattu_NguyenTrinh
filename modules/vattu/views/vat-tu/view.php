<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\vattu\models\VatTu */
?>
<div class="vat-tu-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'ten_vat_tu',
            'so_luong',
            'don_gia',
            'id_loai_vat_tu',
            'create_date',
            'create_user',
        ],
    ]) ?>

</div>
