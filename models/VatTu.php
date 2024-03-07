<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vat_tu".
 *
 * @property int $id
 * @property string $ten_vat_tu
 * @property float $so_luong
 * @property float $don_gia
 * @property int $id_loai_vat_tu
 * @property string|null $create_date
 * @property int|null $create_user
 *
 * @property LoaiVatTu $loaiVatTu
 * @property VatTuBocTach[] $vatTuBocTaches
 * @property VatTuXuat[] $vatTuXuats
 */
class VatTu extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vat_tu';
    }

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
            [['id_loai_vat_tu'], 'exist', 'skipOnError' => true, 'targetClass' => LoaiVatTu::class, 'targetAttribute' => ['id_loai_vat_tu' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ten_vat_tu' => 'Ten Vat Tu',
            'so_luong' => 'So Luong',
            'don_gia' => 'Don Gia',
            'id_loai_vat_tu' => 'Id Loai Vat Tu',
            'create_date' => 'Create Date',
            'create_user' => 'Create User',
        ];
    }

    /**
     * Gets query for [[LoaiVatTu]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLoaiVatTu()
    {
        return $this->hasOne(LoaiVatTu::class, ['id' => 'id_loai_vat_tu']);
    }

    /**
     * Gets query for [[VatTuBocTaches]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVatTuBocTaches()
    {
        return $this->hasMany(VatTuBocTach::class, ['id_vat_tu' => 'id']);
    }

    /**
     * Gets query for [[VatTuXuats]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVatTuXuats()
    {
        return $this->hasMany(VatTuXuat::class, ['id_vat_tu' => 'id']);
    }
}
