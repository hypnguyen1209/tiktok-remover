<?php
$url = $_GET['url'];
$param = 'url='.$url;
    $ch = curl_init('https://musicallydown.com/download.php');
    curl_setopt_array($ch, array(
        CURLOPT_URL => 'https://musicallydown.com/download.php',
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_SSL_VERIFYHOST => false,
        CURLOPT_USERAGENT => 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3833.0 Safari/537.36',
        CURLOPT_POST => 1,
        CURLOPT_POSTFIELDS => $param,
        CURLOPT_HTTPHEADER => [
            'Connection: keep-alive',
'Cookie: _ga=GA1.2.1271149105.1564282352; _gid=GA1.2.1692128148.1564282352; SL_GWPT_Show_Hide_tmp=1; SL_wptGlobTipTmp=1; __atssc=google%3B3; __atuvc=7%7C31; __atuvs=5d3d0deea9bedd4b006',
'Host: musicallydown.com',
'Referer: https://musicallydown.com/',
'Sec-Fetch-Mode: navigate',
'Sec-Fetch-Site: same-origin',
'Sec-Fetch-User: ?1',
'Upgrade-Insecure-Requests: 1',
'User-Agent: Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3860.5 Safari/537.36'
            ],
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_RETURNTRANSFER => true
    ));
    $data = curl_exec($ch);
        curl_close($ch);
        preg_match_all('#value="(.+?)"#', $data, $array);
       $ch3 = curl_init($url);
    curl_setopt_array($ch3, array(
        CURLOPT_URL => $url,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_SSL_VERIFYHOST => false,
        CURLOPT_USERAGENT => 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3833.0 Safari/537.36',
        
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_RETURNTRANSFER => true
    ));
    $data3 = curl_exec($ch3);
        curl_close($ch3);
        preg_match_all('#content="(.+?)"/>#', $data3, $content);
        $poster = $content[1][13];
        $title = $content[1][18];
       // $sub = $content[1][3];
       //print_r($content);
        $id = $array[1][0];
      $param1 = 'q='.$id;
    $ch1 = curl_init('https://musicallydown.com/vid/download');
    curl_setopt_array($ch1, array(
        CURLOPT_URL => 'https://musicallydown.com/vid/download',
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_SSL_VERIFYHOST => false,
        CURLOPT_USERAGENT => 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3833.0 Safari/537.36',
        CURLOPT_POST => 1,
        CURLOPT_POSTFIELDS => $param1,
        CURLOPT_HTTPHEADER => [
            'Connection: keep-alive',
'Cookie: _ga=GA1.2.1271149105.1564282352; _gid=GA1.2.1692128148.1564282352; SL_GWPT_Show_Hide_tmp=1; SL_wptGlobTipTmp=1; __atssc=google%3B3; __atuvc=7%7C31; __atuvs=5d3d0deea9bedd4b006',
'Host: musicallydown.com',
'Referer: https://musicallydown.com/video/'.$id,
'Sec-Fetch-Mode: navigate',
'Sec-Fetch-Site: same-origin',
'Sec-Fetch-User: ?1',
'Upgrade-Insecure-Requests: 1',
'User-Agent: Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3860.5 Safari/537.36'
            ],
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_RETURNTRANSFER => true
    ));
    $data1 = curl_exec($ch1);
        curl_close($ch1);
        preg_match('#ferrer" href="(.+?)" cl#', $data1, $array1);
        $dl =  $array1[1];
        $param2 = 'url='.$dl;
          $ch2 = curl_init('https://www.expandurl.net/expand');
    curl_setopt_array($ch2, array(
        CURLOPT_URL => 'https://www.expandurl.net/expand',
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_SSL_VERIFYHOST => false,
        CURLOPT_USERAGENT => 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3833.0 Safari/537.36',
        CURLOPT_POST => 1,
        CURLOPT_POSTFIELDS => $param2,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_RETURNTRANSFER => true
    ));
    $data2 = curl_exec($ch2);
        curl_close($ch2);
       // echo htmlspecialchars($data2);
        preg_match_all('#<td><a href="(.+?)"#', $data2, $dll);
        $dlll = $dll[1][1];
//echo $dl;
$data = [
    'title'=>$title,
    'poster'=>$poster,
  //  'sub'=>$sub,
    'dl'=>$dlll
    ];
    echo json_encode($data);
