<?php

namespace App\Traits;

trait HasPropertyModel {

    public function delete()
    {
        if($this->seo) {
            $this->seo->delete();
        }

        if($this->addition) {
            $this->addition->delete();
        }

        parent::delete();
    }
}
