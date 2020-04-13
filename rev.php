<?php
function curl($url){
    $core = curl_init(); //curl's resource
    //setting up curl
    curl_setopt_array($core,array(
        CURLOPT_URL => "http://api.hackertarget.com/reverseiplookup/?q=$url",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_USERAGENT => "Googlebot/2.1 (+http://www.google.com/bot.html)"
    ));
    $result = curl_exec($core);
    curl_close($core);
    return $result;
}

//users input
echo "[!] enter your site :";
$input  = fopen("php://stdin","r");
$target = trim(fgets($input));

//filtering, because users input can't be processed if it's contained http://,https://,or /
$filter = array("http://","https://","/");
$target1 = str_replace($filter,"",$target);

//then, let's print out the output
$target1 = explode("\n",curl($target1));
unset($target1[count($target1) - 1]);
$jumlah  = count($target1);

echo "\n\n-----------------------------------------------------------------------\n";
echo "Website          : www.$target\n";
echo "Number of result : $jumlah\n";
echo "-----------------------------------------------------------------------\n\n";

foreach($target1 as $sites){
    echo "[+] " . $sites . "\n";
}

?>