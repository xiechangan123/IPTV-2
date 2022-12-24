<?php
error_reporting(0);
header('Content-Type: text/json;charset=UTF-8');
$id = isset($_GET['id']) ? $_GET['id'] : '4khd';
$n = ['4khd' => '4K10M', '4kfhd' => '4K0219'];
$h = ["User-Agent: cctv_app_tv", "Referer: api.cctv.cn", "UID: 1234123122"];
$bstrURL = "https://ytpvdn.cctv.cn/cctvmobileinf/rest/cctv/videoliveUrl/getstream";
$postData = 'appcommon={"ap":"cctv_app_tv","an":"央视投屏助手","adid":"1234123122","av":"1.1.7"}&url=http://livews-tp4k.cctv.cn/live/' . $n[$id] . '.stream/playlist.m3u8';
$ch = curl_init($bstrURL);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
curl_setopt($ch, CURLOPT_HTTPHEADER, $h);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
$data = curl_exec($ch);
curl_close($ch);
$obj = json_decode($data);
$playUrl = $obj->url;

$ch = curl_init($playUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HTTPHEADER, $h);
$data = curl_exec($ch);
curl_close($ch);
preg_match('/m3u8\?(.*?)\n/', $data, $re);
$playUrl = "http://livews-tp4k.cctv.cn/live/" . $n[$id] . ".stream/1.m3u8?" . $re[1];

$ch = curl_init($playUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HTTPHEADER, $h);
$data = curl_exec($ch);
curl_close($ch);
$data = preg_replace('/(.*?.ts)/i', "http://livews-tp4k.cctv.cn/live/" . $n[$id] . ".stream/$1", $data);
header("Content-Disposition:attachment;filename=playlist.m3u8");
echo $data;