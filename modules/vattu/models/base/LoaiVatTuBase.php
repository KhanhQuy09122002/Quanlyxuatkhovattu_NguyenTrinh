<?php

namespace app\modules\vattu\models\base;

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
            [['ten_loai_vat_tu', 'create_date', 'create_user'], 'required'],
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
            'ten_loai_vat_tu' => 'Ten Loai Vat Tu',
            'create_date' => 'Create Date',
            'create_user' => 'Create User',
        ];
    }

}
