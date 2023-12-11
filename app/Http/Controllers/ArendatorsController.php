<?php

namespace App\Http\Controllers;

use App\Models\Arendators;
use Illuminate\Http\Request;
use App\Http\Resources\Arendators\ArendatorsResource;
use Illuminate\Support\Facades\Cache;
use App\Http\Requests\Arendators\StoreRequest;
use App\Http\Requests\Arendators\UpdateRequest;

class ArendatorsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Arendators::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $ar = $request->validated();
        $a = Arendators::create($ar);
        if ($a) {
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
        if (!Cache::has("arendators:$id")) {
            $tb = DB::table('arendators')->find($id);
            Cache::put("arendators:$id",$tb);
            return $tb;
        }
        else {
            return Cache::get("arendators:$id");
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Arendators $arendators)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, int $id)
    {
        $data = $request->validated();
        $arendators = Arendators::findOrFail($id);
        $arendators->update($data);
        $ar = $arendators->refresh();
        if ($ar) {
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
        $ar = Arendators::destroy($id);
        if ($ar) {
            $ar->delete();
            return response()->json([
                'status' => 200,
                'message' => 'Deleted'
            ],200);
        }
    }
}
