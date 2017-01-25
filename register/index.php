<?php
require __DIR__ . '/../vendor/autoload.php';

define("SPOT_USER", "allmodulesapi");
define("SPOT_PASSWORD", "7K7big3WTj");
define("KICKBOX_APP_ID", "cd098ba3e2ae4452e128cfb7afe980de41b74e4f47fe4cc3123ed1b998108192");
define("TEXTLOCAL_USERNAME", "marketing@ivoryoption.com");
define("TEXTLOCAL_HASH", "password123");

if(isset($_POST["name"]) && !empty($_POST["name"])){

    $errors = validateRequest($_POST);

    if($errors != ""){

        echo json_encode([
            "success"   =>  false,
            "data"    =>  $errors
        ]);die;
    }

    $spot = new SpotAPI(SPOT_USER, SPOT_PASSWORD);

    $ip = $spot->getUserIp();
    $location = $spot->getUserLocation();

    $args = [
        "name"          =>  $_POST["name"],
        "email"         =>  $_POST["email"],
        "phone"         =>  $_POST["phone"],
        "password"      =>  generate_password(),
        "country"       =>  $spot->getCountryId(),
        "campaign_id"   =>  $_POST["campaign_id"],
        "sub_campaign"  =>  "jjacobs",
        "a_aid"         =>  $_POST["a_aid"]
    ];


    $FullName = explode(" ",$args["name"], 2);
    $args["FirstName"] = $FullName[0];
    $args["LastName"] = $FullName[1] == "" ? "empty" : $FullName[1];

    $args["phone"] = ltrim($args["phone"], '+');

    $response = $spot->callWithModuleAndCommand("Customer", "add", [
            "FirstName"   =>  $args["FirstName"],
            "LastName"    =>  $args["LastName"],
            "email"       =>  $args["email"],
            "Phone"       =>  $args["phone"],
            "password"    =>  $args["password"],
            "Country"     =>  $args["country"],
            "campaignId"  =>  $args["campaign_id"],
            "subCampaign" =>  $args["sub_campaign"],
            "currency"    =>  "USD",
            "a_aid"       =>  $args["a_aid"],
            "birthday"    =>  "1980-07-21"
    ]);




    if($response->operation_status == "successful"){
            if(sendWelcomeEmail($args)){

                echo json_encode([
                    "success"   =>  true,
                    "data"    =>  [
                        "username"  =>  $args["email"],
                        "password"  =>  $args['password']
                    ]
                ]);die;

            }else{
                echo json_encode([
                    "success"   =>  false,
                    "data"    =>  "<p class='error'>Could not send an email. please refresh the page and try again.</p>"
                ]);die;
            }
    }

    $errors = (array)$response->errors;

    $errorsString = "";

    foreach ($errors as $error) {
        $msg = fromCamelCase( $error );
        $errorsString .= "<p class='error'>{$msg}</p>";
    }
    echo empty($errorsString) ? "Something went wrong, please refresh the page and try again" : $errorsString;
    die;

}

if( isset($_POST["phone_to_verify"]) && !empty($_POST["phone_to_verify"])){

    $digits = 4;
    $phone = $_POST["phone_to_verify"];
    $code = rand(pow(10, $digits-1), pow(10, $digits)-1);

     try{
        $textlocal = new Textlocal( TEXTLOCAL_USERNAME, TEXTLOCAL_HASH );
        $textlocal->sendSms( [$phone] , 'Your verification code is: ' . $code ,'J.JACOBS');
    
    }catch(Exception $e){
        echo "error";die;
    }

    echo $code;die;
}

if( isset($_POST["email_to_verify"]) && !empty($_POST["email_to_verify"])){

    echo "ok";die;

    $email = $_POST["email_to_verify"];

    $client   = new \Kickbox\Client(KICKBOX_APP_ID);
    $kickbox  = $client->kickbox();

    try {
        $response = $kickbox->verify($email);
    }
    catch (Exception $e) {
        $errorsString .= "<p class='error'>We could not verify your email address.</p>";
    }

    if( $response->body["result"] != "deliverable"){
        echo "error";die;
    }

    echo "ok";die;
}

function validateRequest($request){
    $errorsString = "";
    if(empty($request["name"]) || strlen($request["name"]) < 2)
        $errorsString .= "<p class='error'>Name should be at least 2 characters long.</p>";

    if(empty($request["phone"]) || strlen($request["phone"]) < 6)
        $errorsString .= "<p class='error'>Phone is required.</p>";

    if(empty($request["email"]))
        $errorsString .= "<p class='error'>Email is required.</p>";

    return $errorsString;
}

function sendWelcomeEmail($params){

    # get the email template
    $text = file_get_contents("email.txt");
    $text = str_replace(["[NAME]", "[USERNAME]", "[PASSWORD]"], [ $params["name"], $params["email"], $params["password"] ], $text);

    $to = $params["email"];
    $subject = "JJACOBS | Thank you for registering";
    $headers = "From: joshuajacobstrading@gmail.com";

    mail($to,$subject,$text,$headers);
    return true;

}

function fromCamelCase($camelCaseString) {
        $re = '/(?<=[a-z])(?=[A-Z])/x';
        $a = preg_split($re, $camelCaseString);
        return join($a, " " );
}

function generate_password($length = 12, $special_chars = true) {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array();
    $alphaLength = strlen($alphabet) - 1;
    for ($i = 0; $i < $length; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass);
}
