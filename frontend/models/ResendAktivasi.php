<?php

namespace frontend\models;

use Yii;
use yii\base\Model;

/**
 * This is the model class for table "web_provinsi".
 *
 * @property string $email
 */
class ResendAktivasi extends Model
{
    public $email;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['email'], 'string'],
            [['email'], 'required'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'email' => 'Email Akun',
        ];
    }
}
