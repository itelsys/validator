<?php

namespace App\Http\Controllers;

use App\Scan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Helpers\Sort;
use Carbon\Carbon;

class ScanController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ['scans' => Scan::with(['reception.user', 'reception.document'])->latest()->paginate(20), 
                'role' => Auth::user()->role];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function scanning($id, $message)
    {
        $scan = Scan::find($id);
        $scan->user_id = Auth::user()->id;
        $scan->scanned = true;
        $scan->date_scan = Carbon::now();
        if($message != 'null')
            $scan->message = $message;
        $scan->save();
    }

     /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function confirm($id)
    {
        $scan = Scan::find($id);
        $scan->admin = Auth::user()->name;
        $scan->confirmed = true;
        $scan->save();

        $scan->import()->create([]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Scan  $scan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Sort the listed resources.
     *
     * @param  string  $model
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function sort(Request $request)
    {
        return (new Sort($request))->scan($request);
    }
}
