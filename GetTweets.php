<?php

  session_start();
  require_once("twitteroauth/twitteroauth/twitteroauth.php"); //Path to twitteroauth library
  
  $search = $_GET['search'];
  $search = "@".$search." OR ".$search." OR "."#".$search;
  $notweets = 60;
  $consumerkey = "iwP37UdA3k2FbovsYHf0bg";
  $consumersecret = "5qMTUMCLBWuElUpiVpnsvPjDgNa6WSwdnSo3MJTxg";
  $accesstoken = "33447590-OhwD9V4FprKJ7oOAhd23NAXPvFGAseV2oTspdrM1A";
  $accesstokensecret = "uyqRhopV8lADXIvYSCCrVkrRWGPfU5N651cfy1wg1yk";
   
  function getConnectionWithAccessToken($cons_key, $cons_secret, $oauth_token, $oauth_token_secret) {
    $connection = new TwitterOAuth($cons_key, $cons_secret, $oauth_token, $oauth_token_secret);
    return $connection;
  }
   
  $connection = getConnectionWithAccessToken($consumerkey, $consumersecret, $accesstoken, $accesstokensecret);
   
  $search = str_replace("#", "%23", $search); 
  $tweets = $connection->get("https://api.twitter.com/1.1/search/tweets.json?q=".$search."&count=".$notweets);
   
  echo json_encode($tweets);

?>