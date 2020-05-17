<?php

namespace App\Http\Controllers;

use App\Ad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd('a');
        $ad = Ad::latest()->get();
        return view('ad.index', compact("ad"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("ad.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ad = new Ad();
        $ad->author = Auth::id();
        $ad->title = $request->title;
        $ad->description = $request->description;
        if (is_null($request->photo)) {
            $ad->photo = NULL;
        } else {
            $ad->photo = $request->photo->hashName();
            $request->photo->store('public/ads');
        }
        if (is_null($request->photo2)) {
            $ad->photo2 = NULL;
        } else {
            $ad->photo2 = $request->photo2->hashName();
            $request->photo2->store('public/ads');
        }
        if (is_null($request->photo3)) {
            $ad->photo3 = NULL;
        } else {
            $ad->photo3 = $request->photo3->hashName();
            $request->photo3->store('public/ads');
        }
        if (is_null($request->photo4)) {
            $ad->photo4 = NULL;
        } else {
            $ad->photo4 = $request->photo4->hashName();
            $request->photo4->store('public/ads');
        }
        $ad->price = $request->price;
        $ad->tags = $request->tags;
        $ad->save();

        return redirect('/ad/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function show(Ad $ad)
    {
        return view('ad.show', compact('ad'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function edit(Ad $ad)
    {
        return view("ad.edit", compact("ad"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ad $ad)
    {
        $ad->title = $request->title;
        $ad->description = $request->description;
        if (is_null($request->photo)) {
            $ad->photo = NULL;
        } else {
            $ad->photo = $request->photo->hashName();
            $request->photo->store('public/ads');
        }
        if (is_null($request->photo2)) {
            $ad->photo2 = NULL;
        } else {
            $ad->photo2 = $request->photo2->hashName();
            $request->photo2->store('public/ads');
        }
        if (is_null($request->photo3)) {
            $ad->photo3 = NULL;
        } else {
            $ad->photo3 = $request->photo3->hashName();
            $request->photo3->store('public/ads');
        }
        if (is_null($request->photo4)) {
            $ad->photo4 = NULL;
        } else {
            $ad->photo4 = $request->photo4->hashName();
            $request->photo4->store('public/ads');
        }
        $ad->price = $request->price;
        $ad->tags = $request->tags;
        $ad->save();

        return redirect('/ad/' . $ad->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ad $ad)
    {
        $ad->forceDelete();
        return redirect('/ad');
    }

    public function search(Request $request)

    {
        // dd($request->direction);
        // if (!is_null($request->tags)) {
        $tags = explode(",", $request->tags);

        $ad = Ad::where("title", "ilike", "%$request->title%")
            ->where("description", "ilike", "%$request->description%")
            ->where("price", ">=", !is_null($request->minPrice) ? $request->minPrice : 0)
            ->where("price", "<=", !is_null($request->maxPrice) ? $request->maxPrice : 2000000000)
            ->where(function ($query) use ($tags) {
                foreach ($tags as $tag) {
                    $query->orWhere("tags", "ilike", "%$tag%");
                }
            })->orderBy($request->orderBy, $request->direction == "on" ? "desc" : "asc")
            ->get();
        return view('ad.index', compact("ad"));
    }
}
