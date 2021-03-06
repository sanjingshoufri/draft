<?php
/**
 * 抖音分享链接下载视频到本地磁盘
 * $share_url为抖音分享链接
 */ 

$share_url = ""; 

// 从字符串中提取url.
preg_match_all("/(https:\/\/)[a-z.\/0-9A-Z]+/", $share_url, $match);
$urlList = $match[0];

$base_url = "F:/taonian";
$dy_api = "https://www.iesdouyin.com/web/api/v2/aweme/iteminfo/?item_ids=";

// 批量下载
foreach ($urlList as $key => $url) {
	$ret = get_headers($url, TRUE);

    if (!isset($ret['location']) OR empty($ret['location'])) {
    	continue;
    }

	$realUrl = $ret['location'];
	$ret = parse_url($realUrl);

    preg_match("/[0-9]+/", $ret['path'], $match);
    $item_ids = $match[0];

    $ret = curlRequest($dy_api . $item_ids);
    $arr = json_decode($ret, TRUE);

    $video_url = $arr['item_list'][0]['video']['play_addr']['url_list'][0];

    // 读取内容
    $file_content = file_get_contents($video_url);
    // 写入内容到磁盘
    $file_name = $base_url . "/" . $key . time() . '.mp4';
    file_put_contents($file_name, $file_content);
}