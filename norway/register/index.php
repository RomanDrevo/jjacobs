<?php

require 'SpotAPI.php';

define("SPOT_USER", "allmodulesapi");
define("SPOT_PASSWORD", "7K7big3WTj");

if(isset($_POST["name"]) && !empty($_POST["name"])){

//var_dump($_POST);die;
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
    "a_aid"         =>  $_POST["a_aid"],
  ];

	$FullName = explode(" ",$args["name"], 2);
  $args["FirstName"] = $FullName[0];
  $args["LastName"] = $FullName[1] == "" ? "empty" : $FullName[1];



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
    echo "OK";
    die;
  }

  var_dump($response);
  die;



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
