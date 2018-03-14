<?php
date_default_timezone_set('Asia/Jakarta');

error_reporting(0);
ob_start();
Class connection {

    var $host = "localhost";
    var $user = "root";
    var $pass = "";
    var $db = "notif_telegram";

    function connOpen() {
        mysql_connect($this->host, $this->user, $this->pass);
        mysql_select_db($this->db);
    }
    function connClose() {
        mysql_close();
    }
}


// function base_url(){
//     echo "https://www.faamikompurwokerto.org/";
// }
?>
