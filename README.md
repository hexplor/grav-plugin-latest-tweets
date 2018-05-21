# Latest Tweets Plugin

**This README.md file should be modified to describe the features, installation, configuration, and general usage of this plugin.**

The **Latest Tweets** Plugin is for [Grav CMS](http://github.com/getgrav/grav). It will display latest tweets from your twitter account on your [Grav CMS](http://github.com/getgrav/grav) website using PHP and OAuth.

## Installation

Installing the Latest Tweets plugin can be done in one of two ways. The GPM (Grav Package Manager) installation method enables you to quickly and easily install the plugin with a simple terminal command, while the manual method enables you to do so via a zip file.

### GPM Installation (Preferred)

The simplest way to install this plugin is via the [Grav Package Manager (GPM)](http://learn.getgrav.org/advanced/grav-gpm) through your system's terminal (also called the command line).  From the root of your Grav install type:

    bin/gpm install latest-tweets

This will install the Latest Tweets plugin into your `/user/plugins` directory within Grav. Its files can be found under `/your/site/grav/user/plugins/latest-tweets`.

### Manual Installation

To install this plugin, just download the zip version of this repository and unzip it under `/your/site/grav/user/plugins`. Then, rename the folder to `latest-tweets`. You can find these files on [GitHub](https://github.com/hexplor/grav-plugin-latest-tweets) or via [GetGrav.org](http://getgrav.org/downloads/plugins#extras).

You should now have all the plugin files under

    /your/site/grav/user/plugins/latest-tweets
	
> NOTE: This plugin is a modular component for Grav which requires [Grav](http://github.com/getgrav/grav) and the [Error](https://github.com/getgrav/grav-plugin-error) and [Problems](https://github.com/getgrav/grav-plugin-problems) to operate.

### Admin Plugin

If you use the admin plugin, you can install directly through the admin plugin by browsing the `Plugins` tab and clicking on the `Add` button.

## Configuration
Before configuring this plugin, you should copy the `user/plugins/latest-tweets/latest-tweets.yaml` to `user/config/plugins/latest-tweets.yaml` and only edit that copy.

Firstly you will need to register your app / website with Twitters developer site. (https://dev.twitter.com) you will then get your consumer key, consumer secret, access token and your access token secret. You then need to add them to your config file.

Here is the default configuration and an explanation of available options:

```yaml
enabled: true
twitter_id: twitter_id_goes_here
tweets_to_display: 4, # Number of tweets you would like to display.
ignore_replies : true # Ignore replies from the timeline. 
include_rts: false # Include retweets. 
consumerkey: XXX
consumersecret: XXX
accesstoken: XXX
accesstokensecret: XX
```

Note that if you use the admin plugin, a file with your configuration, and named latest-tweets.yaml will be saved in the `user/config/plugins/` folder once the configuration is saved in the admin.

Usage
========================
Use latest-tweets/templates/partials/latest-tweets.html.twig template with built in styling or build your own theme. 

Notes
========================

Twitter feeds may contain UTF-8 characters. I have found that running PHP’s utf_decode method on tweets didn’t have the expected result, so my recommendation is to instead set the charset of your HTML page to UTF-8. Really we should all be doing this anyway. (http://www.w3.org/International/O-charset)


Credits
========================

latest-tweets-php-o-auth by andrewbiggart
https://github.com/andrewbiggart/latest-tweets-php-o-auth

Orginally using Pixel Acres script (http://f6design.com/journal/2010/10/07/display-recent-twitter-tweets-using-php/). But since Twitter has retired API v1.0, the script no longer worked because it didn't include authentication. I have now modified the script to include authentication using API v1.1.

The hashtag/username parsing in andrewbiggart example is from Get Twitter Tweets (http://snipplr.com/view/16221/get-twitter-tweets/) by gripnrip (http://snipplr.com/users/gripnrip/).

andrewbiggart RSS parsing is based on replies in the forum discussion "embedding twitter tweets" on the Boagworld website. (http://boagworld.com/forum/comments.php?DiscussionID=4639)

Authentication with Twitter uses twitteroauth. (https://github.com/abraham/twitteroauth)

## To Do

- [ ] Add Grav Caching

License
========================

The MIT License (MIT)

Copyright (c) 2013 Andrew Biggart

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.

