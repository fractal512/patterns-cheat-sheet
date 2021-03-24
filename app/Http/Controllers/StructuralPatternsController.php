<?php

namespace App\Http\Controllers;


use App\DesignPatterns\Structural\Adapter\Classes\MediaLibraryAdapter;
use App\DesignPatterns\Structural\Adapter\Classes\MediaLibrarySelfWritten;
use App\DesignPatterns\Structural\Adapter\Interfaces\MediaLibraryInterface;

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
}
