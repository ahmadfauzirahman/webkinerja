<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "web_setting".
 *
 * @property int $settingID
 * @property string $settingSiteTitle
 * @property string $settingSiteDescription
 * @property string $settingMetaKeyword
 * @property string $settingCredits
 * @property string $settingFoto
 */
class WebSetting extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'web_setting';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['settingSiteDescription', 'settingMetaKeyword'], 'string'],
            [['settingSiteTitle', 'settingCredits', 'settingFoto'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'settingID' => 'Setting ID',
            'settingSiteTitle' => 'Setting Site Title',
            'settingSiteDescription' => 'Setting Site Description',
            'settingMetaKeyword' => 'Setting Meta Keyword',
            'settingCredits' => 'Setting Credits',
            'settingFoto' => 'Setting Foto',
        ];
    }
}
