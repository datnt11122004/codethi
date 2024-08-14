<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Cars;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $data = Cars::all();
            return response()->json($data);
        }catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Cars could not be retrieved'
            ])->setStatusCode(500, 'Cars could not be retrieved');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
//        $template = 'layout.add';
//        return view('layout', compact('template'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->except('_token', '_method');
        try {
            $result = Cars::query()->create($data);
            return response()->json([
                'status' => 'success',
                'message' => 'Car added successfully',
                'data' => $result
            ])->setStatusCode(201, 'Car added successfully');
        }catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Car could not be added',
                'error' => $e->getMessage()
            ])->setStatusCode(500, 'Car could not be added');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(cars $cars)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
//        $data = Cars::query()->find($id);
//        $template = 'layout.edit';
//        return view('layout', compact('template', 'data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->except('_token', '_method');
        $car = Cars::query()->find($id);
        if (!$car) {
            return response()->json([
                'status' => 'error',
                'message' => 'Car not found'
            ])->setStatusCode(404, 'Car not found');
        }
        try {
            $car->update($data);
            return response()->json([
                'status' => 'success',
                'message' => 'Car updated successfully',
                'data' => $car
            ])->setStatusCode(200, 'Car updated successfully');
        }
        catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Car could not be updated'
            ])->setStatusCode(500, 'Car could not be updated');
        }


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $car = Cars::query()->find($id);
        if (!$car) {
            return response()->json([
                'status' => 'error',
                'message' => 'Car not found'
            ])->setStatusCode(404, 'Car not found');
        }
        try {
            $car->forceDelete();
            return response()->json([
                'status' => 'success',
                'message' => 'Car deleted successfully'
            ])->setStatusCode(200, 'Car deleted successfully');
        }catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Car could not be deleted'
            ])->setStatusCode(500, 'Car could not be deleted');
        }

    }
}
