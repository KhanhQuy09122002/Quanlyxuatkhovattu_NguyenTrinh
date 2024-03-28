<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use johnitvn\ajaxcrud\CrudAsset; 
use johnitvn\ajaxcrud\BulkButtonWidget;
use yii\helpers\ArrayHelper;

use yii\web\JsExpression;
/* @var $this yii\web\View */
/* @var $searchModel app\models\CongTrinhSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
use app\modules\congtrinh\models\CongTrinh;
$this->title = 'Công Trình';
$this->params['breadcrumbs'][] = $this->title;

CrudAsset::register($this);

?>
<div class="congtrinh-index">
    <div id="ajaxCrudDatatable">
        <?=GridView::widget([
            'id'=>'crud-datatable',
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'pjax'=>true,
            'striped' => true,
            'hover' => true,
            'panel' => ['type' => 'primary', 'heading' => 'Grid Grouping Example'],
            'toggleDataContainer' => ['class' => 'btn-group mr-2 me-2'],
            'columns' => [
                ['class' => 'kartik\grid\SerialColumn'],
               
               
                [
                    'attribute' => 'ten_cong_trinh',
                    'contentOptions' => ['class' => 'name-column'],
                    'pageSummary' => 'Page Summary',
                    'pageSummaryOptions' => ['class' => 'text-right text-end'],
                ],
                [
                    'attribute' => 'dia_diem',
                    'width' => '150px',
                  //  'hAlign' => 'right',
                    'pageSummary' => true
                    
                    
                ],
                [
                    'attribute' => 'tg_bat_dau',
                    'format' => ['date', 'php:d-m-Y'], 
                    'width' => '150px',
                  //  'hAlign' => 'right',
                   
                    'pageSummary' => true
                ],
                [
                    'attribute' => 'tg_ket_thuc',
                    'format' => ['date', 'php:d-m-Y'], 
                    'width' => '150px',
                   // 'hAlign' => 'right',
                   
                    'pageSummary' => true
                ],
              
            
              
                [
                    'class' => 'kartik\grid\ActionColumn',
                    'header' => 'Hành động',
                    'template' => '{view} {update} {delete}',
                    'buttons' => [
                        'view' => function ($url, $model, $key) {
                            return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, [
                                'role' => 'modal-remote',
                                'title' => Yii::t('app', 'View'),
                                'data-toggle' => 'tooltip',
                                'class' => 'btn btn-primary btn-xs',
                            ]);
                        },
                        'update' => function ($url, $model, $key) {
                            return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
                                'role' => 'modal-remote',
                                'title' => Yii::t('app', 'Update'),
                                'data-toggle' => 'tooltip',
                                'class' => 'btn btn-warning btn-xs',
                            ]);
                        },
                        'delete' => function ($url, $model, $key) {
                            return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                                'role' => 'modal-remote',
                                'title' => Yii::t('app', 'Delete'),
                                'data-confirm' => false,
                                'data-method' => false,
                                'data-request-method' => 'post',
                                'data-toggle' => 'tooltip',
                                'class' => 'btn btn-danger btn-xs',
                                'data-confirm-title' => Yii::t('app', 'Are you sure?'),
                                'data-confirm-message' => Yii::t('app', 'Are you sure want to delete this item'),
                            ]);
                        },
                    ],
                    'urlCreator' => function ($action, $model, $key, $index) {
                        if ($action === 'view') {
                            $url = Url::to(['view', 'id' => $model->id]);
                            return $url;
                        }
                        if ($action === 'update') {
                            $url = Url::to(['update', 'id' => $model->id]);
                            return $url;
                        }
                        if ($action === 'delete') {
                            $url = Url::to(['delete', 'id' => $model->id]);
                            return $url;
                        }
                    },
                    'viewOptions' => [
                        'role' => 'modal-remote',
                        'title' => Yii::t('app', 'View'),
                        'data-toggle' => 'tooltip',
                        'class' => 'btn btn-primary btn-xs',
                    ],
                    'updateOptions' => [
                        'role' => 'modal-remote',
                        'title' => Yii::t('app', 'Update'),
                        'data-toggle' => 'tooltip',
                        'class' => 'btn btn-warning btn-xs',
                    ],
                    'deleteOptions' => [
                        'role' => 'modal-remote',
                        'title' => Yii::t('app', 'Delete'),
                        'data-confirm' => false,
                        'data-method' => false,
                        'data-request-method' => 'post',
                        'data-toggle' => 'tooltip',
                        'class' => 'btn btn-danger btn-xs',
                        'data-confirm-title' => Yii::t('app', 'Are you sure?'),
                        'data-confirm-message' => Yii::t('app', 'Are you sure want to delete this item'),
                    ],
                ],      
               
            ],
           
            'toolbar'=> [
                ['content'=>
                    Html::a('<i class="glyphicon glyphicon-plus"></i> ' . Yii::t('app', 'Tạo mới'), ['create'],
                    ['role'=>'modal-remote','title'=> Yii::t('app', 'Create new') . ' Congtrinhs','class'=>'btn btn-default']).
                    Html::a('<i class="glyphicon glyphicon-repeat"></i> ' . Yii::t('app', 'Trở lại'), [''],
                    ['data-pjax'=>1, 'class'=>'btn btn-default', 'title'=>Yii::t('app', 'Reset Grid')]).
                    '{toggleData}'.
                    '{export}'
                ],
            ],    
            'rowOptions' => function ($model, $key, $index, $grid) {
                if ($model->p_id) {
                    return ['class' => 'child-row', 'data-parent-id' => $model->p_id, 'style' => 'display: none;'];
                } else {
                    return ['class' => 'parent-row'];
                }
            },
            'showFooter' => true,
            'footerRowOptions' => ['style' => 'display: none;'],
            'striped' => true,
            'condensed' => true,
            'responsive' => true,          
            'panel' => [
                'type' => 'primary', 
                'heading' => '<i class="glyphicon glyphicon-list"></i> Danh sách Công trình',
                //'before'=>'<em>* Resize table columns just like a spreadsheet by dragging the column edges.</em>',
                'after'=>BulkButtonWidget::widget([
                            'buttons'=>Html::a('<i class="glyphicon glyphicon-trash"></i>&nbsp; ' . Yii::t('app', 'Xóa tất cả'),
                                ["bulk-delete"] ,
                                [
                                    "class"=>"btn btn-danger btn-xs",
                                    'role'=>'modal-remote-bulk',
                                    'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
                                    'data-request-method'=>'post',
                                    'data-confirm-title'=>Yii::t('app', 'Are you sure?'),
                                    'data-confirm-message'=>Yii::t('app', 'Are you sure want to delete this item')                                ]),
                        ]).                        
                        '<div class="clearfix"></div>',
            ]
        ])?>
    </div>
</div>
<?php
$this->registerJs(new JsExpression('
    $(document).on("click", ".name-column", function() {
        var parentId = $(this).closest(".parent-row").data("key"); 
        var hasChild = $(".child-row[data-parent-id="+parentId+"]").length > 0;
        if (hasChild) {
            $(".child-row[data-parent-id="+parentId+"]").toggle();
            $(".child-row[data-parent-id="+parentId+"]").css("background-color", "yellow");
        } else {
            // Replace the static URL with a dynamic URL generated by Yii
            var url = "' . Url::to(["phieu-xuat-kho"]) . '";
            url += "?id_cong_trinh=" + parentId;
            window.location.href = url;
        }
    });

    $(".child-row .name-column").each(function() {
        $(this).on("click", function() {
            var childId = $(this).closest(".child-row").data("key"); 
            // Replace the static URL with a dynamic URL generated by Yii
            var url = "' . Url::to(["phieu-xuat-kho"]) . '";
            url += "?id_cong_trinh=" + childId;
            window.location.href = url;
        });
    });
'));
?>
<?php Modal::begin([
    "id"=>"ajaxCrudModal",
    "footer"=>"",// always need it for jquery plugin
])?>
<?php Modal::end(); ?>
