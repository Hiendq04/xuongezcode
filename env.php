<?php 
    const dbhost = "localhost";
    const dbname = "xuongezcode";
    const username = "root";
    const password = "";

    const base_url = "http://localhost/xuongezcode";

    function route($url){
        return base_url.$url;
    }
    function routeAdmin($url){
        return base_url."/admin".$url;
    }
    function pathUpload($url){
        return base_url."/Public/Uploads/".$url;
    }
?>
