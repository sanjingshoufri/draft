<?php
namespace Functiontest;
function func_echo()
{
	echo '函数自动加载调通...';
}

function splitReceiveAddress($reciever_address)
{
    // 从地址中解析出省-市-区
    $address = $reciever_address['address'];

    $pattern = "/(?<province>[^省]+自治区|.*?省|.*?行政区|.*?市)(?<city>[^市]+自治州|.*?地区|.*?行政单位|.+盟|市辖区|.*?市|.*?县)(?<county>[^县]+县|.+区|.+市|.+旗|.+海域|.+岛)?(?<town>[^区]+区|.+镇)?(?<village>.*)/";

    preg_match($pattern, $address, $match);
    // $match = preg_split($pattern, $address);
    return $match;
}