<?php

namespace App\Widgets;

use App\Widgets\Contract\ContractWidget;
use App\Models\Widget;

class BlocksWidget implements ContractWidget
{

//    protected $config = [
//        'count' => 4,
//    ];

    protected $slug;

    public function __construct($data = [])
    {
        if (isset($data['name'])) {
            $this->slug = $data['name'];
        }
    }

    public function execute()
    {
        $data = $this->getWidgetData();

        if(!$data) {
            return null;
        }

        return view("Widgets::blocks", [
            'widget' => $this->getWidgetData()
        ]);
    }

    public function getWidgetData()
    {
        $widget = Widget::where('slug', $this->slug)
            ->with('blocks')
            ->first();

        return $widget;
    }
}