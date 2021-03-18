<?php

namespace App\Http\Controllers;

use App\DesignPatterns\Creational\AbstractFactory\GuiKitFactory;
use App\DesignPatterns\Creational\AbstractFactory\Interfaces\GuiFactoryInterface;
use Illuminate\Support\Facades\Log;

class CreationalPatternsController extends Controller
{
    /**
     * @var GuiFactoryInterface
     */
    private $guiKit;

    /**
     * CreationalPatternsController constructor.
     */
    public function __construct()
    {
        // Default UI
        $this->guiKit = (new GuiKitFactory())->getFactory('bootstrap');
    }

    public function AbstractFactory()
    {
        $name = 'Abstract factory';

        // Use default "Bootstrap" UI (defined in constructor)
        Log::info('Using default "Bootstrap" UI (defined in constructor)...');

        $result = [];
        $result[] = $this->guiKit->buildButton()->draw();
        $result[] = $this->guiKit->buildCheckBox()->draw();

        Log::info(print_r($result, true));


        // Switch UI to "Semantic UI"
        Log::info('Switching UI to "Semantic UI"...');

        $this->guiKit = (new GuiKitFactory())->getFactory('semanticui');
        $result = [];
        $result[] = $this->guiKit->buildButton()->draw();
        $result[] = $this->guiKit->buildCheckBox()->draw();

        Log::info(print_r($result, true));

        return view('abstractFactory', compact('name'));
    }
}
