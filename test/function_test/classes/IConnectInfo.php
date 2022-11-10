<?php
 
    interface IConnectInfo
    {
        const CONN_HOST = 'localhost';
        const CONN_USER = 'xai01.wi2';
        const CONN_PASS = '2paccap2';
        const CONN_DB = 'xai01_wi2_sde_dk';
        const CONN_PORT = 3306;
        const MYSQL_CHARSET = 'utf8';
        
        public static function doConnect();
    }
    
