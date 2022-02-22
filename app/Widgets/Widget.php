<?php

namespace App\Widgets;

use App\Models\Widget as WidgetModel;
use Illuminate\Support\Facades\App;
//use Illuminate\Support\Str;

class Widget{
    protected $widgets; //массив доступных виджетов config/widgets.php

    public function __construct(){
        $this->widgets = config('widgets');
    }

    public function show($obj, $data =[]){

        $widget_data = explode('.', $obj);
        $widget_name = $widget_data[0];

        if(isset($widget_data[1])) {
            $data['name'] = $widget_data[1];
        }

        //Есть ли такой виджет
        if(isset($this->widgets[$widget_name])){
            //создаем его объект передавая параметры в конструктор
            $obj = App::make($this->widgets[$widget_name], ['data' => $data]);
            //возвращаем результат выполнения
            return $obj->execute();
        }
    }
}
