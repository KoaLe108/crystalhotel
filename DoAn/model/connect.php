<?php
class connect
{
    var $db = null;
    function __construct()
    {
        $dsn = 'mysql:host=localhost;dbname=khachsan';
        $users = 'root';
        $pass = '';
        try {
            $this->db = new PDO($dsn, $users, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
        } catch (\Throwable $th) {
            //throw $th;
            echo $th;
        }
    }

    function getlist($select)
    {
        $result = $this->db->query($select);
        return $result;
    }

    function getInstance($select)
    {
        $result = $this->db->query($select);
        $result = $result->fetch();
        return $result;
    }
    function exec($query)
    {
        $result = $this->db->query($query);
        return $result;
    }

    function execp($query)
    {
        $statement = $this->db->query($query);
        return $statement;
    }
}
?>
