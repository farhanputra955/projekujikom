<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $data = json_decode(file_get_contents("http://muslimsalat.com/".$_GET['location'].".json?key=APIKEY_KAMU"), TRUE);
    $shubuh = $data['items'][0]['fajr'];
    $dzuhur = $data['items'][0]['dhuhr'];
    $ashar = $data['items'][0]['asr'];
    $maghrib = $data['items'][0]['maghrib'];
    $isya = $data['items'][0]['isha'];
    ?>  
</body>
</html>
