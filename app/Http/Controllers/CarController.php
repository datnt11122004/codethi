<?php

namespace App\Http\Controllers;

use App\Http\Controllers\CreateRequestequest as CreateRequestequestAlias;
use App\Http\Requests\CreateRequest;
use App\Http\Requests\UpdateRequest;
use App\Models\Cars;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Cars::all();
        $template = 'layout.list';
        return view('layout', compact('template','data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $template = 'layout.add';
        return view('layout', compact('template'));
    }

    public function uploadFile($file)
    {
        $file_name = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('images'), $file_name);
        return $file_name;
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {
        $data = $request->except('_token', 'car_image', '_method');
        if ($request->hasFile('car_image')) {
            $data['car_image'] = $this->uploadFile($request->file('car_image'));
        }
        Cars::query()->create($data);
        return redirect()->route('car.index')->with('success', 'Car added successfully');
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
        $data = Cars::query()->find($id);
        $template = 'layout.edit';
        return view('layout', compact('template', 'data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, $id)
    {
        $car = Cars::query()->find($id);
        $data = $request->except('_token', 'car_image', '_method');
        if ($request->hasFile('car_image')) {
            $data['car_image'] = $this->uploadFile($request->file('car_image'));
            Storage::disk('public')->delete('images/' . $car->car_image);
        }
        $car->update($data);
        return redirect()->route('car.index')->with('success', 'Car updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $car = Cars::query()->find($id);
        Storage::disk('public')->delete('images/' . $car->car_image);
        $car->forceDelete();
        return redirect()->route('car.index')->with('success', 'Car deleted successfully');
    }
}
