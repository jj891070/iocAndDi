<?php
require_once 'catch_Interface.php';
class honkongGetRaw implements Catch{

    public function getRaw($url)
    {
        $ch=curl_init();
        $options = array(
                 CURLOPT_URL            => $url,
                 CURLOPT_RETURNTRANSFER => true,
                 CURLOPT_USERAGENT      => "Google Bot",
        );
        curl_setopt_array($ch, $options);
        $original=curl_exec($ch);
        $original=gzdecode($original);//解壓縮
        curl_close($ch);
        $original=str_replace(array("\r","\t","\n"),'',$original);
        return $original;
    }
}
?>