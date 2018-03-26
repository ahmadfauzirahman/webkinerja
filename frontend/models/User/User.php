<?php

namespace frontend\models\User;

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
 */
class User extends \yii\db\ActiveRecord
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
            //[['username', 'password', 'nama', 'email','telepon'], 'required'],
            [['username', 'password', 'nama', 'email','telepon','role'], 'required', 'message' => 'Field ini tidak boleh kosong.'],
            [['foto', 'role'], 'string'],
            [['tanggal_pendaftaran'], 'default', 'value'=> date('Y-m-d h:i:s')],
            [['username', 'password'], 'string', 'max' => 255],
            [['nama', 'email'], 'string', 'max' => 35],
            [['telepon'], 'string', 'max' => 12],
            [['email'], 'unique', 'message' => 'Email ini telah digunakan akun lain' ],
            [['username'], 'unique', 'message' => 'Username ini telah digunakan akun lain' ],
            [['token_aktivasi'], 'string'],
            [['status'], 'default', 'value' => 'Pending'],
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
            'role' => 'Role',
            'token_aktifasi' => 'Token Aktifasi',
            'status' => 'Status',
        ];
    }
}
