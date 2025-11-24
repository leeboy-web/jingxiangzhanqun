<?php
if(!defined('l_ok')) exit('Access Denied');
/**
 * @author		Q¶¬¶¬ qq4781335
 * @copyright	Copyright (c) 2006 - 2019  d58d58.com.
 * @link		http://www.d58d58.com
 */
if(!str_replace($urlhz,'',$_zjt)){
header('Location: http://www.'.$urlhz.'/',true,301);
exit();
}
function get_ckey($txt){
for($i=0;$i<rand(5,10);$i++)
{
$insert[$i]='{zm}';
}
$txt=mb_convert_encoding($txt,'utf-8','gbk');
    preg_match_all("/[\x01-\x7f]|[\xe0-\xef][\x80-\xbf]{2}/", $txt, $match);
    $delay=array();
    $add=0;
    foreach($match[0] as $k=>$v){
        if($v=='<') $add=1;
        if($add==1) $delay[]=$k;
        if($v=='>') $add=0;
    }
    $str_arr=$match[0];
    $len=count($str_arr);
    foreach($insert as $k=>$v){
        $insertk=insertK($len-1,$delay);
        $str_arr[$insertk].=$insert[$k];
    }
    return mb_convert_encoding(join('',$str_arr),'gbk','utf-8');
}

function insertK($count,$delay){
    $insertk=rand(0,$count);
    if(in_array($insertk,$delay)){
        $insertk=insertK($count,$delay);
    }
    return $insertk;
}
function dy_ens($str,$encoding='gbk',$prefix='&#',$postfix=';') {
$name=mb_convert_encoding($str, 'HTML-ENTITIES', 'gbk');
return $name;
}
function get_keytxt($ml="key",$keysid="0"){
$duml = l_path."/dbs/".$ml."/";
$files = dir($duml);  
$ii=0; 
while ($current = $files->read()){
if (strpos($current, ".txt")!= FALSE) { 
$iurl[$ii]=$current;
$ii++; 
}} 
return $duml.$iurl[$keysid%$ii];  
}
function get_xx($kkk){
$kkk=str_replace('.','_',$kkk);
return $kkk;
}
function Curlpic($url){
  $ch = curl_init();$timeout = 30; 
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
  curl_setopt($ch, CURLOPT_HEADER, false);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_REFERER, $url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
  curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
  curl_setopt($ch,CURLOPT_USERAGENT,"Mozilla/5.0 (Windows NT 10.0; WOW64; Trident/7.0; rv:11.0) like Gecko");
  $file_contents = curl_exec($ch);
  curl_close($ch);
return($file_contents);
}
$ctxtfiles=l_path.'/dbs/host.txt';
$h1=file($ctxtfiles);
$h1s=ceil(count($h1)-1);
function cw_33(){
global $h1,$h1s;
$ffid=ceil(substr(preg_replace("/[^0-9]/","",md5($_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'])),0,5));
$ttid=$ffid%$h1s;
$links=trim($h1[$ttid]);
header("HTTP/1.1 301 Moved Permanently");
header('Location: http://'.$links.'/');
exit();
}
if(!dy_k_no("##".$urlhz."
##",$h1)) cw_dm("400");
$ctxtfiles=l_path.'/dbs/url.txt';
$u1=file($ctxtfiles);
$u1s=ceil(count($u1)-1);
$_dkym=md5($_zjtmd5.$_dk);
$_cmmm=substr($_dkym,0,6);
$_webid=ceil(substr(preg_replace("/[^0-9]/","",$_dkym),0,5));
$_curl=trim($u1[$_webid%$u1s]);

$urlid=$_curl.$_urlall;
$url_id="".$urlid;
$_fml=ceil(substr(preg_replace("/[^0-9]/","",md5($_curl)),0,3));
if(strstr("gif jpg png jpeg", $hzm)){
$fsomlx='/_cache/jpg/'.$_fml.'/';
$filename=l_path.''.$fsomlx.''.md5($url_id).'';
if(!is_file($filename)){ 
$htmldb=Curlpic($url_id);
if(!is_dir(l_path.''.$fsomlx)) mkpaths($fsomlx);
writetofile($filename,$htmldb);
}else{
$htmldb=file_get_contents($filename);
}
if(substr($hzm,0,3)=="png"){
header("Content-Type: image/x-png");
}
else if(substr($hzm,0,3)=="gif"){
header("Content-Type: image/gif");
}else{
Header("Content-type: image/pjpeg");
}
echo $htmldb;
exit();
}
if(substr($hzm,0,3)=="css"){
$fsomlx='/_cache/css/'.$_fml.'/';
$filename=l_path.''.$fsomlx.''.md5($url_id).'.css';
if(!is_file($filename)){ 
$htmldb=get_url_content($url_id,1);
$htmldb=str_ireplace($_curl,"", $htmldb);
if(!is_dir(l_path.''.$fsomlx)) mkpaths($fsomlx);
writetofile($filename,$htmldb);
}else{
$htmldb=file_get_contents($filename);
}
header('content-type:text/css');
exit($htmldb);
}
if(substr($hzm,0,2)=="js"){
exit();
$fsomlx='/_cache/js/'.$_fml.'/';
$filename=l_path.''.$fsomlx.''.md5($url_id).'.js';
if(!is_file($filename)){ 
$htmldb=get_url_content($url_id,1);
if(!is_dir(l_path.''.$fsomlx)) mkpaths($fsomlx);
writetofile($filename,$htmldb);
}else{
$htmldb=file_get_contents($filename);
}
header('content-type:text/javascript');
exit($htmldb);
}
$__nopic=$delchajs=1;
$text='d58.net';
$charset='gbk';
$aid="web";
?>