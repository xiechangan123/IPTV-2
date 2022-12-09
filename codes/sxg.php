<?php
    $channel = empty($_GET['id']) ? "CCTV-xw_4000" : trim($_GET['id']);
    $array = explode("_", $channel);
    $stream = "http://[2409:8c02:21c:60::2f]/vod.rxip.sc96655.com/live/8ne5i_sccn/{$array[0]}_hls_pull/8ne5i_sccn,{$array[0]}_hls_pull_{$array[1]}K/";
    $timestamp = intval((time()-60)/6);
    $current = "#EXTM3U"."\r\n";
    $current.= "#EXT-X-VERSION:3"."\r\n";
    $current.= "#EXT-X-TARGETDURATION:6"."\r\n";
    $current.= "#EXT-X-MEDIA-SEQUENCE:{$timestamp}"."\r\n";
    for ($i=0; $i<6; $i++)
    {
        $current.= "#EXTINF:6,"."\r\n";
        $current.= $stream.rtrim(chunk_split($timestamp, 3, "/"), "/").".ts"."\r\n";
        $timestamp = $timestamp + 1;
    }
    header("Content-Type: text/plain");
    echo $current;
