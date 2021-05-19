<?php

use common\models\Questioning;
use kartik\daterange\DateRangePicker;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\QuestioningSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Анкеты';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="questioning-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'name',
            'email:email',
            'phone',
            'region',
            'city',
            [
                'attribute' => 'sex',
                'filter' => Questioning::getSexMap(),
                'value' => function ($model) {
                    return Questioning::getSexMap()[$model->sex];
                }
            ],
            'rating',
            'comment:ntext',
            [
                'attribute' => 'created_at',
                'filter' => DateRangePicker::widget([
                    'model' => $searchModel,
                    'attribute' => 'createdAt',
                    'convertFormat' => true,
                    'startAttribute' => 'createdAtStart',
                    'endAttribute' => 'createdAtEnd',
                    'pluginOptions' => [
                        'locale' => [
                            'format' => 'd-m-Y',
                            'applyLabel' => 'Применить',
                            'cancelLabel' => 'Отменить'
                        ],
                    ],
                    'pluginEvents' => [
                        'apply.daterangepicker' => 'function(ev, picker) { rangesearch.submit(); }',
                    ],
                ]),
                'value' => function ($model) {
                    return Yii::$app->formatter->asDate($model->created_at);
                }
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {delete}'
            ],
        ],
    ]); ?>


</div>
