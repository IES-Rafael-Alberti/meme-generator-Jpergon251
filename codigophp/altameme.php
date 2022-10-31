<?php
//url for meme creation
$url = 'https://api.imgflip.com/caption_image';

//The data you want to send via POST
$fields = array(
        "template_id" => $_GET['id'],
        "username" => "fjortegan",
        "password" => "pestillo",
        "boxes" => array());



//url-ify the data for the POST
$fields_string = http_build_query($fields);

//open connection
$ch = curl_init();

//set the url, number of POST vars, POST data
curl_setopt($ch,CURLOPT_URL, $url);
curl_setopt($ch,CURLOPT_POST, true);
curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);

//So that curl_exec returns the contents of the cURL; rather than echoing it
curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 

//execute post
$result = curl_exec($ch);

//decode response
$data = json_decode($result, true);

//if success show image

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Altameme</title>
</head>
<body>
    <form action="" method="post">
        <?php
            echo "<input type='hidden' name='cajas' value='<?php echo". $_GET['cajas'] ."; ?>'>";
            echo "<input type='hidden' name='id' value='<?php echo ". $_GET['id'] ."; ?>'>";
            //if($data["success"]) {
                //echo "<img src='". $data['data']['url'] ."'>";
                echo "<img width='500px' src='". $_GET['url'] ."'>";
                for ($i = 1; $i <= $_GET['cajas']; $i++) {
                    echo "<br><input type='text' name='caja$i' id='caja$i'><br>";
                }               
            //}
            
        ?>
        <input type="submit" value="Ver">
        
    </form>
</body>
</html>