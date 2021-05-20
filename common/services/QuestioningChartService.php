<?php


namespace common\services;


use common\models\Questioning;

class QuestioningChartService
{
    public static function getPieData(array $models)
    {
        $data = [];
        $ratingMap = self::getRatingMap($models);

        $alreadyInData = [];
        foreach ($models as $index => $model) {
            if (in_array($model->rating, $alreadyInData)) continue;
            $alreadyInData[] = $model->rating;

            $data[$index]['name'] = "Оценка: {$model->rating}";
            $data[$index]['y'] = count($ratingMap[$model->rating]);
        }

        return $data;
    }

    public static function getColumnData(array $models)
    {
        $rates = Questioning::getRatingRange();

        $data = [];
        $ratingMap = self::getRatingMap($models);

        foreach ($rates as $rate) {
            if (array_key_exists($rate, $data)) continue;

            $data[$rate] = isset($ratingMap[$rate]) ? count($ratingMap[$rate]) : 0;
        }

        return $data;
    }

    private static function getRatingMap(array $models)
    {
        $ratingMap = [];

        foreach ($models as $model) {
            $ratingMap[$model->rating][] = $model->name;
        }

        return $ratingMap;
    }
}