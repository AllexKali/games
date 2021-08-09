<?php
class Database{
    private $connection = pg_connect("host=127.0.0.1 dbname=games user=service_user") or die("Can't connect to database".pg_last_error());

    public function Query($query, $params, $application){
        pg_query_params($connection, 'SET application_name = $1', array($application));
        return json_encode(pg_fetch_all(pg_query_params($connection, $query, $params)));
    }
    public function Version(){
        return json_encode(pg_version($connection));
    }
    public function Options(){
        return json_encode(pg_host($connection).pg_port($connection).pg_dbname($connection).pg_options($connection));
    }
}
?>