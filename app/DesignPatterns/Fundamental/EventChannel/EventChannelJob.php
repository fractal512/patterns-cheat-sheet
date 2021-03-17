<?php


namespace App\DesignPatterns\Fundamental\EventChannel;


use App\DesignPatterns\Fundamental\EventChannel\Classes\EventChannel;
use App\DesignPatterns\Fundamental\EventChannel\Classes\Publisher;
use App\DesignPatterns\Fundamental\EventChannel\Classes\Subscriber;

class EventChannelJob
{
    public function run()
    {
        // Event Channel entity
        $newsChannel = new EventChannel();

        // Publisher entities
        $highgardenNews = new Publisher('highgarden-news', $newsChannel);

        $winterfellNews = new Publisher('winterfell-news', $newsChannel);
        $winterfellDaily = new Publisher('winterfell-news', $newsChannel);

        // Subscriber entities
        $sansa = new Subscriber('Sansa Stark');
        $arya = new Subscriber('Arya Stark');
        $cersei = new Subscriber('Cersei Lanister');
        $snow = new Subscriber('Jon Snow');

        // Subscribing subscribers on publishers
        $newsChannel->subscribe('highgarden-news', $cersei);

        $newsChannel->subscribe('winterfell-news', $sansa);

        $newsChannel->subscribe('highgarden-news', $arya);
        $newsChannel->subscribe('winterfell-news', $arya);

        $newsChannel->subscribe('winterfell-news', $snow);

        // Publishing news by all publishers
        $highgardenNews->publish('Fresh news from Highgarden');
        $winterfellNews->publish('Fresh news from Winterfell');
        $winterfellDaily->publish('Daily news from Winterfell');
    }
}
