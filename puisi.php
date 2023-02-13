<?php
$OPENAI_APIKEY = "";
$nama_mu = "";
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.openai.com/v1/completions',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => '{
    "model": "text-davinci-002",
    "prompt": "Buatlah sebuah puisi romantis untuk [nama_pasangamu]",
    "max_tokens":1024,
    "temperature":0.5
  }',
  CURLOPT_HTTPHEADER => array(
    "Content-Type: application/json",
    "Authorization: Bearer $OPENAI_APIKEY"
  ),
));

$response = curl_exec($curl);
curl_close($curl);

$response_data = json_decode($response, true);
$generated_text = $response_data["choices"][0]["text"];
$generated_text = ltrim($generated_text, "\r\n");

date_default_timezone_set('Asia/Jakarta');
$current_date = date("d F Y - H:i T");
$generated_text = $generated_text . "\n\nSalam Sayang dari $nama_mu - " . $current_date;

echo $generated_text;

if (empty($generated_text)) {
    echo "Failed to generate text";
    exit;
}

$token = "YOUR_FONNTE_API";
$target = "TARGET_PHONE_NUMBER";

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.fonnte.com/send',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => array(
    'target' => $target,
    'message' => $generated_text,
  ),
  CURLOPT_HTTPHEADER => array(
    "Authorization: $token"
  ),
));

$response = curl_exec($curl);
curl_close($curl);
echo $response;
