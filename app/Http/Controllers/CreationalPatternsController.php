<?php

namespace App\Http\Controllers;

use App\DesignPatterns\Creational\AbstractFactory\GuiKitFactory;
use App\DesignPatterns\Creational\AbstractFactory\Interfaces\GuiFactoryInterface;
use App\DesignPatterns\Creational\Builder\BlogPostBuilder;
use App\DesignPatterns\Creational\Builder\BlogPostManager;
use App\DesignPatterns\Creational\FactoryMethod\Classes\Forms\BootstrapDialogForm;
use App\DesignPatterns\Creational\FactoryMethod\Classes\Forms\SemanticUiDialogForm;
use App\DesignPatterns\Creational\LazyInitialization\LazyInitialization;
use App\DesignPatterns\Creational\Multiton\SimpleMultiton;
use App\DesignPatterns\Creational\Multiton\SimpleMultitonNext;
use App\DesignPatterns\Creational\ObjectPool\ObjectPoolDemo;
use App\DesignPatterns\Creational\Prototype\PrototypeDemo;
use App\DesignPatterns\Creational\SimpleFactory\MessengerSimpleFactory;
use App\DesignPatterns\Creational\Singleton\AdvancedSingleton;
use App\DesignPatterns\Creational\Singleton\Contracts\AnotherConnection;
use App\DesignPatterns\Creational\Singleton\LaravelSingleton;
use App\DesignPatterns\Creational\Singleton\SimpleSingleton;
use App\DesignPatterns\Creational\StaticFactory\StaticFactory;

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
        $name = 'Abstract Factory';
        $this->clearLaravelLog()->logMessage($name);

        // Using default "Bootstrap" UI (defined in constructor)...
        $this->logMessage('Using default "Bootstrap" UI (defined in constructor)...');

        $result = [];
        $result[] = $this->guiKit->buildButton()->draw();
        $result[] = $this->guiKit->buildCheckBox()->draw();

        $this->logMessage(print_r($result, true));


        // Switching UI to "Semantic UI"...
        $this->logMessage('Switching UI to "Semantic UI"...');

        $this->guiKit = (new GuiKitFactory())->getFactory('semanticui');
        $result = [];
        $result[] = $this->guiKit->buildButton()->draw();
        $result[] = $this->guiKit->buildCheckBox()->draw();

        $this->logMessage(print_r($result, true));

        return view('abstractFactory', compact('name'));
    }

    public function FactoryMethod()
    {
        $name = 'Factory Method';
        $this->clearLaravelLog()->logMessage($name);

        // Using "Bootstrap" UI...
        $this->logMessage('Using "Bootstrap" UI...');
        $dialogForm = new BootstrapDialogForm();
        $this->logMessage(print_r($dialogForm->render(), true));

        // Using "Semantic UI" UI...
        $this->logMessage('Using "Semantic UI" UI...');
        $dialogForm = new SemanticUiDialogForm();
        $this->logMessage(print_r($dialogForm->render(), true));

        return view('factoryMethod', compact('name'));
    }

    public function StaticFactory()
    {
        $name = 'Static Factory';
        $this->clearLaravelLog()->logMessage($name);

        $appMailMessenger = StaticFactory::build('email');
        $this->logMessage(print_r($appMailMessenger, true));

        $appPhoneMessenger = StaticFactory::build('sms');
        $this->logMessage(print_r($appPhoneMessenger, true));

        return view('staticFactory', compact('name'));
    }

    public function SimpleFactory()
    {
        $name = 'Simple Factory';
        $this->clearLaravelLog()->logMessage($name);

        $factory = new MessengerSimpleFactory();
        $appMailMessenger = $factory->build('email');
        $this->logMessage(print_r($appMailMessenger, true));

        $appPhoneMessenger = $factory->build('sms');
        $this->logMessage(print_r($appPhoneMessenger, true));

        return view('simpleFactory', compact('name'));
    }

    public function Singleton()
    {
        $name = 'Singleton';
        $this->clearLaravelLog()->logMessage($name);

        // Basic way start
        $this->logMessage('Basic way:');
        $result = [];
        $result['simpleSingleton1'] = SimpleSingleton::getInstance();
        $result['simpleSingleton1']->setTest('simpleSingleton1');
        $result['simpleSingleton2'] = SimpleSingleton::getInstance();

        $result[] = $result['simpleSingleton1'] === $result['simpleSingleton2'];
        $this->logMessage(print_r($result, true));
        // Basic way end

        // Advanced way start
        $this->logMessage('Advanced way:');
        $result = [];
        $result['advancedSingleton1'] = AdvancedSingleton::getInstance();
        $result['advancedSingleton1']->setTest('advancedSingleton1');
        $result['advancedSingleton2'] = AdvancedSingleton::getInstance();

        $result[] = $result['advancedSingleton1'] === $result['advancedSingleton2'];
        $this->logMessage(print_r($result, true));
        // Advanced way end

        // Laravel way start
        $this->logMessage('Laravel way:');
        $result = [];
        $result['advancedSingleton1'] = app(AnotherConnection::class);
        $result['advancedSingleton1']->setTest('advancedSingleton1');
        $result['advancedSingleton2'] = app(AnotherConnection::class);
        $result['advancedSingleton3'] = new LaravelSingleton();

        $result[] = $result['advancedSingleton1'] === $result['advancedSingleton2'];
        $result[] = $result['advancedSingleton2'] === $result['advancedSingleton3'];
        $this->logMessage(print_r($result, true));
        // Laravel way end

        return view('singleton', compact('name'));
    }

    public function Multiton()
    {
        $name = 'Multiton';
        $this->clearLaravelLog()->logMessage($name);

        $result = [];
        $result[] = SimpleMultiton::getInstance('mysql')->setTest('mysql-test');
        $result[] = SimpleMultiton::getInstance('mongo');

        $result[] = SimpleMultiton::getInstance('mysql');
        $result[] = SimpleMultiton::getInstance('mongo')->setTest('mongo-test');

        $simpleMultitonNext = SimpleMultitonNext::getInstance('mysql');
        $simpleMultitonNext->test2 = 'init';
        $result[] = $simpleMultitonNext;

        $simpleMultitonNext = SimpleMultitonNext::getInstance('mysql');
        $simpleMultitonNext->test2 = 'init2';
        $result[] = $simpleMultitonNext;

        $this->logMessage(print_r($result, true));

        return view('multiton', compact('name'));
    }

    public function Builder()
    {
        $name = 'Builder';
        $this->clearLaravelLog()->logMessage($name);

        $builder = new BlogPostBuilder();

        $posts[] = $builder->setTitle('from Builder')
                           ->getBlogPost();

        $manager = new BlogPostManager();
        $manager->setBuilder($builder);

        $posts[] = $manager->createCleanPost();
        $posts[] = $manager->createNewPostIt();
        $posts[] = $manager->createNewPostCats();

        $this->logMessage(print_r($posts, true));

        return view('builder', compact('name'));
    }

    public function LazyInitialization()
    {
        $name = 'Lazy Initialization';
        $this->clearLaravelLog()->logMessage($name);

        $user = [];
        $start = microtime(true);
        $lazyLoad = new LazyInitialization();
        $user[] = clone $lazyLoad;
        $user[] = microtime(true) - $start . ' s.';
        $user[] = $lazyLoad->getUser()->name;
        $user[] = microtime(true) - $start . ' s.';
        $user[] = $lazyLoad->getUser()->email;
        $user[] = microtime(true) - $start . ' s.';
        $user[] = $lazyLoad->getUser()->created_at;
        $user[] = microtime(true) - $start . ' s.';

        $this->logMessage(print_r($user, true));

        return view('lazyInitialization', compact('name'));
    }

    public function Prototype()
    {
        $name = 'Prototype (Clone)';
        $this->clearLaravelLog()->logMessage($name);

        $prototypeDemo = new PrototypeDemo();
        $result = $prototypeDemo->run();

        $this->logMessage(print_r($result, true));

        return view('prototype', compact('name'));
    }

    public function ObjectPool()
    {
        $name = 'Object Pool';
        $this->clearLaravelLog()->logMessage($name);

        $objectPoolDemo = new ObjectPoolDemo();
        $objectPoolDemo->run();

        return view('objectPool', compact('name'));
    }
}
