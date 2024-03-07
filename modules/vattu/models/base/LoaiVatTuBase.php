<?php

namespace app\modules\vattu\models\base;
<<<<<<< HEAD
use app\modules\vattu\models\VatTu;
=======

>>>>>>> 215b5c68c707533558d52bf6bb1b1aa4b19dc5d2
use Yii;

/**
 * This is the model class for table "loai_vat_tu".
 *
 * @property int $id
 * @property string $ten_loai_vat_tu
 * @property string $create_date
 * @property int $create_user
 *
 * @property VatTu[] $vatTus
 */
class LoaiVatTuBase extends \app\models\LoaiVatTu
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
<<<<<<< HEAD
            [['ten_loai_vat_tu'], 'required'],
=======
            [['ten_loai_vat_tu', 'create_date', 'create_user'], 'required'],
>>>>>>> 215b5c68c707533558d52bf6bb1b1aa4b19dc5d2
            [['create_date'], 'safe'],
            [['create_user'], 'integer'],
            [['ten_loai_vat_tu'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
<<<<<<< HEAD
            'ten_loai_vat_tu' => 'Tên Loại Vật Tư',
            'create_date' => 'Ngày Tạo',
            'create_user' => 'Người Tạo',
        ];
    }
    public function beforeSave($insert) {
        if ($this->isNewRecord) {
            $this->create_date = date('Y-m-d H:i:s');
            $this->create_user = Yii::$app->user->id;
        }
        return parent::beforeSave($insert);
    }
    public function getVatTus()
    {
        return $this->hasMany(VatTu::class, ['id_loai_vat_tu' => 'id']);
    }
=======
            'ten_loai_vat_tu' => 'Ten Loai Vat Tu',
            'create_date' => 'Create Date',
            'create_user' => 'Create User',
        ];
    }

>>>>>>> 215b5c68c707533558d52bf6bb1b1aa4b19dc5d2
}
