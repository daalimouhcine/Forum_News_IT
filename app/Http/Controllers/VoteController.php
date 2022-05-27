<?php

namespace App\Http\Controllers;

use App\Models\Vote;
use App\Http\Requests\StoreVoteRequest;
use App\Http\Requests\UpdateVoteRequest;
use Illuminate\Http\Request;


class VoteController extends Controller
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
    public function vote(Request $request) {
        // check for a vote for this user and post
        $vote = Vote::where('user_id', $request->user_id)
            ->where('post_id', $request->post_id)
            ->first();
        
        if ($vote) {
            // check if the same vote is being submitted to delete it
            if ($vote->vote == $request->vote) {
                $vote->delete();
                return response()->json(['message' => 'Vote deleted']);
            } else {
                // update the vote
                $vote->vote = $request->vote;
                $vote->save();
                return response()->json(['message' => 'Vote updated']);
            }
        } else {
            // create a new vote
            $vote = new Vote();
            $vote->user_id = $request->user_id;
            $vote->post_id = $request->post_id;
            $vote->vote = $request->vote;
            $vote->save();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreVoteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVoteRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vote  $vote
     * @return \Illuminate\Http\Response
     */
    public function show(Vote $vote)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vote  $vote
     * @return \Illuminate\Http\Response
     */
    public function edit(Vote $vote)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVoteRequest  $request
     * @param  \App\Models\Vote  $vote
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVoteRequest $request, Vote $vote)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vote  $vote
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vote $vote)
    {
        //
    }
}
