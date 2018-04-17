<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "web_user_premium".
 *
 * @property int $userPremiumID
 * @property int $userID
 * @property string $userPremiumAwal
 * @property string $userPremiumAkhir
 * @property string $userPremiumKeterangan
 * @property string $userPremiumStatus
 */
class WebUserPremium extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'web_user_premium';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['userID'], 'required'],
            [['userID'], 'integer'],
            [['userPremiumAwal', 'userPremiumAkhir'], 'safe'],
            [['userPremiumKeterangan', 'userPremiumStatus'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'userPremiumID' => 'User Premium ID',
            'userID' => 'User ID',
            'userPremiumAwal' => 'User Premium Awal',
            'userPremiumAkhir' => 'User Premium Akhir',
            'userPremiumKeterangan' => 'User Premium Keterangan',
            'userPremiumStatus' => 'User Premium Status',
        ];
    }
}
