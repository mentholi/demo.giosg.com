<?php
    $domain = $_SERVER['SERVER_NAME'];
    echo "Domain: ".$domain."<br />";
    
    $domain_hash = substr(sha1($domain."/"), 0, 4); //4 hexdigits = 16 bits
    echo "Domain hash: ".$domain_hash."<br />";
    
    $vid = null;
    $cookie_name = "_pk_id_1_".$domain_hash;
    $vid = $_COOKIE[$cookie_name];
    
    if ($vid) {
        $explosion = explode('.', $vid);
        echo "Found! giosg visitor ID: ".$explosion[0];
    } else {
        echo "No visitor id found. Tried with cookie name: ".$cookie_name."<br />";
        echo "Cookie dump:<br />";
        var_dump($_COOKIE);
    }
?>
