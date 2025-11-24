<?php
if(!defined('l_ok')) exit('Access Denied');
/**
 * @author		Q冬冬 qq4781335
 * @copyright	Copyright (c) 2006 - 2019  d58.net.
 * @link		http://www.d58.net
 */
if($_urlall=="/"){
$file_mb=l_path."/_cache/mb/".md5($_curl).".txt";
if(!is_file($file_mb)) {
$fsomlx='/_cache/mb/';
if(!is_dir(l_path.''.$fsomlx)) mkpaths($fsomlx);
$url_id=$_curl;
$htmldb=trim(get_url_content($url_id,1));
if(!stristr($htmldb,"<title>")) $htmldb="";
if($htmldb){
$htmldb=dy_ugsh($htmldb,$url_id);
$htmldb=preg_replace('@<(script|iframe)(.*?)</\\1>@is','',$htmldb);
$htmldb=preg_replace('@<meta([^>]*?)(http-equiv="refresh"|name="mobile-agent")([^>]*?)>@is','',$htmldb);
$htmldb=preg_replace('@<base([^>]*?)href=([^>]*?)>@is','',$htmldb);
$htmldb=preg_replace('@<link([^>]*?)rel=[\"\'](canonical|archives|alternate)[\"\']([^>]*?)>@is','',$htmldb);
//$htmldb=preg_replace("/ title=[\"\']([^\"\']*)[\"\']/is", "", $htmldb);
//$htmldb=preg_replace('@<!--(.*?)-->@is','',$htmldb);
$htmldb=preg_replace("'[\r|\n|\t|	]'","",$htmldb);
$htmldb=str_replace("	", "", $htmldb);
$htmldb=str_replace("  ", " ", $htmldb);
$htmldb=str_replace("  ", " ", $htmldb);
$htmldb=trim(str_replace("  ", " ", $htmldb));
$htmldb=str_ireplace($_curl,"", $htmldb);
if(strlen($htmldb)<300) $htmldb="";
}
writetofile($file_mb, $htmldb);
}else{
$htmldb=readfromfile($file_mb);
}
}else{
$htmldb=trim(get_url_content($url_id,1));
if(!stristr($htmldb,"<title>")) $htmldb="";
if($htmldb){
$htmldb=dy_ugsh($htmldb,$url_id);
$htmldb=preg_replace('@<(script|iframe)(.*?)</\\1>@is','',$htmldb);
$htmldb=preg_replace('@<meta([^>]*?)(http-equiv="refresh"|name="mobile-agent")([^>]*?)>@is','',$htmldb);
$htmldb=preg_replace('@<base([^>]*?)href=([^>]*?)>@is','',$htmldb);
$htmldb=preg_replace('@<link([^>]*?)rel=[\"\'](canonical|archives|alternate)[\"\']([^>]*?)>@is','',$htmldb);
//$htmldb=preg_replace("/ title=[\"\']([^\"\']*)[\"\']/is", "", $htmldb);
//$htmldb=preg_replace('@<!--(.*?)-->@is','',$htmldb);
$htmldb=preg_replace("'[\r|\n|\t|	]'","",$htmldb);
$htmldb=str_replace("	", "", $htmldb);
$htmldb=str_replace("  ", " ", $htmldb);
$htmldb=str_replace("  ", " ", $htmldb);
$htmldb=trim(str_replace("  ", " ", $htmldb));
$htmldb=str_ireplace($_curl,"", $htmldb);
}
if(strlen($htmldb)<300) $htmldb="";
}
if(!$htmldb) {
$htmldb='<!DOCTYPE html PUBLIC "-//W4C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gbk" />
<title> </title>
<meta name="keywords" content="{站名}" />
<meta name="description" content="{站名}" />
</head>
<body>
<h1>{站名}</h1>
</body>
</html>';
}
function set_url($content){
return preg_replace_callback("/<a(.*href=[\"\'])([^\"\']*)([\'\"].*)>/iUs", "dy_reurl",$content);
}
function dy_reurl($url){
global $_cmmm;
$c_url='/html/'.$_cmmm.'/'.substr(md5($url[2]),0,12).".html";
$hymurl="";
return "<a{$url[1]}".$hymurl."".$c_url."".$url[3].">";
}
$htmldb=get_encoding($htmldb, "gbk" );
$htmldb=jt2ft($htmldb);
$htmldb=mb_convert_encoding($htmldb,"gbk","big5");
$_urlid=ceil(substr(preg_replace("/[^0-9]/","",md5($_zjt.$_urlall)),0,3));
$ctxtfiles=get_keytxt("key",$_urlid);
$k1=$k2=file($ctxtfiles);
$k1s=$k2s=ceil(count($k1)-1);
//$htmldb=set_url($htmldb);
//if($zdythkg) {
//$htmldb=str_replace(file(l_path."/dbs/thc.txt"), "{站名}",$htmldb);
//}
//if($chakg) $htmldb=get_ckey($htmldb);
//exit($htmldb);
$_keyidm=md5($_zjtmd5.$_dk.$_urlall);
$_keyid=ceil(substr(preg_replace("/[^0-9]/","",$_keyidm),0,5));
$_webname=trim($k1[$_keyid%$k1s]);
$c1=file(l_path.'/dbs/ms.txt');
$c1s=ceil(count($c1)-1);
$_webms=trim($c1[$_webid%$c1s]);
$_webzmbt=dy_ens($_webname);
//if($_urlall=="/"){
$htmldb=preg_replace('@<title>(.*?)</title>@i','<title>{转码站名}</title>',$htmldb);//([^_|-| |_]*)
$htmldb=preg_replace('@<meta([^>]*?)(name="keywords"|name=\'keywords\')([^>]*?)>@is','<meta name="keywords" content="{转码站名}" />',$htmldb);
$htmldb=preg_replace('@<meta([^>]*?)(name="description"|name=\'description\')([^>]*?)>@is','<meta name="description" content="{描述}" />',$htmldb);
//}
$htmldb=preg_replace("/<h([1|2])([^>]*?)>(.{10,})<\/h\\1>/i", "<h$1$2>{站名}</h$1>", $htmldb);
$htmldb=preg_replace("/\d{4}-\d{1,2}-\d{1,2}\s+\d{2}:\d{2}/", date("Y-m-d H:i",time()),$htmldb);
$htmldb=preg_replace("/\d{4}年\d{1,2}月\d{1,2}日\s+\d{2}:\d{2}/", date("Y年m月d日 H:i",time()),$htmldb);
$htmldb=preg_replace("/\d{4}-\d{1,2}-\d{1,2}/", date("Y-m-d",time()),$htmldb);
$htmldb=preg_replace("/\d{4}年\d{1,2}月\d{1,2}日/", date("Y年m月d日",time()),$htmldb);

$chalink='<script type="text/javascript" src="/jquery.min.php"></script>';
$htmldb=preg_replace("/<body([^>]*?)>/i",  "<body$1>".$chalink, $htmldb);
$htmldb=str_ireplace("</body>",  "<a href=\"http://{域名}\" target=\"_blank\">{站名}</a> | <a href=\"http://{地区}.{主域}\" target=\"_blank\">下一页</a> 
<script>
(function() {
var bp=document.createElement('script');
var curProtocol=window.location.protocol.split(':')[0];
if (curProtocol === 'https') {
bp.src='https://zz.bdstatic.com/linksubmit/push.js';        
} else {
bp.src='http://push.zhanzhang.baidu.com/push.js';
}
var s=document.getElementsByTagName(\"script\")[0];
s.parentNode.insertBefore(bp, s);
})();
</script>
</body>", $htmldb);
$htmldb=str_replace("{地区}",rand_dq(), $htmldb);
$htmldb=str_replace("{主域}",$urlhz, $htmldb);
echo $htmldb;
?>