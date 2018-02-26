<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "web_jenjang_pendidikan".
 *
 * @property int $jenjangPendidikanID
 * @property string $jenjangPendidikanNama
 * @property string $jenjangPendidikanStatus
 */
class WebJenjangPendidikan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'web_jenjang_pendidikan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['jenjangPendidikanNama'], 'required'],
            [['jenjangPendidikanNama', 'jenjangPendidikanStatus'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'jenjangPendidikanID' => 'ID Jenjang Pendidikan',
            'jenjangPendidikanNama' => 'Jenjang Pendidikan',
            'jenjangPendidikanStatus' => 'Status',
        ];
    }
}
