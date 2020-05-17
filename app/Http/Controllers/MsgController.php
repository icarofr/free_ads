<?php

namespace App\Http\Controllers;

use App\Msg;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MsgController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(Auth::id());
        $msg = \DB::table('msg')
            ->leftJoin('users', "msg.from", "=", "users.id")
            ->where("msg.to", "=", Auth::id())
            ->orderBy('msg.id', "desc")
            ->get();
        $unreadCount = Msg::where("to", Auth::id())->where("read", false)->count();
        return view("msg.index", ["msg" => $msg, "unreadCount" => $unreadCount]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::all()->except(Auth::id());
        return view("msg.create", compact("user"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {
        // dd(var_dump(is_int("2")));
        $msg = new Msg();
        $msg->from = Auth::id();
        $msg->to = (ctype_digit($request->email)) ? $request->email : $user->where("email", $request->email)->first()->id;
        $msg->content = $request->description;
        $msg->read = false;
        $msg->save();

        return redirect("/user/" . $msg->to . "/chat");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Msg  $msg
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $msg = \DB::table('msg')
            ->leftJoin('users', "msg.from", "=", "users.id")
            ->whereIn("msg.to", [$user->id, Auth::id()])
            ->whereIn("msg.from", [$user->id, Auth::id()])
            ->orderBy("msg.id", "asc")->get();
        Msg::where("msg.to", Auth::id())
            ->update(["read" => true]);
        return view("msg.show", ["msg" => $msg, "user" => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Msg  $msg
     * @return \Illuminate\Http\Response
     */
    public function edit(Msg $msg)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Msg  $msg
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Msg $msg)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Msg  $msg
     * @return \Illuminate\Http\Response
     */
    public function destroy(Msg $msg)
    {
        //
    }
}
