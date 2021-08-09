<?php
class Database{
    private function Connect(){
        return pg_connect("host=127.0.0.1 dbname=games user=service_user") or die("Can't connect to database".pg_last_error());
    }
    public function Query($query, $params, $application){
        $connection = $this->Connect();
        pg_query_params($connection, 'SET application_name = $1', array($application));
        return json_encode(pg_fetch_all(pg_query_params($connection, $query, $params)));
    }
    public function Version(){
        return json_encode(pg_version($this->Connect()));
    }
    public function Options(){
        return json_encode(pg_host($this->Connect()).pg_port($this->Connect()).pg_dbname($this->Connect()).pg_options($this->Connect()));
    }
}
?>