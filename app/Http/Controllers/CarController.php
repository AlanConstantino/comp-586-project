<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class CarController extends Controller
{
    // checks token of user
    private function checkAuth()
    {
        if (! $user = JWTAuth::parseToken()->authenticate()) {
            return response()->json(['User Not Authorized'], 401);
        }

        return $user;
    }

    // shows all the car models associated with the user currently logged in
    public function index()
    {
        $user = $this->checkAuth();
        $cars = Car::where('user_id', $user->id)->get()->toArray();

        return response()->json(array_reverse($cars), 200);
    }

    // adds a new car model
    public function add(Request $request)
    {
        $user = $this->checkAuth();
        $car = new Car([
            'year' => $request->input('year'),
            'make' => $request->input('make'),
            'type' => $request->input('type'),
            'user_id' => $user->id,
        ]);
        $car->save();

        return response()->json('The car successfully added');
    }

    // gets data from the car model to display to user
    public function edit($id)
    {
        $this->checkAuth();
        $car = Car::find($id);
        $car->makeHidden(['created_at', 'updated_at', 'id']);

        return response()->json($car, 200);
    }

    // actually updates the car model
    public function update($id, Request $request)
    {
        $this->checkAuth();
        $car = Car::find($id);
        $car->update($request->all());

        return response()->json('The car successfully updated', 200);
    }

    // deletes car model
    public function delete($id)
    {
        $this->checkAuth();
        $car = Car::find($id);
        $car->delete();

        return response()->json('The car successfully deleted', 200);
    }
}
