<?php

namespace App\Providers;

use App\Models\Widget;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class WidgetServiceProvider extends ServiceProvider
{
    public function boot()
    {
        View::composer([
            'admin.block_template_attributes.templates.widget',
            'admin.block_template_attributes.includes.attribute_list',
        ], function($view) {
            $view->with(['widgets' => Widget::all()]);
        });
        /*
         * Регистрируется дирректива для шаблонизатора Blade
         * Пример обращаения к виджету: @widget('menu')
         * Можно передать параметры в виджет:
         * @widget('menu', [$data1,$data2...])
         */
        Blade::directive('widget', function ($name) {
            return "<?php echo app('widget')->show($name); ?>";
        });
        /*
         * Регистрируется (добавляем) каталог для хранения шаблонов виджетов
         * app\Widgets\view
         */

        $this->loadViewsFrom(resource_path('views/widgets'), 'Widgets');
    }

    public function register()
    {
        App::singleton('widget', function(){
            return new \App\Widgets\Widget();
        });
    }
}
