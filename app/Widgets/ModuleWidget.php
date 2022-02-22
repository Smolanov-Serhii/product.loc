<?php

namespace App\Widgets;

use App\Models\Modules;
use App\Widgets\Contract\ContractWidget;

class ModuleWidget implements ContractWidget
{
//    public $name;

    protected $config = [
        'count' => 4,
    ];

    protected $name;

    public function __construct($data = [])
    {
        if (isset($data['name'])) {
            $this->name = $data['name'];
        }

        $this->config['count'] = $data['count'] ?? $this->config['count'];
    }

    public function execute()
    {
        $module = Modules::where('name', $this->name)
            ->with('items.props.type')
            ->get()
            ->first();

        $items = $module['items'];

        
        return view("Widgets::module", [
            'name' => $this->name,
            'items' => $items
//            'data' => $this
        ]);
    }
}