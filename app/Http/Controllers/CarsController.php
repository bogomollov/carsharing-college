<?php

namespace App\Http\Controllers;

use App\Models\Cars;
use Illuminate\Http\Request;
use App\Http\Resources\Cars\CarsResource;
use Illuminate\Support\Facades\Cache;
use App\Http\Requests\Cars\StoreRequest;
use App\Http\Requests\Cars\UpdateRequest;

class CarsController extends Controller
{
    public function index()
    {
        $cars = Cars::all();
        return response()->json($cars);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $cars = Cars::create($request->validated());
        return CarsResource::make($cars);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $cars)
    {
        return new CarsResource(Cars::findOrFail($cars));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cars $cars)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Cars $cars)
    {
        $cars->update($request->validated());
        return new CarsResource($cars);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $c = Cars::destroy($id);
        if ($c) {
            return response()->json([
                'status' => 200,
                'message' => 'Deleted'
            ],200);
        }
    }
}
