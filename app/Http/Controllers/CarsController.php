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
        $cache = Cache::rememberForever('cars:all', function () {
            return DB::table('cars')->get();
        });
        return Cache::get('cars:all');
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
        $cars = $request->validated();
        $c = Cars::create($cars);
        if ($c) {
            return response()->json([
                'status' => 200,
                'message' => 'Created'
            ],200);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        if (!Cache::has("cars:$id")) {
            $tb = DB::table('cars')->find($id);
            Cache::put("cars:$id",$tb);
            return $tb;
        }
        else {
            return Cache::get("cars:$id");
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
        $cars->update($data);
        if ($cars) {
            return response()->json([
                'status' => 200,
                'message' => 'Updated'
            ],200);
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
    }
}
