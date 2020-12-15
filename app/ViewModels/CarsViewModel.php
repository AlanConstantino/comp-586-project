<?php

namespace App\ViewModels;

// use Illuminate\Support\Facades\Log; // for debub
use Spatie\ViewModels\ViewModel;

class CarsViewModel extends ViewModel
{
    public $user;
    public $cars;

    public function __construct($user, $cars = null)
    {
        $this->user = $user;
        $this->cars = $cars;
    }

    // returns the view model for cars which includes the following:
    // cars => { id, year, make, type, created_at, updated_at }
    // user => { id, name }

    // view model that gets returned:
    // viewModel => { id, uid, name, year, make, type, created_at, updated_at }
    public function cars()
    {
        $viewModel = array();
        foreach ($this->cars as $key => $value) {
            $value['uid'] = $this->user->id;
            $value['name'] = $this->user->name;
            $viewModel[$key] = $value;
        }

        return response()->json(array_reverse($viewModel));
    }
}
