<?php

$token="bot123456:xxxxxxx";//������TOKEN @Botfather ��ȡ
//Emoji ����ת��
function emoji($country){
	$replace=array('%F0%9F%87%A6','%F0%9F%87%A7','%F0%9F%87%A8','%F0%9F%87%A8','%F0%9F%87%AA','%F0%9F%87%AB','%F0%9F%87%AC','%F0%9F%87%AD','%F0%9F%87%AE','%F0%9F%87%AF','%F0%9F%87%B0','%F0%9F%87%B1','%F0%9F%87%B2','%F0%9F%87%B3','%F0%9F%87%B4','%F0%9F%87%B5','%F0%9F%87%B6','%F0%9F%87%B7','%F0%9F%87%B8','%F0%9F%87%B9','%F0%9F%87%BA','%F0%9F%87%BB','%F0%9F%87%BC','%F0%9F%87%BD','%F0%9F%87%BE','%F0%9F%87%BF');
	$find=array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z');
	$emoji=str_replace($find,$replace,$country);
	return $emoji;
}
//ģ���ȡ��ҳ
function Telegram_put($url,$cookie=""){ // ģ���ύ���ݺ���
    $curl = curl_init(); // ����һ��CURL�Ự
    curl_setopt($curl, CURLOPT_URL, $url); // Ҫ���ʵĵ�ַ
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0); // ����֤֤����Դ�ļ��
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0); // ��֤���м��SSL�����㷨�Ƿ����
    curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']); // ģ���û�ʹ�õ������
	curl_setopt($curl, CURLOPT_COOKIE, $cookie);
    curl_setopt($curl, CURLOPT_REFERER,'https://www.google.com');// ����Referer
    curl_setopt($curl, CURLOPT_POST, 0); // ����һ�������Post����
    curl_setopt($curl, CURLOPT_TIMEOUT, 30); // ���ó�ʱ���Ʒ�ֹ��ѭ��
    curl_setopt($curl, CURLOPT_HEADER, 0); // ��ʾ���ص�Header��������
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); // ��ȡ����Ϣ���ļ�������ʽ����
    $tmpInfo = curl_exec($curl); // ִ�в���
    if (curl_errno($curl)) {
       echo 'Errno'.curl_error($curl);//��ץ�쳣
    }
    curl_close($curl); // �ر�CURL�Ự
    return $tmpInfo; // ��������
}



$text=urlencode(" �ƶ���(YunDuanXin.Net)\n\n ��������: �й� ").emoji("cn").urlencode("\n ����ʱ��:".date("Y-m-d H:i",time())." \n  +86 18531891750");
$reply_markup='{"type": "InlineKeyboardMarkup","inline_keyboard": [[{"text": "���ն���","url": "https://yunduanxin.net/info/8618531891750/"}]]}';
$chat_id="-1001257540040";//ȺID �����û�ID

$url="https://api.telegram.org/".$token."/sendMessage?parse_mode=HTML&disable_web_page_preview=1&chat_id=".$chat_id."&text=".$text."&reply_markup=".urlencode($reply_markup);
/*����
chat_id	ȺID �����û�ID

text=���� ֧��һ��html ��ʽ

<b>bold</b>, <strong>bold</strong>
<i>italic</i>, <em>italic</em>
<a href="http://www.example.com/">inline URL</a>
<a href="tg://user?id=123456789">inline mention of a user</a>
<code>inline fixed-width code</code>
<pre>pre-formatted fixed-width code block</pre>
��Ҫ urlencode();


reply_markup  ������ť  Json��ʽ ֧�ֶ����ť
��Ҫ urlencode();



*/
Telegram_put($url);










?>