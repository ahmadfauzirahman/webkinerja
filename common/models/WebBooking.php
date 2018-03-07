<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "web_booking".
 *
 * @property int $bookingID
 * @property int $bookingEventsID
 * @property int $bookingStandsID
 * @property string $bookingPerusahaanEmail
 * @property string $bookingPerusahaanNama
 * @property int $bookingJnsIndustriID
 * @property string $bookingPerusahaanTelfon
 * @property string $bookingPerusahaanNamaOfficer
 * @property string $bookingPerusahaanJbtnOfficer
 * @property string $bookingPerusahaanTelfonOfficer
 * @property string $bookingCatatan
 * @property string $bookingBuktiPembayaran
 * @property string $bookingStatus
 */
class WebBooking extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'web_booking';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['bookingEventsID', 'bookingStandsID', 'bookingJnsIndustriID'], 'integer'],
            [['bookingCatatan', 'bookingBuktiPembayaran', 'bookingStatus'], 'string'],
            [['bookingPerusahaanEmail', 'bookingPerusahaanNama', 'bookingPerusahaanNamaOfficer'], 'string', 'max' => 200],
            [['bookingPerusahaanTelfon', 'bookingPerusahaanTelfonOfficer'], 'string', 'max' => 20],
            [['bookingPerusahaanJbtnOfficer'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'bookingID' => 'Booking ID',
            'bookingEventsID' => 'Booking Events ID',
            'bookingStandsID' => 'Booking Stands ID',
            'bookingPerusahaanEmail' => 'Booking Perusahaan Email',
            'bookingPerusahaanNama' => 'Booking Perusahaan Nama',
            'bookingJnsIndustriID' => 'Booking Jns Industri ID',
            'bookingPerusahaanTelfon' => 'Booking Perusahaan Telfon',
            'bookingPerusahaanNamaOfficer' => 'Booking Perusahaan Nama Officer',
            'bookingPerusahaanJbtnOfficer' => 'Booking Perusahaan Jbtn Officer',
            'bookingPerusahaanTelfonOfficer' => 'Booking Perusahaan Telfon Officer',
            'bookingCatatan' => 'Booking Catatan',
            'bookingBuktiPembayaran' => 'Booking Bukti Pembayaran',
            'bookingStatus' => 'Booking Status',
        ];
    }
}
