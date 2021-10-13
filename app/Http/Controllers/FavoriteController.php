<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// ↓2行追加12.5
use App\Models\Tweet;
use Auth;


class FavoriteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
      // ↓ 編集（`store()` の `()` 内も異なるので注意）
    public function store(Tweet $tweet)
    {
         //12.5
        $tweet->users()->attach(Auth::id());
        return redirect()->route('tweet.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
      // ↓ 編集 （`destroy()` の `()` 内も異なるので注意）
    public function destroy(Tweet $tweet)
    {
        //12.5
        $tweet->users()->detach(Auth::id());
        return redirect()->route('tweet.index');
    
    }
}