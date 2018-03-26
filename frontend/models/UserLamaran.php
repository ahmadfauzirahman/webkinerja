<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "web_lamaran".
 *
 * @property int $lamaranID
 * @property int $lamaranUserID
 * @property int $lamaranLowonganID
 * @property string $lamaranPermohonan
 * @property string $lamaranTglMelamar
 * @property string $lamaranKeteranganLamaran
 * @property string $lamaranStatus
 */
class UserLamaran extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'web_lamaran';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['lamaranUserID', 'lamaranLowonganID'], 'integer'],
            [['lamaranPermohonan', 'lamaranKeteranganLamaran', 'lamaranStatus'], 'string'],
            [['lamaranTglMelamar'], 'safe'],
            [['lamaranUserID'], 'default', 'value' => Yii::$app->user->identity->userID],
            [['lamaranTglMelamar'], 'default', 'value' => date('Y-m-d h:i:s')],
            [['lamaranKeteranganLamaran'], 'default', 'value' => '-'],
            [['lamaranStatus'], 'default', 'value' => 'Pending Review'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'lamaranID' => 'Lamaran ID',
            'lamaranUserID' => 'Lamaran User ID',
            'lamaranLowonganID' => 'Lamaran Lowongan ID',
            'lamaranPermohonan' => 'Lamaran Permohonan',
            'lamaranTglMelamar' => 'Lamaran Tgl Melamar',
            'lamaranKeteranganLamaran' => 'Lamaran Keterangan Lamaran',
            'lamaranStatus' => 'Lamaran Status',
        ];
    }
}
