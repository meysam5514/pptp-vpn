<?php
error_reporting(0);
header('Content-type: application/json;');
//=========================================================pptp


$ch = curl_init();
//curl_setopt($ch, CURLOPT_POST, true);
//curl_setopt($ch, CURLOPT_POSTFIELDS,$data);
curl_setopt($ch, CURLOPT_URL,"https://www.sshagan.net/?page=vpn-pptp");
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//curl_setopt($ch, CURLOPT_COOKIEJAR,"cookie.txt");
//curl_setopt($ch, CURLOPT_COOKIEFILE, "cookie.txt");
//curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36");
$vpn_pptp= curl_exec($ch);
curl_close($ch);    


preg_match_all('#<td>(.*?)</td>#',$vpn_pptp,$names);
$pptp=$names[1];
$pptpr = array(); 
for($i=0;$i<=count($pptp)-1;$i=$i+3){
$k=$i+1;
$n=$i+2;

$da =['Hostname/IP'=>$pptp[$i],'Username'=>$pptp[$k],'Password'=>$pptp[$n]];
$pptpr[]=$da;
}
//========================================================= 
echo json_encode(['ok' => true, 'channel' => '@SIDEPATH','writer' => '@meysam_s71',  'Results' =>$pptpr], 448);
//========================================================= 
