<?php
set_time_limit(0);
$url = urldecode($_GET['url']);
if(strpos($url, 'tiktok.com') == true ){
     $ch = curl_init('https://tiktok-remove.herokuapp.com/tiktok.php?url='.$url);
    curl_setopt_array($ch, array(
        CURLOPT_URL => 'https://tiktok-remove.herokuapp.com/tiktok.php?url='.$url,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_SSL_VERIFYHOST => false,
        CURLOPT_USERAGENT => 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3833.0 Safari/537.36',
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_RETURNTRANSFER => true
    ));
    $data = curl_exec($ch);
        curl_close($ch);
        $data1 = json_decode($data);
    echo '{"messages":[{"attachment":{"type":"template","payload":{"template_type":"generic","image_aspect_ratio":"square","elements":[';
    echo '{
"title": "'.$data1->title.'",
"image_url": "'.$data1->poster.'",

"buttons": [
{
"type": "json_plugin_url",
"url": "https://tiktok-remove.herokuapp.com/chatbottiktok2.php?url='.$url.'",
"title": "Xem Video"
},{
"type": "web_url",
"url": "'.$data1->dl.'",
"title": "Download"
}
]
}';
echo ']}}}]}';
}else{
    echo '{
 "messages": [
   {"text": "Đã xảy ra lỗi!"}
 ]
}';
}
