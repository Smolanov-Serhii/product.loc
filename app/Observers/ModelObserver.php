<?php

namespace App\Observers;

use Illuminate\Support\Facades\Auth;

class ModelObserver
{

    protected $userID;

    public function __construct()
    {
        $this->userID =  Auth::id();
    }

    public function updating($model)
    {
        $model->admin_updated_id = $this->userID;
    }

    public function creating($model)
    {
        $model->admin_created_id = $this->userID;
    }
}
