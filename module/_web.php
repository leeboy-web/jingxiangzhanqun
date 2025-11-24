<?php
if(!defined('l_ok')) exit('Access Denied');
/**
 * @author		Q冬冬 qq4781335
 * @copyright	Copyright (c) 2006 - 2019  d58d58.com.
 * @link		http://www.d58d58.com
 */
$mbfile=l_path.'/mb/get.php';
$upsj=0;
if($_urlall=="/") {
$fsoml='/_cache/html/'.$urlhz;
$htmlfile=l_path.''.$fsoml.'/'.$_dkym.'.html';
}else{
//$fso=1;//不生成静态内容页
$mmm=md5($_urlall.$_dkym);
$fuid=substr($mmm,2,2);
$fsoml='/_cache/html/'.$urlhz.'/'.$fuid;
$htmlfile=l_path.''.$fsoml.'/'.$mmm.'.html';
}
?>