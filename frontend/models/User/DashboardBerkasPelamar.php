<?php

namespace frontend\models\User;

use Yii;

/**
 * This is the model class for table "web_berkas_pelamar".
 *
 * @property int $berkasPelamarID
 * @property int $berkasPelamarUserID
 * @property string $berkasPelamarNama
 * @property string $berkasPelamarFile
 * @property string $berkasPelamarStatus
 */
class DashboardBerkasPelamar extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'web_berkas_pelamar';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['berkasPelamarUserID'], 'integer'],
            [['berkasPelamarUserID'], 'default', 'value' => Yii::$app->user->identity->userID],
            [['berkasPelamarNama', 'berkasPelamarStatus'], 'string'],
            [['berkasPelamarNama', 'berkasPelamarStatus'], 'required'],
            [
                ['berkasPelamarFile'] ,
                'file' ,
                'skipOnEmpty' => TRUE ,
                'extensions'  => 'png, jpg, jpeg, pdf, doc, docx, ppt' ,
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'berkasPelamarID' => 'ID Berkas',
            'berkasPelamarUserID' => 'User ID',
            'berkasPelamarNama' => 'Nama Berkas',
            'berkasPelamarFile' => 'File',
            'berkasPelamarStatus' => 'Permission',
        ];
    }
}
