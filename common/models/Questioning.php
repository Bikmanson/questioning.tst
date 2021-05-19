<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "questioning".
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $region
 * @property string $city
 * @property int $sex
 * @property int $rating
 * @property string $comment
 * @property int $created_at
 * @property int $updated_at
 */
class Questioning extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'questioning';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'email', 'phone', 'region', 'city', 'sex', 'rating', 'comment'], 'required'],
            [['sex', 'rating', 'created_at', 'updated_at'], 'integer'],
            [['comment'], 'string'],
            [['email'], 'email'],
            [['name', 'region', 'city'], 'string', 'max' => 255],
            [['phone'], 'string', 'max' => 50],
        ];
    }

    public function behaviors()
    {
        return [
            'timestamp' => TimestampBehavior::class
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя',
            'email' => 'Email',
            'phone' => 'Номер телефона',
            'region' => 'Регион',
            'city' => 'Город',
            'sex' => 'Пол',
            'rating' => 'Оценка',
            'comment' => 'Комментарий',
            'created_at' => 'Дата создания',
            'updated_at' => 'Дата обновления',
        ];
    }

    public static function getSexMap()
    {
        return [
            1 => 'Мужской',
            2 => 'Женский'
        ];
    }
}
