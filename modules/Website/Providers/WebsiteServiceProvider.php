<?php

namespace Modules\Website\Providers;

use Modules\Core\Entities\Option;
use Illuminate\Support\Facades\App;
use Modules\Service\Entities\Service;
use Illuminate\Support\ServiceProvider;
use Modules\Category\Entities\Category;
use Illuminate\Database\Eloquent\Factory;

class WebsiteServiceProvider extends ServiceProvider
{
    /**
     * @var string $moduleName
     */
    protected $moduleName = 'Website';

    /**
     * @var string $moduleNameLower
     */
    protected $moduleNameLower = 'website';

    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerTranslations();
        $this->registerConfig();
        $this->registerViews();
        $this->loadMigrationsFrom(module_path($this->moduleName, 'Database/Migrations'));


             
        view()->composer(
            'web_theme::layout.base.header',
            function ($view) {   
                $option = [];
           
                $locale=App::getLocale();

                $option['facebook'] = Option::getValueByKey('facebook');
                $option['twitter'] = Option::getValueByKey('twitter');
                $option['instgram'] = Option::getValueByKey('instgram');
                $option['linkedin'] = Option::getValueByKey('linkedin');
                $option['whatsapp'] = Option::getValueByKey('whatsapp');
                $option['youtube'] = Option::getValueByKey('youtube');
                $option['phone1'] = Option::getValueByKey('phone1');
                $option['email1'] = Option::getValueByKey('email1');
                
                $option['app_description'] = Option::getValueByKey('app_description_'.$locale);


                $services=Service::get();
                $categories=Category::where('parent_id',null)->get();

                $view->with([
                    'option'=>$option,
                    'services'=>$services,
                    'categories'=>$categories
                ]);
            }
        );
        
        view()->composer(
            'web_theme::layout.base.footer',
            function ($view) {
                $option = [];
           
                $locale=App::getLocale();

                $option['facebook'] = Option::getValueByKey('facebook');
                $option['twitter'] = Option::getValueByKey('twitter');
                $option['instgram'] = Option::getValueByKey('instgram');
                $option['linkedin'] = Option::getValueByKey('linkedin');
                $option['whatsapp'] = Option::getValueByKey('whatsapp');
                $option['youtube'] = Option::getValueByKey('youtube');
                
                $option['app_description'] = Option::getValueByKey('app_description_'.$locale);

                $option['phone1'] = Option::getValueByKey('phone1');
                $option['email1'] = Option::getValueByKey('email1');
                
                $services=Service::get();
                $categories=Category::where('parent_id',null)->get();

                $view->with([
                    'option'=>$option,
                    'services'=>$services,
                    'categories'=>$categories
                ]);
            }
        );

    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
    }

    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->publishes([
            module_path($this->moduleName, 'Config/config.php') => config_path($this->moduleNameLower . '.php'),
        ], 'config');
        $this->mergeConfigFrom(
            module_path($this->moduleName, 'Config/config.php'), $this->moduleNameLower
        );
    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $viewPath = resource_path('views/modules/' . $this->moduleNameLower);

        $sourcePath = module_path($this->moduleName, 'Resources/views');

        $this->publishes([
            $sourcePath => $viewPath
        ], ['views', $this->moduleNameLower . '-module-views']);

        $this->loadViewsFrom(array_merge($this->getPublishableViewPaths(), [$sourcePath]), $this->moduleNameLower);
    }

    /**
     * Register translations.
     *
     * @return void
     */
    public function registerTranslations()
    {
        $langPath = resource_path('lang/modules/' . $this->moduleNameLower);

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, $this->moduleNameLower);
        } else {
            $this->loadTranslationsFrom(module_path($this->moduleName, 'Resources/lang'), $this->moduleNameLower);
        }
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }

    private function getPublishableViewPaths(): array
    {
        $paths = [];
        foreach (\Config::get('view.paths') as $path) {
            if (is_dir($path . '/modules/' . $this->moduleNameLower)) {
                $paths[] = $path . '/modules/' . $this->moduleNameLower;
            }
        }
        return $paths;
    }
}
