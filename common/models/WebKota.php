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
            [['kotaNama'], 'unique','message' => 'Nama Kota Sudah Tersedia'],
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
            'kotaProvinsiID' => 'Nama Provinsi',
            'kotaNama' => 'Nama Kota',
            'kotaStatus' => 'Status',
        ];
    }
}
