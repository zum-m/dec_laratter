<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// ↓2行追加12.5
use App\Models\Tweet;
use Auth;


class FavoriteController extends Controller
{

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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

}
