<?php

class DB {

    protected static $connection_instance;

    public static function getInstance()
    {
        if ( self::$connection_instance === null ) {
            try {
                self::$connection_instance = new PDO( 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD );
                self::$connection_instance->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
            } catch ( PDOException $e ) {
                throw new Exception( $e->getMessage() );
            }
        }

        return self::$connection_instance;
    }

}
