<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "web_jurusan".
 *
 * @property int $jurusanID
 * @property string $jurusanNama
 * @property int $jurusanFakultasID
 * @property string $jurusanStatus
 * @property string $jurusanUnivID
 */
class WebJurusan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'web_jurusan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [[ 'jurusanNama', 'jurusanFakultasID','jurusanUnivID'], 'required'],
            [['jurusanID', 'jurusanFakultasID'], 'integer'],
            [['jurusanStatus'], 'string'],
            [['jurusanNama'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'jurusanID' => 'ID Jurusan',
            'jurusanNama' => 'Nama Jurusan',
            'jurusanFakultasID' => 'Nama Fakultas',
            'jurusanUnivID' => 'Nama Universitas',
            'jurusanStatus' => 'Status',
        ];
    }
}
