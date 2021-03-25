<?php

namespace App\Http\Controllers;


use App\DesignPatterns\Structural\Adapter\Classes\MediaLibraryAdapter;
use App\DesignPatterns\Structural\Adapter\Classes\MediaLibrarySelfWritten;
use App\DesignPatterns\Structural\Adapter\Interfaces\MediaLibraryInterface;
use App\DesignPatterns\Structural\Bridge\WithBridge\BridgeDemo;
use App\DesignPatterns\Structural\Bridge\WithoutBridge\WithoutBridgeDemo;
use App\DesignPatterns\Structural\Facade\Classes\Order;
use App\DesignPatterns\Structural\Facade\OrderSaveFacade;

class StructuralPatternsController extends Controller
{
    public function Adapter()
    {
        $name = 'Adapter';
        $this->clearLaravelLog()->logMessage($name);

        //$mediaLibrary = app(MediaLibrarySelfWritten::class);
        //$mediaLibrary = app(MediaLibraryAdapter::class);
        $mediaLibrary = app(MediaLibraryInterface::class);

        $result = [];
        $result[0] = $mediaLibrary->upload('ImageFile.png');

        $result[1] = $mediaLibrary->get($result[0]['code']);

        $this->logMessage(print_r($result, true));
        return view('adapter', compact('name'));
    }

    public function Facade()
    {
        $name = 'Facade';
        $this->clearLaravelLog()->logMessage($name);

        $order = new Order();
        $data = request()->all();

        (new OrderSaveFacade())->save($order, $data);

        return view('facade', compact('name'));
    }

    public function Bridge()
    {
        $name = 'Bridge';
        $this->clearLaravelLog()->logMessage($name);

        //(new WithoutBridgeDemo())->run();
        (new BridgeDemo())->run();

        return view('bridge', compact('name'));
    }
}
