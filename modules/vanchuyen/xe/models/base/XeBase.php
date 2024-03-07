<?php

namespace app\modules\vanchuyen\xe\models\base;

use Yii;

/**
 * This is the model class for table "xe".
 *
 * @property int $id
 * @property string $hieu_xe
 * @property string|null $hang_xe
 * @property string|null $nam_san_xuat
 * @property string $bien_so_xe
 * @property string|null $hinh_xe
 * @property string|null $create_date
 * @property int|null $create_user
 *
 * @property PhieuXuatKho[] $phieuXuatKhos
 */
class XeBase extends \app\models\Xe
{
    /**
    
     
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'xe';
    }
    public $imageFile;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['hieu_xe', 'bien_so_xe'], 'required'],
            [['nam_san_xuat', 'create_date'], 'safe'],
            [['create_user'], 'integer'],
            [['hieu_xe', 'hang_xe', 'hinh_xe','bien_so_xe'], 'string', 'max' => 255],
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'hieu_xe' => 'Hiệu Xe',
            'hang_xe' => 'Hãng Xe',
            'nam_san_xuat' => 'Năm Sản Xuất',
            'bien_so_xe' => 'Biển Số Xe',
            'hinh_xe' => 'Hình Xe',
            'create_date' => 'Ngày Tạo',
            'create_user' => 'Người Tạo',
        ];
    }

    /**
     * Gets query for [[PhieuXuatKhos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function beforeSave($insert) {
        if ($this->isNewRecord) {
            $this->create_date = date('Y-m-d H:i:s');
            $this->create_user = Yii::$app->user->id;
        }
        return parent::beforeSave($insert);
    }
}
