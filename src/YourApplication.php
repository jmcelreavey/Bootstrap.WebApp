<?php

namespace Your\WebApp;

use Rhubarb\Crown\Application;
use Rhubarb\Crown\Layout\LayoutModule;
use Rhubarb\Crown\UrlHandlers\ClassMappedUrlHandler;
use Rhubarb\Leaf\LeafModule;
use Rhubarb\Stem\StemModule;
use Your\WebApp\Layouts\DefaultLayout;
use Your\WebApp\Leaves\Index;


class YourApplication extends Application
{
    protected function initialise()
    {
        parent::initialise();

        $this->developerMode = true;

        if(file_exists(APPLICATION_ROOT_DIR . "/settings/site.config.php"))
        {
            include_once(APPLICATION_ROOT_DIR . "/settings/site.config.php");
        }

    }

    protected function registerUrlHandlers()
    {
        parent::registerUrlHandlers();


        // Add a simple home page URL handler . We're using one of the simplest handlers the
        // ClassMappedUrlHandler, but you should look at the other handlers particularly
        // the MvpUrlHandler and CrudUrlHandler
        $this->addUrlHandlers(
            [
                "/" => new ClassMappedUrlHandler(Index::class)
            ]
        );
    }

    /**
     * Should your module require other modules, they should be returned here.
     */
    protected function getModules()
    {
        return [
            new LayoutModule(DefaultLayout::class),
            new LeafModule(),
            new StemModule()
        ];
    }
}

