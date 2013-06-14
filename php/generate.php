<?php
require __DIR__ . "/Data.php";

$data = new Data;

$open = true;

if ($argc == 2) {
    if ($argv[1] == "--open") {
        $open = true;
    }
    if ($argv[1] == "--closed") {
        $open = false;
    }
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
        ->setOpen($open)
        ->setProp("contact", array(
            "twitter" => "@muccc",
            "irc"     => "irc://ray.blafasel.de/ccc",
            "ml"      => "talk@muc.ccc.de",
        ))
        ->setProp("lastchange", time())
        ->setProp("lat", 48.153701)
        ->setProp("lon", -11.560801)

    ;
} catch (Exception $e) {
    echo $e->getMessage();
}

$outputDir = __DIR__ . "/../output";
if (!is_dir($outputDir)) {
    mkdir($outputDir);
}
file_put_contents("{$outputDir}/status.json", $data);

echo str_repeat("=", 80).PHP_EOL;
echo $data.PHP_EOL;
echo str_repeat("=", 80).PHP_EOL;
