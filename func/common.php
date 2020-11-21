<?php
if (!function_exists('curlRequest')) {
    function curlRequest($url, $post = '', $header = 0, $cookie = '', $returnCookie = 0)
    {
        $curl = curl_init();
        
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.1; Trident/6.0)');
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($curl, CURLOPT_AUTOREFERER, 1);
        curl_setopt($curl, CURLOPT_REFERER, "http://XXX");
        
        if ($post) {
            curl_setopt($curl, CURLOPT_POST, 1);
            if (!$header) {
                curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($post));
            } else {
                curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));
            }
        }

        if ($cookie) {
            curl_setopt($curl, CURLOPT_COOKIE, $cookie);
        }

        curl_setopt($curl, CURLOPT_HEADER, $returnCookie);
        curl_setopt($curl, CURLOPT_TIMEOUT, 60);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);//忽略ssl验证
        $data = curl_exec($curl);
        if (curl_errno($curl)) {
            return curl_error($curl);
        }
        curl_close($curl);
        if($returnCookie){
            list($header, $body) = explode("\r\n\r\n", $data, 2);
            preg_match_all("/Set\-Cookie:([^;]*);/", $header, $matches);
            $info['cookie']  = substr($matches[1][0], 1);
            $info['content'] = $body;
            return $info;
        }else{
            return $data;
        }
    }
}

if (!function_exists('getRealUrl')) {
    function getRealUrl($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        // 不需要页面内容
        curl_setopt($ch, CURLOPT_NOBODY, 1);
        // 不直接输出
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // 返回最后的Location
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_exec($ch);
        $info = curl_getinfo($ch,CURLINFO_EFFECTIVE_URL);
        curl_close($ch);

        return $info;
    }
}

/**
 * @param $file_name  文件路径
 * @param $showname 显示下载的视频名称
 * @return int|string
 */
if (!function_exists('download_file')) {
    function download_file($download_file_url, $suffix, $local_file_name)
    {
        // 读取文件内容，然后写入到本地
        $file_content = file_get_contents($download_file_url);
        if (!$file_content) {
            return FALSE;
        }

        // 写入内容到磁盘
        $file_name_base = md5($local_file_name) . mt_rand() . time();
        $file_name = LOCAL_STORE_ADDR . "/" . $file_name_base . '.' . $suffix;

        $has_written = file_put_contents($file_name, $file_content);
        if (!$has_written) {
            return FALSE;
        }
    }
}