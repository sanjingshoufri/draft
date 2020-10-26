<?php
$a = "TANNER:
好想变成小猫  https://v.douyin.com/J5XjT2e/ 复制此链接，打开抖音，直接观看视频！

TANNER:
不过是主人的任务罢了  https://v.douyin.com/J5X9Nno/ 复制此链接，打开抖音，直接观看视频！

TANNER:
别问我为什么都是慢动作 以我的智商 我只会慢动作#上海  https://v.douyin.com/J5X6S5r/ 复制此链接，打开抖音，直接观看视频！

TANNER:
如果我有罪可以让上帝来制裁我 而不是派一群nt客人来折磨我  https://v.douyin.com/J5XH3qD/ 复制此链接，打开抖音，直接观看视频！

TANNER:
我真的无数次的想告诉你 你要是在我身边就好了  https://v.douyin.com/J5X4UGA/ 复制此链接，打开抖音，直接观看视频！

TANNER:
#夏日打卡挑战 我怎么去向你解释 我在毫不犹豫爱你的同时 恐惧同样也无边无际.  https://v.douyin.com/J5XymXk/ 复制此链接，打开抖音，直接观看视频！

TANNER:
今天喝了水水，翘了腿腿，还是忍不住想亲你嘴嘴  https://v.douyin.com/J5XmRp2/ 复制此链接，打开抖音，直接观看视频！

TANNER:
众所周知 照片只会把人拍丑  https://v.douyin.com/J5XQW9D/ 复制此链接，打开抖音，直接观看视频！

TANNER:
不过是恢复原状罢了 本来就没拥有过什么  https://v.douyin.com/J5XSC8C/ 复制此链接，打开抖音，直接观看视频！

TANNER:
谁能想到这句话是吴亦凡对我说的  https://v.douyin.com/J5XQMMw/ 复制此链接，打开抖音，直接观看视频！

TANNER:
“老公老公 你打完球了吗，喝点水休息一下，我们散散步一起回家。”#520告白季  https://v.douyin.com/J5XkUjY/ 复制此链接，打开抖音，直接观看视频！

TANNER:
分开了就当好聚好散吧 诋毁谩骂是小孩子才会做的事  https://v.douyin.com/J5XXDox/ 复制此链接，打开抖音，直接观看视频！

TANNER:
臭弟弟你拽啥 跟你聊几句你就真当我喜欢你啊？  https://v.douyin.com/J5XhTFF/ 复制此链接，打开抖音，直接观看视频！
";


// 从字符串中提取url.
preg_match_all("/(https:\/\/)[a-z.\/0-9A-Z]+/", $a, $match);
$urlList = $match[0];

$base_url = "D:/taonian";

// 批量处理
foreach ($urlList as $key => $url) {
	$realUrl = getRealUrl($url);

    $file_content = file_get_contents($realUrl);

    // file_put_contents($base_url . "/qk221111l" . $key . '.mp4', $file_content);
    $ret = get_headers($realUrl);

    print_r($ret);
    // var_dump($file_content);
    exit();
    // 提取视频文件
}