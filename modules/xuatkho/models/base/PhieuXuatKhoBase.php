<?php

namespace app\modules\xuatkho\models\base;
use app\modules\congtrinh\models\CongTrinh;
use Yii;
use app\models\User;
use app\modules\vanchuyen\taixe\models\TaiXe;
use app\modules\vanchuyen\xe\models\Xe;
/**
 * This is the model class for table "phieu_xuat_kho".
 *
 * @property int $id
 * @property string $thoi_gian_yeu_cau
 * @property int $id_cong_trinh
 * @property int $id_bo_phan_yc
 * @property string $ly_do
 * @property int $id_tai_xe
 * @property int $id_xe
 * @property string|null $nguoi_ky
 * @property int|null $id_nguoi_duyet
 * @property float $thanh_tien
 * @property string $trang_thai
 * @property string|null $create_date
 * @property int|null $create_user
 *
 * @property User $boPhanYc
 * @property CongTrinh $congTrinh
 * @property User $nguoiDuyet
 * @property TaiXe $taiXe
 * @property VatTuXuat[] $vatTuXuats
 * @property Xe $xe
 */
class PhieuXuatKhoBase extends \app\models\PhieuXuatKho
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'phieu_xuat_kho';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['thoi_gian_yeu_cau', 'id_cong_trinh', 'id_bo_phan_yc', 'ly_do', 'id_tai_xe', 'id_xe', 'thanh_tien', 'trang_thai'], 'required'],
            [['thoi_gian_yeu_cau', 'create_date'], 'safe'],
            [['id_cong_trinh', 'id_bo_phan_yc', 'id_tai_xe', 'id_xe', 'id_nguoi_duyet', 'create_user'], 'integer'],
            [['ly_do', 'nguoi_ky'], 'string'],
            [['thanh_tien'], 'number'],
            [['trang_thai'], 'string', 'max' => 12],
            [['id_cong_trinh'], 'exist', 'skipOnError' => true, 'targetClass' => CongTrinh::class, 'targetAttribute' => ['id_cong_trinh' => 'id']],
            [['id_nguoi_duyet'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['id_nguoi_duyet' => 'id']],
            [['id_tai_xe'], 'exist', 'skipOnError' => true, 'targetClass' => TaiXe::class, 'targetAttribute' => ['id_tai_xe' => 'id']],
            [['id_xe'], 'exist', 'skipOnError' => true, 'targetClass' => Xe::class, 'targetAttribute' => ['id_xe' => 'id']],
            [['id_bo_phan_yc'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['id_bo_phan_yc' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'thoi_gian_yeu_cau' => 'Thoi Gian Yeu Cau',
            'id_cong_trinh' => 'Id Cong Trinh',
            'id_bo_phan_yc' => 'Id Bo Phan Yc',
            'ly_do' => 'Ly Do',
            'id_tai_xe' => 'Id Tai Xe',
            'id_xe' => 'Id Xe',
            'nguoi_ky' => 'Nguoi Ky',
            'id_nguoi_duyet' => 'Id Nguoi Duyet',
            'thanh_tien' => 'Thanh Tien',
            'trang_thai' => 'Trang Thai',
            'create_date' => 'Create Date',
            'create_user' => 'Create User',
        ];
    }

    public function beforeSave($insert) {
        if ($this->isNewRecord) {
            $this->create_date = date('Y-m-d H:i:s');
            $this->create_user = Yii::$app->user->id;
        }
        return parent::beforeSave($insert);
    }
}
