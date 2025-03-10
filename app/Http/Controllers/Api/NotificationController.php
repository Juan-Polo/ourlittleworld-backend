<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\Request;



class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        //  $notifications = Notification::Orderby('id', 'desc')->paginate();
        //  $notifications = Notification::all();
        //  return view('notifications.index', compact('notifications'));

        $notifications = Notification::included()->filter()->sort()->get();
        return $notifications;
    }



    



    public function store(Request $request)
    {
        

        $request->validate([
            'mensaje' => 'required|max:255',
            'fechaHora' => 'required|max:255',

        ]);

        $notification = Notification::create($request->all());

        return $notification;
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Notification  $notification
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {


        $notification = Notification::findOrFail($id);
        return $notification;

        // return 'holaa';
    }


    public function update(Request $request, Notification $notification)
    {
        $request->validate([
            'mensaje' => 'required|max:255',
            'fechaHora' => 'required|max:255',

        ]);

        $notification->update($request->all());

        return $notification;
    }


    public function destroy(Notification $notification)
    {
        $notification->delete();
        return $notification;
    }
}
