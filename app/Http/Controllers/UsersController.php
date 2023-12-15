<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Resources\Users\UsersResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Http\Requests\Users\StoreRequest;
use App\Http\Requests\Users\UpdateRequest;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $d = User::all();
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
        $users = User::create($request->validated());
        return response()->json([
            'status' => 200,
            'message' => 'Created'
        ],200);;
    }

    /**
     * Display the specified resource.
     */
    public function show(int $users)
    {
        $d = User::find($users);
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
    public function edit(User $users)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, int $id)
    {
        $data = $request->validated();
        $users = User::find($id);
        $d = $users->update($data);
        if ($users) {
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
        $ar = User::destroy($id);
        if ($ar) {
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
