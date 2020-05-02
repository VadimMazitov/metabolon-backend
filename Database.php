<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");


// Properties for the DB connection
define('DB_HOST', 'host');
define('DB_PORT', 'port');
define('DB_USER', 'username');
define('DB_PASS', 'password');
define('DB_NAME', 'db_name');

/**
 * creates connection to the DB
 * @return false|resource
 */
function connect()
{
    $db_prop = parse_ini_file('resources/db.ini');

    $connection_string = 'host='.$db_prop[DB_HOST].
                         ' port='.$db_prop[DB_PORT].
                         ' dbname='.$db_prop[DB_NAME].
                         ' user='.$db_prop[DB_USER].
                         ' password='.$db_prop[DB_PASS];

    $con = pg_connect($connection_string);

    pg_set_client_encoding($con, "utf8");

    return $con;

}

/**
 * closes the given connection to the DB
 * @param $pg_connection
 */
function disconnect(&$pg_connection)
{
    pg_close($pg_connection);
}

// Connect to the DB
$con=connect();