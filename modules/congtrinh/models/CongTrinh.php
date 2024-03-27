<?php

namespace app\modules\congtrinh\models;

use Yii;
use app\modules\congtrinh\models\base\CongTrinhBase;

class CongTrinh extends CongTrinhBase
{

    /**
    * $model->ngay
    */
    public function isParent($model)
    {
        // Kiểm tra xem có tồn tại bất kỳ công trình con nào có p_id trùng với id của công trình hiện tại không
        return CongTrinh::find()->where(['p_id' => $model->id])->exists();
    }
}