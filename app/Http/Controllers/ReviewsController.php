<?php

namespace App\Http\Controllers;

use App\Reviews;
use Illuminate\Http\Request;

class ReviewsController extends Controller
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
    public function store(Request $request)
    {
        \Auth::user()->review()->create($request->except('_token'));
        return back()->with(['success' => 'Review added successfully.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Reviews  $reviews
     * @return \Illuminate\Http\Response
     */
    public function show(Reviews $reviews)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reviews  $reviews
     * @return \Illuminate\Http\Response
     */
    public function edit(Reviews $reviews)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reviews  $reviews
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reviews $review)
    {
        $review->update($request->except('_token','_method'));
        return redirect('hotels/'.$review->hotel_id)->with([ 'success' => 'Review has been updated.' ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reviews  $reviews
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reviews $reviews)
    {
        //
    }
}
