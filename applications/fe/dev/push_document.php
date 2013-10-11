<?php
if (count($argv) < 4) {
    echo "Usage: php push_document.php add|delete id file";
    echo PHP_EOL;
    die();
}

// do some basic setup
date_default_timezone_set('Europe/Berlin');
$env = require("../pulq/etc/local/local.config.php");
$base_url = $env['config']['base_href'];

//"parse" arguments
list($script, $action, $id, $filepath) = $argv;

//get shared secret from application env and sign request
$secret = file_get_contents(dirname(__FILE__).'/../pulq/etc/local/consumer_shared_secret');
$signature = hash_hmac('sha256', $id, $secret);

//prepare request
$url = "$base_url/consumer/push/$id";
$curl = curl_init($url);
$headers = array(
    "Content-Type: application/json",
    "Signature: $signature"
);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_VERBOSE, 0);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

if ($action == 'add') {
    //add new document
    $ext = pathinfo($filepath, PATHINFO_EXTENSION);

    if ($ext === "json") {
        $document = json_decode(file_get_contents($filepath), true);
    } else {
        $finfo = finfo_open(FILEINFO_MIME_TYPE); // return mime type ala mimetype extension
        $mime = finfo_file($finfo, $filepath);
        finfo_close($finfo);

        $document = array(
            "filename" => basename($filepath),
            "size" => filesize($filepath),
            "type" => "asset",
            "mime" => "mime",
            "modified" => date('c', filemtime($filepath)),
            "data" => base64_encode(file_get_contents($filepath))
        );
    }

    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
    curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($document));
} elseif ($action === 'delete')  {
    //remove document
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
} else {
    echo 'The only allowed actions are "add" and "delete".'.PHP_EOL;
    die;
}

//execute
$returned = curl_exec($curl);
echo PHP_EOL;
