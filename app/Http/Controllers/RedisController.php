<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class RedisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = "";
        //
        try{
            Redis::set('name', 'Taylor');
            $data = "Redis::set('name', 'Taylor'); > ";
            $data .= "Redis::get('name'); >";
            $data .= Redis::get('name');
        } catch (\Exception $e) {
            $data = 'Redis connection failed. Error: ' . $e->getMessage();
        }


        return view('welcome', ['data' => $data]);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
