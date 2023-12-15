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
        $d = response()->json($cars);
        if ($cars) {
            return $d;
        }
        else {
            return response()->json([
                'status' => 404,
                'message' => 'Not Found'
            ],404);;
        }
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
        return response()->json([
            'status' => 200,
            'message' => 'Created'
        ],200);;
    }

    /**
     * Display the specified resource.
     */
    public function show(int $cars)
    {
        $d = Cars::find($cars);
        if ($d) {
            return $d;
        }
        else {
            return response()->json([
                'status' => 404,
                'message' => 'Not Found'
            ],404);;
        }
        
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
    public function update(UpdateRequest $request, int $id)
    {
        $data = $request->validated();
        $cars = Cars::find($id);
        $d = $cars->update($data);
        if ($cars) {
            return response()->json([
                'status' => 200,
                'message' => 'Updated'
            ],200);;
        }
        else {
            return response()->json([
                'status' => 404,
                'message' => 'Not Found'
            ],404);;
        }

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
        else {
            return response()->json([
                'status' => 404,
                'message' => 'Not Found'
            ],404);;
        }
    }
}
