<?php

namespace app\modules\vattu\models\base;

use app\modules\vattu\models\LoaiVatTu;

use Yii;

/**
 * This is the model class for table "vat_tu".
 *
 * @property int $id
 * @property string $ten_vat_tu
 * @property float $so_luong
 * @property float $don_gia
 * @property int $id_loai_vat_tu
 * @property string $create_date
 * @property int $create_user
 *
 * @property LoaiVatTu $loaiVatTu
 * @property VatTuBocTach[] $vatTuBocTaches
 * @property VatTuXuat[] $vatTuXuats
 */
class VatTuBase extends \app\models\Vattu
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ten_vat_tu', 'so_luong', 'don_gia', 'id_loai_vat_tu'], 'required'],
            [['so_luong', 'don_gia'], 'number'],
            [['id_loai_vat_tu', 'create_user'], 'integer'],
            [['create_date'], 'safe'],
            [['ten_vat_tu'], 'string', 'max' => 255],
            [['id_loai_vat_tu'], 'exist', 'skipOnError' => true, 'targetClass' => LoaiVatTuBase::class, 'targetAttribute' => ['id_loai_vat_tu' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ten_vat_tu' => 'Tên Vật Tư',
            'so_luong' => 'Số Lượng',
            'don_gia' => 'Đơn Giá',
            'id_loai_vat_tu' => 'Id Loại Vật Tư',
            'create_date' => 'Ngày Tạo',
            'create_user' => 'Người Tạo',
        ];
    }
    
    /**
     * {@inheritdoc}
     */
    public function beforeSave($insert) {
        if ($this->isNewRecord) {
            $this->create_date = date('Y-m-d H:i:s');
            $this->create_user = Yii::$app->user->id;
        }
        return parent::beforeSave($insert);
    }

    public function getLoaiVatTu()
    {
        return $this->hasOne(LoaiVatTu::class, ['id' => 'id_loai_vat_tu']);
    }

}
