<?php
  $chatApiToken = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJleHAiOjE2MjUxMzM0MjgsInVzZXIiOiI5MTk0MDA5MjkxNTEifQ.S2OMBknv9YVE1A30VNtEnd_Okvcy4_RN5zAPEgEyRmo"; // Get it from https://www.phphive.info/255/get-whatsapp-password/
  if ($file = fopen("numbers.txt", "r")) {
      while(!feof($file)) {
          $line = fgets($file);
          $phone = $line;
          $number = $phone; // Number
          $message = "Hai sibin thomas"; // Message

          $curl = curl_init();
          curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://chat-api.phphive.info/message/send/text',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>json_encode(array("jid"=> $number."@s.whatsapp.net", "message" => $message)),
            CURLOPT_HTTPHEADER => array(
              'Authorization: Bearer '.$chatApiToken,
              'Content-Type: application/json'
            ),
          ));

          $response = curl_exec($curl);
          curl_close($curl);
          //echo $response;
          echo $phone.">>Sent\n";
      }
      fclose($file);
  }
//http://chat-api.phphive.info/login/gui
//https://www.phphive.info/285/how-to-send-and-receive-messages-in-whatsapp-using-php/
?>
