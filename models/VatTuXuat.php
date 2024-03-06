<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vat_tu_xuat".
 *
 * @property int $id
 * @property float $so_luong_yeu_cau
 * @property float|null $so_luong_duoc_duyet
 * @property int $id_phieu_xuat_kho
 * @property int $id_vat_tu
 * @property string|null $ghi_chu
 * @property int|null $id_nguoi_duyet
 * @property string $trang_thai
 * @property string $create_date
 * @property int $create_user
 *
 * @property NguoiDung $nguoiDuyet
 * @property PhieuXuatKho $phieuXuatKho
 * @property VatTu $vatTu
 */
class VatTuXuat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vat_tu_xuat';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['so_luong_yeu_cau', 'id_phieu_xuat_kho', 'id_vat_tu', 'trang_thai', 'create_date', 'create_user'], 'required'],
            [['so_luong_yeu_cau', 'so_luong_duoc_duyet'], 'number'],
            [['id_phieu_xuat_kho', 'id_vat_tu', 'id_nguoi_duyet', 'create_user'], 'integer'],
            [['ghi_chu'], 'string'],
            [['create_date'], 'safe'],
            [['trang_thai'], 'string', 'max' => 15],
            [['id_nguoi_duyet'], 'exist', 'skipOnError' => true, 'targetClass' => NguoiDung::class, 'targetAttribute' => ['id_nguoi_duyet' => 'id']],
            [['id_phieu_xuat_kho'], 'exist', 'skipOnError' => true, 'targetClass' => PhieuXuatKho::class, 'targetAttribute' => ['id_phieu_xuat_kho' => 'id']],
            [['id_vat_tu'], 'exist', 'skipOnError' => true, 'targetClass' => VatTu::class, 'targetAttribute' => ['id_vat_tu' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'so_luong_yeu_cau' => 'So Luong Yeu Cau',
            'so_luong_duoc_duyet' => 'So Luong Duoc Duyet',
            'id_phieu_xuat_kho' => 'Id Phieu Xuat Kho',
            'id_vat_tu' => 'Id Vat Tu',
            'ghi_chu' => 'Ghi Chu',
            'id_nguoi_duyet' => 'Id Nguoi Duyet',
            'trang_thai' => 'Trang Thai',
            'create_date' => 'Create Date',
            'create_user' => 'Create User',
        ];
    }

    /**
     * Gets query for [[NguoiDuyet]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNguoiDuyet()
    {
        return $this->hasOne(NguoiDung::class, ['id' => 'id_nguoi_duyet']);
    }

    /**
     * Gets query for [[PhieuXuatKho]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPhieuXuatKho()
    {
        return $this->hasOne(PhieuXuatKho::class, ['id' => 'id_phieu_xuat_kho']);
    }

    /**
     * Gets query for [[VatTu]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVatTu()
    {
        return $this->hasOne(VatTu::class, ['id' => 'id_vat_tu']);
    }
}
