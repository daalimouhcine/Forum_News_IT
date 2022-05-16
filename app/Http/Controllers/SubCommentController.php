<?php

namespace App\Http\Controllers;

use App\Models\SubComment;
use App\Http\Requests\StoreSubCommentRequest;
use App\Http\Requests\UpdateSubCommentRequest;

class SubCommentController extends Controller
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
     * @param  \App\Http\Requests\StoreSubCommentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSubCommentRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubComment  $subComment
     * @return \Illuminate\Http\Response
     */
    public function show(SubComment $subComment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubComment  $subComment
     * @return \Illuminate\Http\Response
     */
    public function edit(SubComment $subComment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSubCommentRequest  $request
     * @param  \App\Models\SubComment  $subComment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSubCommentRequest $request, SubComment $subComment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubComment  $subComment
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubComment $subComment)
    {
        //
    }
}
