<?php
$url = $_GET['url'];
  $ch = curl_init('https://tiktok-remove.herukuapp.com/tiktok.php?url='.$url);
    curl_setopt_array($ch, array(
        CURLOPT_URL => 'https://tiktok-remove.herukuapp.com/tiktok.php?url='.$url,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_SSL_VERIFYHOST => false,
        CURLOPT_USERAGENT => 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3833.0 Safari/537.36',
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_RETURNTRANSFER => true
    ));
    $data = curl_exec($ch);
        curl_close($ch);
        $data1 = json_decode($data);
echo '{
  "messages": [
    {
      "attachment": {
        "type": "video",
        "payload": {
          "url": "'.$data1->dl.'"
        }
      }
    }
  ]
}';
