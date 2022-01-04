<?php

$token="bot123456:xxxxxxx";//机器人TOKEN @Botfather 获取
//Emoji 表情转换
function emoji($country){
	$replace=array('%F0%9F%87%A6','%F0%9F%87%A7','%F0%9F%87%A8','%F0%9F%87%A8','%F0%9F%87%AA','%F0%9F%87%AB','%F0%9F%87%AC','%F0%9F%87%AD','%F0%9F%87%AE','%F0%9F%87%AF','%F0%9F%87%B0','%F0%9F%87%B1','%F0%9F%87%B2','%F0%9F%87%B3','%F0%9F%87%B4','%F0%9F%87%B5','%F0%9F%87%B6','%F0%9F%87%B7','%F0%9F%87%B8','%F0%9F%87%B9','%F0%9F%87%BA','%F0%9F%87%BB','%F0%9F%87%BC','%F0%9F%87%BD','%F0%9F%87%BE','%F0%9F%87%BF');
	$find=array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z');
	$emoji=str_replace($find,$replace,$country);
	return $emoji;
}
//模拟获取网页
function Telegram_put($url,$cookie=""){ // 模拟提交数据函数
    $curl = curl_init(); // 启动一个CURL会话
    curl_setopt($curl, CURLOPT_URL, $url); // 要访问的地址
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0); // 对认证证书来源的检查
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0); // 从证书中检查SSL加密算法是否存在
    curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']); // 模拟用户使用的浏览器
	curl_setopt($curl, CURLOPT_COOKIE, $cookie);
    curl_setopt($curl, CURLOPT_REFERER,'https://www.google.com');// 设置Referer
    curl_setopt($curl, CURLOPT_POST, 0); // 发送一个常规的Post请求
    curl_setopt($curl, CURLOPT_TIMEOUT, 30); // 设置超时限制防止死循环
    curl_setopt($curl, CURLOPT_HEADER, 0); // 显示返回的Header区域内容
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); // 获取的信息以文件流的形式返回
    $tmpInfo = curl_exec($curl); // 执行操作
    if (curl_errno($curl)) {
       echo 'Errno'.curl_error($curl);//捕抓异常
    }
    curl_close($curl); // 关闭CURL会话
    return $tmpInfo; // 返回数据
}



$text=urlencode(" 云短信(YunDuanXin.Net)\n\n 新增号码: 中国 ").emoji("cn").urlencode("\n 更新时间:".date("Y-m-d H:i",time())." \n  +86 18531891750");
$reply_markup='{"type": "InlineKeyboardMarkup","inline_keyboard": [[{"text": "接收短信","url": "https://yunduanxin.net/info/8618531891750/"}]]}';
$chat_id="-1001257540040";//群ID 或者用户ID

$url="https://api.telegram.org/".$token."/sendMessage?parse_mode=HTML&disable_web_page_preview=1&chat_id=".$chat_id."&text=".$text."&reply_markup=".urlencode($reply_markup);
/*参数
chat_id	群ID 或者用户ID

text=文字 支持一下html 格式

<b>bold</b>, <strong>bold</strong>
<i>italic</i>, <em>italic</em>
<a href="http://www.example.com/">inline URL</a>
<a href="tg://user?id=123456789">inline mention of a user</a>
<code>inline fixed-width code</code>
<pre>pre-formatted fixed-width code block</pre>
需要 urlencode();


reply_markup  外链按钮  Json格式 支持多个按钮
需要 urlencode();



*/
Telegram_put($url);










?>