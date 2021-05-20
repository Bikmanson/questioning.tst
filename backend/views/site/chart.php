<?php

use miloschuman\highcharts\Highcharts;

/**
 * @var $pieData array
 * @var $categories array
 * @var $columnData array
 */

$this->title = "Анкетирование";
?>

<?= Highcharts::widget([
    'scripts' => ['modules/exporting'],
    'options' => [
        'title' => ['text' => 'Пирог'],
        'chart' => [
            'type' => 'pie'
        ],
        'yAxis' => [
            'title' => ['text' => 'Оценка']
        ],
        'series' => [
            [
                'name' => 'Количество',
                'data' => array_values($pieData)
            ]
        ]
    ]
]) ?>

    <hr style="margin: 100px -100px">

<?= Highcharts::widget([
    'scripts' => ['modules/exporting'],
    'options' => [
        'title' => [
            'text' => 'Колонки',
        ],
        'xAxis' => [
            'title' => ['text' => 'Оценки'],
            'categories' => $categories,
        ],
        'yAxis' => [
            'title' => ['text' => 'Количество']
        ],
        'series' => [
            [
                'type' => 'column',
                'name' => 'Статистика оценок',
                'data' => array_values($columnData),
            ],
        ],
    ]
]);
