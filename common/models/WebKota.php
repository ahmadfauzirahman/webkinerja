<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "web_kota".
 *
 * @property int $kotaID
 * @property int $kotaProvinsiID
 * @property string $kotaNama
 * @property string $kotaStatus
 */
class WebKota extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'web_kota';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kotaProvinsiID', 'kotaNama'], 'required'],
            [['kotaProvinsiID'], 'integer'],
            [['kotaStatus'], 'string'],
            [['kotaNama'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'kotaID' => 'ID Kota',
            'kotaProvinsiID' => 'ID Provinsi',
            'kotaNama' => 'Nama Kota',
            'kotaStatus' => 'Status',
        ];
    }
}
