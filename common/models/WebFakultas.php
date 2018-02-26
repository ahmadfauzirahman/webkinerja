<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "web_fakultas".
 *
 * @property int $fakultasID
 * @property string $fakultasNama
 * @property int $fakultasUnivID
 * @property string $fakultasStatus
 */
class WebFakultas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'web_fakultas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fakultasNama', 'fakultasUnivID'], 'required'],
            [['fakultasUnivID'], 'integer'],
            [['fakultasStatus'], 'string'],
            [['fakultasNama'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'fakultasID' => 'ID Fakultas',
            'fakultasNama' => 'Nama Fakultas',
            'fakultasUnivID' => 'ID Universitas',
            'fakultasStatus' => 'Status',
        ];
    }
}
