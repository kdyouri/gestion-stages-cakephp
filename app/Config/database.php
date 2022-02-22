<?php
class DATABASE_CONFIG {

    public $default = [];

    public function __construct() {

        $this->default = [
            'datasource' => 'Database/Mysql',
            'persistent' => false,
            'host'       => env('DB_HOST'),
            'port'       => env('DB_PORT'),
            'login'      => env('DB_LOGIN'),
            'password'   => env('DB_PASS'),
            'database'   => env('DB_DATABASE'),
            'prefix'     => '',
            'encoding'   => 'utf8'
        ];
    }
}
