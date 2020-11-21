<?php
/**
 * 微博图片下载
 * 不作模拟登陆，手动贴入Cookie
 */ 
$cookie = "SINAGLOBAL=6798239982155.259.1581237271049; UOR=,,login.sina.com.cn; _s_tentry=login.sina.com.cn; Apache=5791427743517.783.1605932164091; ULV=1605932164102:207:22:9:5791427743517.783.1605932164091:1605921775026; login_sid_t=aa74b61eaa372197618dd527c04d05db; cross_origin_proto=SSL; ALF=1637468694; SSOLoginState=1605932694; SCF=AppttZySM8X8d1G9tAW9KMTdg2c3N1W42Vr1FUVuRynIzfqj0XB4tqIZt0ILq5FYznJ8h2cr6swBWGy3YIdv-Co.; SUB=_2A25yvObJDeRhGeBM71oR9ivPwjyIHXVRyF8BrDV8PUNbmtANLXbBkW9NRPMu0wlJH6UIF9duUNyVmRhKJiZ5Zexs; SUBP=0033WrSXqPxfM725Ws9jqgMF55529P9D9WWMLdh8R_TquqvOYuKZIhij5JpX5KzhUgL.FoqEShn7So-01K52dJLoI7y-B-41xHzpS5tt; wvr=6; webim_unReadCount=%7B%22time%22%3A1605932704489%2C%22dm_pub_total%22%3A0%2C%22chat_group_client%22%3A0%2C%22chat_group_notice%22%3A0%2C%22allcountNum%22%3A0%2C%22msgbox%22%3A0%7D; WBStorage=8daec78e6a891122|undefined";
$uid = "";

$url = "https://photo.weibo.com/photos/get_all?uid=5664127755&album_id=3978243950545206&count=30&page=1&type=3&__rnd=1605932730380";

$ret = curlRequest($url, '', 0, $cookie);
$data = json_decode($ret, TRUE); 

// curl数据处理
if (empty($data)) {
	exit("照片集为空");
}

$fail_photo_url = [];

// 统计页码
$num_per_num = count($data['data']['photo_list']);
$page_num = ceil($data['data']['total'] / $num_per_num);

// 分页
for ($i = 1; $i <= $page_num; $i++) { 
	$url = "https://photo.weibo.com/photos/get_all?uid=5664127755&album_id=3978243950545206&count=30&page={$i}&type=3&__rnd=1605932730380";

	$ret = curlRequest($url, '', 0, $cookie);
	$data = json_decode($ret, TRUE); 

	foreach ($data['data']['photo_list'] as $row) {
		$photo_url = $row['pic_host'] . '/large/' . $row['pic_name'];

	    // 下载
	    $download_bool = download_file($photo_url, 'jpg', uniqid());
	    if (!$download_bool) {
	    	$fail_photo_url[] = $photo_url;
	    }
	}
}

// 展示采集结果
if (empty($fail_photo_url)) {
	exit("采集完成");
} else {
	echo "采集失败的照片有:\n" . implode("\n", $fail_photo_url);
}