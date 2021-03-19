<?php

namespace App\Http\Controllers;

use App\DesignPatterns\Creational\AbstractFactory\GuiKitFactory;
use App\DesignPatterns\Creational\AbstractFactory\Interfaces\GuiFactoryInterface;
use App\DesignPatterns\Creational\FactoryMethod\Classes\Forms\BootstrapDialogForm;
use App\DesignPatterns\Creational\FactoryMethod\Classes\Forms\SemanticUiDialogForm;
use App\DesignPatterns\Creational\StaticFactory\StaticFactory;
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

        // Using default "Bootstrap" UI (defined in constructor)...
        Log::info('Using default "Bootstrap" UI (defined in constructor)...');

        $result = [];
        $result[] = $this->guiKit->buildButton()->draw();
        $result[] = $this->guiKit->buildCheckBox()->draw();

        Log::info(print_r($result, true));


        // Switching UI to "Semantic UI"...
        Log::info('Switching UI to "Semantic UI"...');

        $this->guiKit = (new GuiKitFactory())->getFactory('semanticui');
        $result = [];
        $result[] = $this->guiKit->buildButton()->draw();
        $result[] = $this->guiKit->buildCheckBox()->draw();

        Log::info(print_r($result, true));

        return view('abstractFactory', compact('name'));
    }

    public function FactoryMethod()
    {
        $name = 'Factory Method';

        // Using "Bootstrap" UI...
        Log::info('Using "Bootstrap" UI...');
        $dialogForm = new BootstrapDialogForm();
        Log::info(print_r($dialogForm->render(), true));

        // Using "Semantic UI" UI...
        Log::info('Using "Semantic UI" UI...');
        $dialogForm = new SemanticUiDialogForm();
        Log::info(print_r($dialogForm->render(), true));

        return view('factoryMethod', compact('name'));
    }

    public function StaticFactory()
    {
        $name = 'Static Factory';
        $this->clearLaravelLog()->logPatternName($name);

        $appMailMessenger = StaticFactory::build('email');
        Log::info(print_r($appMailMessenger, true));

        $appPhoneMessenger = StaticFactory::build('sms');
        Log::info(print_r($appPhoneMessenger, true));

        return view('staticFactory', compact('name'));
    }

    private function clearLaravelLog()
    {
        file_put_contents(storage_path('logs/laravel.log'),'');
        return $this;
    }

    private function logPatternName($name)
    {
        Log::info($name);
        return $this;
    }
}
