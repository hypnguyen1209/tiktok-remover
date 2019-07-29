<?php
$url = $_GET['url'];
    $ch = curl_init('https://downloadvideotiktok.com/?url='.$url);
    curl_setopt_array($ch, array(
        CURLOPT_URL => 'https://downloadvideotiktok.com/?url='.$url,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_SSL_VERIFYHOST => false,
        CURLOPT_USERAGENT => 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3833.0 Safari/537.36',
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_RETURNTRANSFER => true
    ));
    $data = curl_exec($ch);
        curl_close($ch);
        preg_match_all('#content="(.+?)"#', $data, $su);
        $sub = $su[1][7];
        preg_match('#token=(.+?)&loop#', $data, $dl);
        $dlll = base64_decode($dl[1]);
        preg_match('#url(.+?);#', $data, $tit);
        $poster = substr($tit[1], 1, -1);
        preg_match('#title">
                  (.+?)            
                </h5>#', $data, $tit);
        $title = $tit[1];
$data = [
    'title'=>$title,
    'poster'=>$poster,
    'sub'=>$sub,
    'dl'=>base64_decode($dlll)
    ];
    echo json_encode($data);
