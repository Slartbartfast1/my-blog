<?php
/**
 * Created by PhpStorm.
 * User: huangrui10191180
 * Date: 2018/9/7
 * Time: 10:24
 */

//百度推送
$urls = array(
    'https://www.'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING']
);
$api = 'http://data.zz.baidu.com/urls?appid=1610839708288465&token=RDNHf7JX3GgEPp2H&type=batch';
$ch = curl_init();
$options =  array(
    CURLOPT_URL => $api,
    CURLOPT_POST => true,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POSTFIELDS => implode("\n", $urls),
    CURLOPT_HTTPHEADER => array('Content-Type: text/plain'),
);
curl_setopt_array($ch, $options);
$result = curl_exec($ch);


$urls = array(
    'https://www.'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING']
);
$api = 'http://data.zz.baidu.com/urls?site=https://www.slartbartfast.cn&token=L3AmUHbHUfrPuGv9';
$ch = curl_init();
$options =  array(
    CURLOPT_URL => $api,
    CURLOPT_POST => true,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POSTFIELDS => implode("\n", $urls),
    CURLOPT_HTTPHEADER => array('Content-Type: text/plain'),
);
curl_setopt_array($ch, $options);
$result = curl_exec($ch);
//百度推送
//$urls = array(
//    'https://www.'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING']
//);
//$api = 'http://data.zz.baidu.com/urls?site=https://www.slartbartfast.cn&token=L3AmUHbHUfrPuGv9';
//$ch = curl_init();
//$options =  array(
//    CURLOPT_URL => $api,
//    CURLOPT_POST => true,
//    CURLOPT_RETURNTRANSFER => true,
//    CURLOPT_POSTFIELDS => implode("\n", $urls),
//    CURLOPT_HTTPHEADER => array('Content-Type: text/plain'),
//);
//curl_setopt_array($ch, $options);
//$result = curl_exec($ch);

//mip
$urls = array(
    'https://www.'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING']
);
$api = 'http://data.zz.baidu.com/urls?site=https://www.slartbartfast.cn&token=L3AmUHbHUfrPuGv9&type=mip';
$ch = curl_init();
$options =  array(
    CURLOPT_URL => $api,
    CURLOPT_POST => true,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POSTFIELDS => implode("\n", $urls),
    CURLOPT_HTTPHEADER => array('Content-Type: text/plain'),
);
curl_setopt_array($ch, $options);
$result = curl_exec($ch);
?>
<script>
    //百度
    (function(){
        let bp = document.createElement('script');
        let curProtocol = window.location.protocol.split(':')[0];
        if (curProtocol === 'https') {
            bp.src = 'https://zz.bdstatic.com/linksubmit/push.js';
        }
        else {
            bp.src = 'http://push.zhanzhang.baidu.com/push.js';
        }
        let s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(bp, s);
    })();
    //360
    (function(){
        var src = (document.location.protocol == "http:") ? "http://js.passport.qihucdn.com/11.0.1.js?568e9c7530ebb103da5f5b0a0c894810":"https://jspassport.ssl.qhimg.com/11.0.1.js?568e9c7530ebb103da5f5b0a0c894810";
        document.write('<script src="' + src + '" id="sozz"><\/script>');
    })();
</script>