<?php
class Database{
    public function Connect(){
        return pg_connect("host=127.0.0.1 dbname=games user=service_user") or die("Can't connect to database".pg_last_error());
    }
    public function Query($query, $params, $application){
        $connection = $this->Connect();
        pg_query_params($connection, 'SET application_name = $1', $application);
        $result = pg_query_params($connection, $query, $params);
        pg_close($connection);
        pg_fetch_all($result);
    }
    public function Version(){
        return pg_version($this->Connect());
    }
    public function Options(){
        return pg_host($this->Connect()).":".pg_port($this->Connect())."<br>".pg_dbname($this->Connect())."<br>".pg_options($this->Connect());
    }
}
?>