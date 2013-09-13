<?php
// this implements http://spaceapi.net/ v0.12
require __DIR__ . "/Data.php";

$data = new Data;

$outDir = __DIR__ . "/../output";
$botUrl = 'http://uberbus.club.muc.ccc.de:8080/';
$status = file_get_contents($botUrl);
$now    = time();
if ($status == '') {

}

try {
    $data->setApi("0.12")
        ->setSpace("muCCC")
        ->setLogo("http://muc.ccc.de/lib/tpl/muc3/images/muc3_klein.gif")
        ->setUrl("http://www.muc.ccc.de/")
        ->setIcon(array(
            'open'   => "http://muc.ccc.de/lib/tpl/muc3/images/green.png",
            'closed' => "http://muc.ccc.de/lib/tpl/muc3/images/red.png",
        ))
        ->setOpen($status)
        ->setProp("contact", array(
            "twitter" => "@muccc",
            "irc"     => "irc://ray.blafasel.de/ccc",
            "ml"      => "talk@muc.ccc.de",
        ))
        ->setProp("lastchange", $now)
        ->setProp("lat", 48.153701)
        ->setProp("lon", -11.560801)
    ;
    if (!is_dir($outDir)) {
        mkdir($outDir);
    }
    file_put_contents("{$outDir}/status.json", $data);
} catch (Exception $e) {
    echo $e->getMessage();
}

