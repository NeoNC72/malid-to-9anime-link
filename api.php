<?php   

set_error_handler(function($errno, $errstr, $errfile, $errline) {
  // error was suppressed with the @-operator
  if (0 === error_reporting()) {
      return false;
  }
  
  throw new ErrorException($errstr, 0, $errno, $errfile, $errline);
});


$data = json_decode(file_get_contents("namesedited.json"), true);





function api(string $var = null)
{
    $curl = curl_init();
    curl_setopt_array($curl, [
        CURLOPT_URL => sprintf("https://api.myanimelist.net/v2/anime/%s?fields=alternative_titles", $var),
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_POSTFIELDS => "",
        CURLOPT_HTTPHEADER => [
          "X-MAL-CLIENT-ID: !!!!!!!!!!!!!!!!!!!!!!TOKEN!!!!!!!!!!!!!!!!"
        ],
      ]);
      
      $response = curl_exec($curl);
      $err = curl_error($curl);
      
      curl_close($curl);
      
      if ($err) {
        echo "cURL Error #:" . $err;
      } else {
        return json_decode($response, true);
      }
    } 
$abc = api($_GET['id']);
try{
  echo "https://9anime.to" . $data[$abc["alternative_titles"]["en"]];
  
}catch (ErrorException $e){
  
  try{
    echo "https://9anime.to" .  $data[$abc["title"]];
  
  }catch (ErrorException $ee) {
    echo "https://9anime.to/";
  }
  
  

}

?>