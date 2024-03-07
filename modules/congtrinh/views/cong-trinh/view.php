<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Congtrinh */
?>
<div class="congtrinh-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'ten_cong_trinh',
            'dia_diem',
            'tg_bat_dau',
            'tg_ket_thuc',
            'p_id',
            'trang_thai',
            'create_date',
            'create_user',
        ],
    ]) ?>

</div>
