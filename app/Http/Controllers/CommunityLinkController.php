<?php

namespace App\Http\Controllers;

use App\Models\CommunityLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Channel;
class CommunityLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Channel $channel = null)
    {
        //    dd($channel->links);

        if ($channel) {
            $links = $channel->links()->paginate(25);
        } else {
            $links = CommunityLink::where('approved', 1)
                ->latest('updated_at')
                ->paginate(25);
        }
        //  dd($links);

        $channels = Channel::orderBy('title', 'asc')->get();

        return view('community/index', compact('channels', 'links', 'channel'));
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
        $this->validate($request, [
            'title' => 'required',
            'link' => 'required|active_url',
            'channel_id' => 'required|exists:channels,id',
        ]);
        $approved = Auth::user()->trusted ? true : false;

        $request->merge(['user_id' => Auth::id(), 'approved' => $approved]);

        $link = new CommunityLink();
        $link->user_id = Auth::id();

        if ($approved == false) {
            return back()->with('warning', 'You are not verified');
        } elseif (!$link->hasAlreadyBeenSubmitted($request->link)) {
            CommunityLink::create($request->all());

            return back()->with('success', 'Link created succssfully');
        } else {
            return back()->with('success', 'Link updated successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CommunityLink  $communityLink
     * @return \Illuminate\Http\Response
     */
    public function show(CommunityLink $communityLink)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CommunityLink  $communityLink
     * @return \Illuminate\Http\Response
     */
    public function edit(CommunityLink $communityLink)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CommunityLink  $communityLink
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CommunityLink $communityLink)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CommunityLink  $communityLink
     * @return \Illuminate\Http\Response
     */
    public function destroy(CommunityLink $communityLink)
    {
        //
    }
}