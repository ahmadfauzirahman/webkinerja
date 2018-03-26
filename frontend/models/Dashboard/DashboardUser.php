<?php

namespace frontend\models\Dashboard;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property string $userID
 * @property string $username
 * @property string $password
 * @property string $nama
 * @property string $email
 * @property string $telepon
 * @property string $foto
 * @property string $tanggal_pendaftaran
 * @property string $role
 * @property string $token_aktivasi
 * @property string $status
 */
class DashboardUser extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['password'], 'required'],
            [
                ['foto'] ,
                'file' ,
                'skipOnEmpty' => TRUE ,
                'extensions'  => 'png, jpg, jpeg' ,
            ],
            [['tanggal_pendaftaran'], 'safe'],
            [['password'], 'string', 'max' => 255],
            [['nama', 'email'], 'string', 'max' => 35],
            [['telepon'], 'string', 'max' => 20],
            [['email'], 'unique'],
            [['email'], 'required'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'userID' => 'User ID',
            'username' => 'Username',
            'password' => 'Password',
            'nama' => 'Nama',
            'email' => 'Email',
            'telepon' => 'Telepon',
            'foto' => 'Foto',
            'tanggal_pendaftaran' => 'Tanggal Pendaftaran',
        ];
    }
}
