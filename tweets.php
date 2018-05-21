<?php
// Set timezone. (Modify to match your timezone) If you need help with this, you can find it here. (http://php.net/manual/en/timezones.php)
date_default_timezone_set('Europe/London');

// Require TwitterOAuth files. (Downloadable from : https://github.com/abraham/twitteroauth)
require_once __DIR__ . "/twitteroauth/twitteroauth/twitteroauth.php";

// Function to authenticate app with Twitter.
function getConnectionWithAccessToken($cons_key, $cons_secret, $oauth_token, $oauth_token_secret)
{
    $connection = new \TwitterOAuth($cons_key, $cons_secret, $oauth_token, $oauth_token_secret);
    return $connection;
}

function display_latest_tweets(
    $twitter_user_id,
    $consumerkey,
    $consumersecret,
    $accesstoken,
    $accesstokensecret,
    $tweets_to_display = 5, // Number of tweets you would like to display. (Default : 5)
    $ignore_replies = false, // Ignore replies from the timeline. (Default : false)
    $include_rts = false // Include retweets. (Default : false)
) {

    // Cache file not found, or old. Authenticae app.
    $connection = getConnectionWithAccessToken($consumerkey, $consumersecret, $accesstoken, $accesstokensecret);

    if ($connection) {
        // Get the latest tweets from Twitter
        $get_tweets = $connection->get("https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=" . $twitter_user_id . "&count=" . $tweets_to_display . "&include_rts=" . $include_rts . "&exclude_replies=" . $ignore_replies);
        return $get_tweets;
    } else {
        return false;
    }
}
