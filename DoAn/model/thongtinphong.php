<?php 
include_once("connect.php");
class ttphong
    {
    function thongtinphong() {
        $db = new connect();
        $select = 'select * FROM thongtinphong';
        $result = $db->getlist($select);
        return $result;
    }
    function getttphong($id){
        $db = new connect();
        $select = "select * from thongtinphong where id_phong=$id";
        $result = $db->getInstance($select);
        return $result;
    }
}
?>