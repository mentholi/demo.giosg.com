<?php 
$CID = 1;
$PROTO = 'https';

if(isset($_GET['c'])) {
    $CID = $_GET['c'];
}

$HOS = '';
if(isset($_GET['h'])) {
    $HOS = $_GET['h'];
}
// Allow only uat, tst or local
if ($HOS == 'local') {
    $HOS = '127.0.0.1:8000';
    $PROTO = 'http';
} else if ($HOS == 'tst') {
    $HOS = 'servicetst.giosg.com';
} else if ($HOS == 'uat') {
    $HOS = 'serviceuat.giosg.com';
} else if ($HOS == 'uat-beta') {
    $HOS = 'serviceuat-beta.giosg.com';
} else if ($HOS == 'staging') {
    $HOS = 'service-staging.giosg.com';
} else if ($HOS == 'beta') {
    $HOS = 'service-beta.giosg.com';
} else {
    $HOS = 'service.giosg.com';
}


echo "<!-- giosg tag -->";
echo "<script>";
echo "(function(w, t, f) {";
echo "  var s='script',o='_giosg',h='".$PROTO."://".$HOS."',e,n;e=t.createElement(s);e.async=1;e.src=h+'/live/';";
echo "  w[o]=w[o]||function(){(w[o]._e=w[o]._e||[]).push(arguments)};w[o]._c=f;w[o]._h=h;n=t.getElementsByTagName(s)[0];n.parentNode.insertBefore(e,n);";
echo "})(window,document,".$CID.");";
echo "</script>";
echo "<!-- giosg tag -->";

?>
