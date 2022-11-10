<?php
 
    interface IConnectInfo
    {
        
        const CONN_HOST = '127.0.0.13';
        const CONN_USER = 'root';
        const CONN_PASS =  '';
        const CONN_DB = 'bil_bixen';
        const CONN_PORT = 3306;
        const MYSQL_CHARSET = 'utf8';
        
        public static function doConnect();
    }
    
