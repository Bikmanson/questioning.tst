<?php

use common\models\Questioning;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Questioning */

$this->title = "Анкета: {$model->id}";
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="questioning-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'name',
            'email:email',
            'phone',
            'region',
            'city',
            [
                'attribute' => 'sex',
                'value' => function ($model) {
                    return Questioning::getSexMap()[$model->sex];
                }
            ],
            'rating',
            'comment:ntext',
            'created_at:date',
            'updated_at:date',
        ],
    ]) ?>

</div>
