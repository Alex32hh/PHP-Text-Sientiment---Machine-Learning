<html>
<head>
</head>

<body>

<form enctype="multipart/form-data">
    <textarea name="texto"></textarea><br>
    <button type="submit" name="submit">Pegar o Sentimento</button>
</form>






<?php
    
if(isset($_GET['texto'])){
  
    function translate($text, $from, $to)
      {
      $api = 'trnsl.1.1.20200302T021340Z.588e7c67f57d309e.578c6e5d066056ba01b5ec10a94eea822ed96c16'; // TODO: Get your key from https://tech.yandex.com/translate/
      $url = file_get_contents('https://translate.yandex.net/api/v1.5/tr.json/translate?key=' . $api . '&lang=' . $from . '-' . $to . '&text=' . urlencode($text));
      $json = json_decode($url);
      return $json->text[0];
      }
            $resposta = translate($_GET['texto'],'pt','en');

            echo "Resposta: ".$resposta;


}

?>


<?php

//Fall - Code 
 // When you have your own client ID and secret, put them down here:
 //$CLIENT_ID = "FREE_TRIAL_ACCOUNT";

 //$CLIENT_SECRET = "PUBLIC_SECRET_API";
 

 // Specify your translation requirements here:
 //$postData = array(
 //'fromLang' => "pt",
 //'toLang' => "en",
 //'text' => "".$_GET['texto'].""
 //);



 //$headers = array(
 //'Content-Type: application/json',
 //'X-WM-CLIENT-ID: '.$CLIENT_ID,
 //'X-WM-CLIENT-SECRET: '.$CLIENT_SECRET
 //);

 //$url = 'http://api.whatsmate.net/v1/translation/translate';
 //$ch = curl_init($url);

 //curl_setopt($ch, CURLOPT_POST, 1);
 //curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 //curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
 //curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));

 //$resposta = curl_exec($ch);

 //echo "Resposta: ".$resposta;
 //curl_close($ch);



if($resposta != ""){
 //ESTE CODIGO DEVOLVE O SENTIMENTO DO TEXTO
      function detect_sentiment($string){

        $string = urlencode($string);

        $api_key = "1816ef14fd4e37b8234860bda6b01b";

        $url = 'https://api.paysify.com/sentiment?api_key='.$api_key.'&string='.$string.'';

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $result = curl_exec($ch);

        $response = json_decode($result,true);

        curl_close($ch);

        return $response;
      }
	  
      $string = $resposta;
      $data = detect_sentiment($string);
      echo "<pre>";
      print_r($data);
      echo "</pre>";
    }
?>


<?php

//IBM WATSON - Falll
//$apikey = "Dim_RiBjoJc7O7AU4HGEWjK7wTBMqll3sYhHW6yglZco";
//$urlInk = "https://gateway.watsonplatform.net/natural-language-understanding/api/v1/analyze?version=2019-07-12&url=www.ibm.com&features=keywords,entities&entities.emotion=true&entities.sentiment=true&keywords.emotion=true&keywords.sentiment=true";
// create curl resource
//$ch = curl_init();

// set url
//curl_setopt($ch, CURLOPT_URL, $urlInk);
//curl_setopt($ch,CURLOPT_KEYPASSWD,$apikey);

//return the transfer as a string
//curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

// $output contains the output string
//$output = curl_exec($ch);

//echo $output;

// close curl resource to free up system resources
//curl_close($ch);     

?>




</body>

</html>