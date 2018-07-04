<?php
namespace Grav\Plugin;

use Grav\Common\Plugin;

class LatestTweetsPlugin extends Plugin
{
    public static function getSubscribedEvents()
    {
        return [
            'onPluginsInitialized' => ['onPluginsInitialized', 0],
            'onTwigTemplatePaths' => ['onTwigTemplatePaths', 0],
            'onTwigSiteVariables' => ['onTwigSiteVariables', 0],
        ];
    }
    public function onPluginsInitialized()
    {
        require_once __DIR__ . '/tweets.php';
        $this->grav['twig']->twig_vars['latesttweets'] = display_latest_tweets(
            $this->config->get('plugins.latest-tweets.twitter_id'),
            $this->config->get('plugins.latest-tweets.consumerkey'),
            $this->config->get('plugins.latest-tweets.consumersecret'),
            $this->config->get('plugins.latest-tweets.accesstoken'),
            $this->config->get('plugins.latest-tweets.accesstokensecret'),
            $this->config->get('plugins.latest-tweets.tweets_to_display'),
            $this->config->get('plugins.latest-tweets.ignore_replies'),
            $this->config->get('plugins.latest-tweets.include_rts')
        );
    }
    public function onTwigTemplatePaths()
    {
        $this->grav['twig']->twig_paths[] = __DIR__ . '/templates';
    }

    public function onTwigSiteVariables()
    {
        //Pass a reference to plugin config
        $this->grav['twig']->twig_vars['ltconfig'] = $this->config->get('plugins.latest-tweets');

        if ($this->config->get('plugins.latest-tweets.built_in_css')) {
            $this->grav['assets']
                ->add('plugin://latest-tweets/assets/css/latest-tweets.css');
        }
        if ($this->config->get('plugins.latest-tweets.fontawesome')) {
            $this->grav['assets']
                ->add('https://use.fontawesome.com/releases/v5.0.13/css/all.css');
        }
        $this->grav['assets']
                ->add('https://platform.twitter.com/widgets.js');
    }
}
