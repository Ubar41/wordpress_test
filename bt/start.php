<?php set_time_limit(0); ?>
<!DOCTYPE html>
<html>
<head>
        <meta charset="8">
        <title></title>
</head>
<body>

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

function curl($url, $post = NULL)
{
    $http_header = array(
        "Accept:text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8",
        "Accept-Language:tr-TR,tr;q=0.8,en-US;q=0.6,en;q=0.4,id;q=0.2,ru;q=0.2,ar;q=0.2,fa;q=0.2",
        "Cache-Control:max-age=0",
        "Upgrade-Insecure-Requests:1",
    );
    $ch = curl_init();
    curl_setopt_array($ch, array(
        CURLOPT_URL            => $url,
        CURLOPT_USERAGENT      => "Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36",
        CURLOPT_RETURNTRANSFER => TRUE,
        CURLOPT_FOLLOWLOCATION => TRUE,
        CURLOPT_ENCODING       => "",
        CURLOPT_SSL_VERIFYPEER => FALSE,
        CURLOPT_SSL_VERIFYHOST => FALSE,
        CURLOPT_MAXREDIRS      => 3,
        CURLOPT_HTTPHEADER     => $http_header,
    ));
    if (isset($post)) {
        curl_setopt_array($ch, array(
            CURLOPT_POST       => TRUE,
            CURLOPT_POSTFIELDS => $post,
            CURLOPT_HTTPHEADER => array_merge($http_header, array(
                "Expect: ",
            )),
        ));
    }
    $content = curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $http_url = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);
    curl_close($ch);
    return (object)array(
        "http_code" => $http_code,
        "http_url"  => $http_url,
        "content"   => $content,
    );
}
/*
$que = curl("https://www.redtube.com");
print_r($que);


echo "<hr>";
$que = curl("https://www.porntube.com");
print_r($que);
echo "<hr>";
$que = curl("https://www.pornhub.com");
print_r($que);
echo "<hr>";

echo "2<hr>";
echo sayfa_oku("https://www.porntube.com",2,3);
echo "3<hr>";
echo sayfa_oku("https://sustenium.com.tr",2);
echo "4<hr>";
echo sayfa_oku("https://www.pornhub.com",2,3);
*/
echo "Kategori Listesi<hr>";
$category = preg_match('#<ul class="videoThumbs five-in-row">(.*?)</ul>#mis',trim(sayfa_oku("https://www.redtube.com/categories",2)),$full_list);
preg_match_all('#<h2 class="categoryTitle">(.*?)</h2>#mis', $full_list[1], $kategori_list);
// print_r($kategori_list[1]); /// Kategori Full Liste

echo "Video Listesi<hr>";
///print_r(trim(sayfa_oku("https://www.redtube.com/redtube/amateur",2)));
$video_preg = preg_match_all('#<div class="widget-video-holder">(.*?)</div> <!-- /.widget-video-holder -->#mis', trim(sayfa_oku("https://www.redtube.com/redtube/amateur",2)),$video_list);

print_r($video_list[1]);
///


?>



</body>
</html>