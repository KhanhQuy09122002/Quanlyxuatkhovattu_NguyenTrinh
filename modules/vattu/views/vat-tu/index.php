<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use johnitvn\ajaxcrud\CrudAsset; 
use johnitvn\ajaxcrud\BulkButtonWidget;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\vattu\models\search\VatTuSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

<<<<<<< HEAD
$this->title = 'Vật tư';
=======
$this->title = 'Vat Tus';
>>>>>>> 215b5c68c707533558d52bf6bb1b1aa4b19dc5d2
$this->params['breadcrumbs'][] = $this->title;

CrudAsset::register($this);

?>
<div class="vat-tu-index">
    <div id="ajaxCrudDatatable">
        <?=GridView::widget([
            'id'=>'crud-datatable',
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'pjax'=>true,
            'columns' => require(__DIR__.'/_columns.php'),
            'toolbar'=> [
                ['content'=>
                    Html::a('<i class="glyphicon glyphicon-plus"></i>', ['create'],
                    ['role'=>'modal-remote','title'=> 'Create new Vat Tus','class'=>'btn btn-default']).
                    Html::a('<i class="glyphicon glyphicon-repeat"></i>', [''],
<<<<<<< HEAD
                    ['data-pjax'=>1, 'class'=>'btn btn-default', 'title'=>'Cập nhật']).
=======
                    ['data-pjax'=>1, 'class'=>'btn btn-default', 'title'=>'Reset Grid']).
>>>>>>> 215b5c68c707533558d52bf6bb1b1aa4b19dc5d2
                    '{toggleData}'.
                    '{export}'
                ],
            ],          
            'striped' => true,
            'condensed' => true,
            'responsive' => true,          
            'panel' => [
                'type' => 'primary', 
<<<<<<< HEAD
                'heading' => '<i class="glyphicon glyphicon-list"></i> Danh sách vật tư',
                'before'=>'<em>* Resize table columns just like a spreadsheet by dragging the column edges.</em>',
                'after'=>BulkButtonWidget::widget([
                            'buttons'=>Html::a('<i class="glyphicon glyphicon-trash"></i>&nbsp; Xóa tất cả',
=======
                'heading' => '<i class="glyphicon glyphicon-list"></i> Vat Tus listing',
                'before'=>'<em>* Resize table columns just like a spreadsheet by dragging the column edges.</em>',
                'after'=>BulkButtonWidget::widget([
                            'buttons'=>Html::a('<i class="glyphicon glyphicon-trash"></i>&nbsp; Delete All',
>>>>>>> 215b5c68c707533558d52bf6bb1b1aa4b19dc5d2
                                ["bulk-delete"] ,
                                [
                                    "class"=>"btn btn-danger btn-xs",
                                    'role'=>'modal-remote-bulk',
                                    'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
                                    'data-request-method'=>'post',
                                    'data-confirm-title'=>'Are you sure?',
                                    'data-confirm-message'=>'Are you sure want to delete this item'
                                ]),
                        ]).                        
                        '<div class="clearfix"></div>',
            ]
        ])?>
    </div>
</div>
<?php Modal::begin([
    "id"=>"ajaxCrudModal",
    "footer"=>"",// always need it for jquery plugin
])?>
<?php Modal::end(); ?>
