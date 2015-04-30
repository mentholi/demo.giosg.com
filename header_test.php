<?php
function parseRequestHeaders($only_http) {
    $headers = array();
    
    foreach($_SERVER as $key => $value) {
        if ($only_http) {
            if (substr($key, 0, 5) <> 'HTTP_') {
                continue;
            }
            $header = str_replace(' ', '-', ucwords(str_replace('_', ' ', strtolower(substr($key, 5)))));
        } else {
            $header = str_replace(' ', '-', ucwords(str_replace('_', ' ', strtolower($key))));
        }

        $headers[$header] = $value;
        $l = $header."->".$value;
        echo $l."<br>";
        file_put_contents('/var/sites/universumapps.com/headers.txt', $l."\n", FILE_APPEND | EX_LOCK);
    }
    return $headers;
}

$h = parseRequestHeaders(false);

?>
