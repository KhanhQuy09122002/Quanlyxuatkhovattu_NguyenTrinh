<?php
namespace app\modules\congtrinh\models\base;
use app\modules\congtrinh\models\CongTrinh;
use Yii;

/**
 * This is the model class for table "cong_trinh".
 *
 * @property int $id
 * @property string $ten_cong_trinh
 * @property string|null $dia_diem
 * @property string|null $tg_bat_dau
 * @property string|null $tg_ket_thuc
 * @property int|null $p_id
 * @property int|null $trang_thai
 * @property string|null $create_date
 * @property int|null $create_user
 *
 * @property PhieuXuatKho[] $phieuXuatKhos
 * @property VatTuBocTach[] $vatTuBocTaches
 */
class CongTrinhBase extends \app\models\CongTrinh
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cong_trinh';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ten_cong_trinh'], 'required'],
            [['tg_bat_dau', 'tg_ket_thuc', 'create_date'], 'safe'],
            [['p_id', 'create_user'], 'integer'],
            [['ten_cong_trinh', 'dia_diem'], 'string', 'max' => 255],
            [['trang_thai'], 'string', 'max' => 15],
            [['p_id'], 'exist', 'skipOnError' => true, 'targetClass' => CongTrinh::class, 'targetAttribute' => ['p_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ten_cong_trinh' => 'Tên Công Trình',
            'dia_diem' => 'Địa Điểm',
            'tg_bat_dau' => 'Thời Gian Bắt Đầu',
            'tg_ket_thuc' => 'Thời Gian Kết Thúc',
            'p_id' => 'P ID',
            'trang_thai' => 'Trạng Thái',
            'create_date' => 'Ngày Tạo',
            'create_user' => 'Giờ Tạo',
        ];
    }

    public function beforeSave($insert) {
        if ($this->isNewRecord) {
            $this->create_date = date('Y-m-d H:i:s');
            $this->create_user = Yii::$app->user->id;
        }
        return parent::beforeSave($insert);
    }
    public function getCongTrinh()
    {
        return $this->hasOne(CongTrinh::class, ['id' => 'p_id']);
    }
}
