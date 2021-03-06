<?php
namespace common\auth;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
class Auth extends AuthAbstract
{
    /**
     * Roles and permission
     *
     * @var array $roles
     */
    protected static $roles = [
        // untuk admin
        'admin' => [
            // user
            'user.index',
            'user.create',
            'user.update',
            'user.delete',
            'user.view',

            'site.index',
            'site.logout',

            'web-provinsi.index',
            'web-provinsi.create',
            'web-provinsi.update',
            'web-provinsi.delete',
            'web-provinsi.view',

            'web-kota.index',
            'web-kota.create',
            'web-kota.update',
            'web-kota.delete',
            'web-kota.view',

            'web-univ.index',
            'web-univ.create',
            'web-univ.update',
            'web-univ.delete',
            'web-univ.view',

            'web-fakultas.index',
            'web-fakultas.create',
            'web-fakultas.update',
            'web-fakultas.delete',
            'web-fakultas.view',

            'web-jurusan.index',
            'web-jurusan.create',
            'web-jurusan.update',
            'web-jurusan.delete',
            'web-jurusan.view',
            'web-jurusan.get',

            'web-jenjang-pendidikan.index',
            'web-jenjang-pendidikan.create',
            'web-jenjang-pendidikan.update',
            'web-jenjang-pendidikan.delete',
            'web-jenjang-pendidikan.view',

            'web-events.index',
            'web-events.create',
            'web-events.update',
            'web-events.delete',
            'web-events.view',

            'web-jadwal-events.index',
            'web-jadwal-events.create',
            'web-jadwal-events.update',
            'web-jadwal-events.delete',
            'web-jadwal-events.view',

            'web-presentasi.index',
            'web-presentasi.create',
            'web-presentasi.update',
            'web-presentasi.delete',
            'web-presentasi.view',

            'web-dokumentasi.index',
            'web-dokumentasi.create',
            'web-dokumentasi.update',
            'web-dokumentasi.delete',
            'web-dokumentasi.view',

            'web-jns-industri.index',
            'web-jns-industri.create',
            'web-jns-industri.update',
            'web-jns-industri.delete',
            'web-jns-industri.view',

            'web-booking.index',
            'web-booking.create',
            'web-booking.update',
            'web-booking.delete',
            'web-booking.view',

            'web-kategori-stand.index',
            'web-kategori-stand.create',
            'web-kategori-stand.update',
            'web-kategori-stand.delete',
            'web-kategori-stand.view',

            'web-stands.index',
            'web-stands.create',
            'web-stands.update',
            'web-stands.delete',
            'web-stands.view',

            'web-venue.index',
            'web-venue.create',
            'web-venue.update',
            'web-venue.delete',
            'web-venue.view',

            'web-tiket-events.index',

            'web-setting.index',
            'web-setting.update',
            'web-setting.view',
			
			'web-perusahaan.index',
            'web-perusahaan.view',

            'web-user-premium.index',
            'web-user-premium.view',

            'web-user-premium-transaksi.index',
            'web-user-premium-transaksi.view',

            'web-lowongan.index',
            'web-lowongan.view',

            'web-seleksi.index',
            'web-seleksi.view',

            'web-pelamar.index',
            'web-pelamar.view',

            'web-berkas-pelamar.index',
            'web-berkas-pelamar.view',

            'web-lamaran.index',
            'web-lamaran.view',

            'web-hasil-seleksi.index',
            'web-hasil-seleksi.view',

            'web-kategori-seleksi.index',
            'web-kategori-seleksi.view',
            'web-kategori-seleksi.create',
            'web-kategori-seleksi.update',

            'web-artikel.index',
            'web-artikel.create',
            'web-artikel.update',
            'web-artikel.view',

            'web-kategori-artikel.index',
            'web-kategori-artikel.create',
            'web-kategori-artikel.update',
            'web-kategori-artikel.view',

            'web-setting.index',
            'web-setting.view',
        ],
        // untuk alumni
        'alumni' => [
            'site.index',
            'user.view',
            'site.logout',
//            'pengaduan.update',
//            'pengaduan.view',
        ],
        'perusahaan' => [
            'site.index',
            'user.view',
            'site.logout',
//            'pengaduan.update',
//            'pengaduan.view',
        ]
    ];
    private static $controller;
    private static $action;
    /**
     * Periksa authorization
     *
     * @param $action
     * @param $user
     *
     * @return bool
     */
    public static function authorization($action, $user = null)
    {
        self::$action = $action->id;
        self::$controller = $action->controller->id;
        $user = isset(Yii::$app->user->identity->role) ?
            Yii::$app->user->identity->role : $user;
        if ($user) {
            if (isset(self::$roles[$user])) {
                return in_array(
                    self::$controller . '.' . self::$action,
                    self::$roles[$user]
                );
            }
        }
        return self::checkOpenAuth();
    }
    /**
     * handle all behaviors of controller class
     *
     * @param array $params
     * @return array
     */
    public static function behaviors($params)
    {
        $params = new \ArrayObject($params, \ArrayObject::ARRAY_AS_PROPS);
        self::setOpenAuth('site', 'login');
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => [
                    'logout',
                    'index',
                    'create',
                    'balas',
                    'update',
                    'delete'
                ],
                'rules' => [
                    [
                        'actions' => [
                            'logout',
                            'index',
                            'create',
                            'balas',
                            'update',
                            'delete'
                        ],
                        'allow' => true,
                        'matchCallback' =>
                            isset($params->match) ? $params->match :
                                function ($rule, $action) {
                                    return Auth::authorization($action);
                                },
                    ],
                ],
                'denyCallback' =>
                    isset($params->deny) ?
                        $params->deny : new \Exception()
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }
    private static $openAuth = [];
    /**
     * memeriksa akses control yang terbuka
     *
     * @return bool
     */
    public static function checkOpenAuth()
    {
        if (self::$controller && self::$action) {
            return in_array(self::$controller . '.' . self::$action,
                self::$openAuth) ? true : false;
        }
        return false;
    }
    /**
     * mengatur controller dengan action yang terbuka
     *
     * @param $controller
     * @param $action
     */
    public static function setOpenAuth($controller, $action)
    {
        self::$openAuth[] = $controller . "." . $action;
    }
    /**
     * mengambil role saat ini
     *
     * @return string
     */
    public static function getRole()
    {
        return Yii::$app->user->identity->role;
    }
    /**
     * memeriksa role
     *
     * @return string
     */
    public static function checkRole($role)
    {
        return Yii::$app->user->identity->role === $role;
    }
}
