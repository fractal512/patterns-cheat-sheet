<?php

namespace App\Http\Controllers;

use App\DesignPatterns\Fundamental\Delegation\AppMessenger;
use App\DesignPatterns\Fundamental\EventChannel\EventChannelJob;
use App\DesignPatterns\Fundamental\PropertyContainer\BlogPost;
use App\DesignPatterns\Fundamental\PropertyContainer\PropertyContainer;
use Illuminate\Support\Facades\Log;

class FundamentalPatternsController extends Controller
{
    /**
     * Property Container Pattern
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function PropertyContainer()
    {
        $name = 'Property Container Pattern';
        $description = PropertyContainer::getDescription();

        $item = new BlogPost();

        $item->setTitle('Post title');
        $item->setCategoryId(10);

        $item->addProperty('view_count', 100);

        $item->addProperty('last_update', '2030-02-01');
        $add_last_update = clone $item;
        $item->addProperty('last_update', '2030-02-02');
        $change_last_update = clone $item;

        $item->addProperty('read_only', true);
        $add_read_only = clone $item;
        $item->deleteProperty('read_only');

        return view('propertyContainer',
            compact(
                'name',
                'description',
                'add_last_update',
                'change_last_update',
                'add_read_only',
                'item'
            )
        );
    }

    /**
     * Delegation Pattern
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function Delegation()
    {
        $name = 'Delegation';
        $this->clearLaravelLog()->logMessage($name);

        $item = new AppMessenger();

        $item->setSender('sender@email.com')
             ->setRecipient('recipient@email.com')
             ->setMessage('Message sent by email messenger.')
             ->send();

        $this->logMessage( print_r($item, true) );

        $item->toSms()
             ->setSender('0931234567')
             ->setRecipient('0671234567')
             ->setMessage('Message sent by SMS messenger')
             ->send();

        $this->logMessage( print_r($item, true) );

        return view('delegation', compact('name', 'item'));
    }

    /**
     * Event Channel Pattern
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function EventChannel()
    {
        $name = 'Event Channel Pattern';
        $this->clearLaravelLog()->logMessage($name);

        $item = new EventChannelJob();
        $item->run();
        //$item = [];

        return view('eventChannel', compact('name', 'item'));
    }
}
