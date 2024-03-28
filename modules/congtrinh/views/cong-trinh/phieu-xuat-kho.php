

<?php
use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = 'Danh sách Phiếu Xuất Kho';
$this->params['breadcrumbs'][] = ['label' => 'Công Trình', 'url' => ['cong-trinh/index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<h1><?= Html::encode($this->title) ?></h1>

<table class="table table-striped">
    <thead>
        <tr>
            <th>ID Phiếu Xuất Kho</th>
            <th>Thời Gian Yêu Cầu</th>
            <th>Lý Do</th>
           
        </tr>
    </thead>
    <tbody>
        <?php foreach ($phieuXuatKhoList as $phieuXuatKho): ?>
            <tr>
                <td><?= Html::encode($phieuXuatKho->id) ?></td>
                <td><?= Html::encode($phieuXuatKho->thoi_gian_yeu_cau) ?></td>
                <td><?= Html::encode($phieuXuatKho->ly_do) ?></td>
                
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

