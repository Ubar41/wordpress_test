<?php 
function sayfa_oku($url,$ssl=false,$post=false,$post_field=array()){
/*$post_field = array(
        "txtUserId"=>$id,
    "Password"=>$pw,
    "LoginButton"=>"sumbit",
        "__VIEWSTATE"=>$viewstate,
        "__EVENTVALIDATION"=>$eventvalidation
);*/

/*
curl_setopt($ch, CURLOPT_PROXYAUTH, CURLAUTH_NTLM);
curl_setopt($ch, CURLOPT_PROXY, 'proxy:8080');    
curl_setopt($ch, CURLOPT_PROXYPORT, 8080);    
curl_setopt($ch, CURLOPT_PROXYUSERPWD, 'domain\user:password');    
*/
 $http_header = array(
        "Accept:text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8",
        "Accept-Language:tr-TR,tr;q=0.8,en-US;q=0.6,en;q=0.4,id;q=0.2,ru;q=0.2,ar;q=0.2,fa;q=0.2",
        "Cache-Control:max-age=0",
        "Upgrade-Insecure-Requests:1",
    );
$options = array(
CURLOPT_RETURNTRANSFER => true,
CURLOPT_SSL_VERIFYHOST =>$ssl,
CURLOPT_SSL_VERIFYPEER =>$ssl,
//CURLOPT_SSLVERSION     => $ssl_version,
CURLOPT_FOLLOWLOCATION => true,
CURLOPT_ENCODING => "",
CURLOPT_COOKIEFILE=> 'cerez.txt', //çerez yolumuz
CURLOPT_COOKIEJAR=> 'cerez.txt',//çerez yolumuz
CURLOPT_USERAGENT => "Opera/9.21 (Windows NT 5.1; U; tr)", 
//CURLOPT_AUTOREFERER => true,
CURLOPT_CONNECTTIMEOUT => 120,
CURLOPT_TIMEOUT => 1120,
CURLOPT_MAXREDIRS => 10,
//CURLOPT_POST => $post,
//CURLOPT_VERBOSE => true,
//CURLOPT_POSTFIELDS => http_build_query($post_field),
CURLOPT_HTTPHEADER=> $http_header,
);
$ch = curl_init($url);
curl_setopt_array($ch,$options);
$result = curl_exec($ch);
curl_close($ch);

return $result;

}


$q = rawurlencode("May");


/*
https://translate.google.com/translate_a/single?client=t&sl=en&tl=tr&hl=tr&dt=at&dt=bd&dt=ex&dt=ld&dt=md&dt=qca&dt=rw&dt=rm&dt=ss&dt=t&ie=UTF-8&oe=UTF-8&kc=0&tk=507886.122707&q=Today
*/

/*
https://translate.google.com/translate_a/single?client=t&sl=en&tl=tr&hl=tr&dt=at&dt=bd&dt=ex&dt=ld&dt=md&dt=qca&dt=rw&dt=rm&dt=ss&dt=t&ie=UTF-8&oe=UTF-8&otf=1&ssel=3&tsel=6&source=bh&kc=3&tk=507886.122707&q=Today
*/
$arr = json_decode(sayfa_oku("https://translate.google.com/translate_a/single?client=t&sl=en&tl=tr&hl=tr&dt=at&dt=bd&dt=ex&dt=ld&dt=md&dt=qca&dt=rw&dt=rm&dt=ss&dt=t&ie=UTF-8&oe=UTF-8&otf=1&ssel=3&tsel=6&source=bh&kc=3&tk=507886.122707&q=May",2),true);

print_r($arr);
?>
