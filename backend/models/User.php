<?php

namespace backend\models;

use Yii;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property integer $userID
 * @property string $username
 * @property string $password
 * @property string $nama
 * @property string $email
 * @property string $foto
 * @property string $tanggal_pendaftaran
 * @property string $telepon
 * @property string $role
 *
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
            [['username'], 'unique','message' =>'Username Sudah Tersedia'],
            [

                ['foto'] ,
                'file' ,
                'skipOnEmpty' => TRUE ,
                'extensions'  => 'png, jpg' ,
            ],
            [['role','tanggal_pendaftaran'], 'string'],
            [['username', 'password'], 'string', 'max' => 255],
            [['nama', 'email'], 'string', 'max' => 35],
            [['email'], 'unique', 'message' => 'Email Sudah Tersedia'],
            [['telepon'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'userID' => Yii::t('app', 'user ID'),
            'username' => Yii::t('app', 'Username'),
            'password' => Yii::t('app', 'Password'),
            'nama' => Yii::t('app', 'Nama'),
            'email' => Yii::t('app', 'Email'),
            'telepon' => Yii::t('app', 'Telepon'),
            'role' => Yii::t('app', 'Role'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne(['userID' => $id]);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = $password;//Security::generatePasswordHash($password);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return self::findOne(['userID' => $this->getId()]);
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === $password;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
}
