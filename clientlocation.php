<?php

/**
* This is a PHP class that will detect the client location using IpInfoDb API
*/
class ClientLocation
{
  private $appkey, $userip;
  function __construct($key)
  {
    $this->appkey = $key;
    $this->userip = $this->get_client_ip();
    if (strlen($this->userip) < 6) {
       echo "<span style='color:red;border:solid 2px red;padding:4px;font-size:1.1em;'>IP address cannot be detected offline or on localhost server or some other issue may occur.</span>";
       exit();
    }
  }

   private function get_client_ip() {
        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if(getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if(getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if(getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if(getenv('HTTP_FORWARDED'))
           $ipaddress = getenv('HTTP_FORWARDED');
        else if(getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
   }

  private function iiddecode() {
    $jsoncont = file_get_contents("http://api.ipinfodb.com/v3/ip-city/?key=".$this->appkey."&ip=".$this->userip."&format=json");
    $getdecoded = json_decode($jsoncont, true);
    return $getdecoded;
  }
  public function city() {
       return $this->iiddecode()['cityName'];
  }
  //country
  public function country() {
       return $this->iiddecode()['countryName'];
  }
  // country code
  public function countrycode() {
       return $this->iiddecode()['countryCode'];
  }
  // regiom name
  public function region() {
       return $this->iiddecode()['regionName'];
  }
  // let from IP
     public function latFromIp() {
       return $this->iiddecode()['latitude'];
  }
  // lon from IP
    public function longFromIp() {
       return $this->iiddecode()['longitude'];
  }
}

?>
