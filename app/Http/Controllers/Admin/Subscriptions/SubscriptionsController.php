<?php

namespace App\Http\Controllers\Admin\Subscriptions;

use App\Core\Subscriptions\SubscriptionInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\SubscriptionRequest;
use Illuminate\Http\Request;

class SubscriptionsController extends Controller
{
    protected $subscriptions;
    public function __construct( SubscriptionInterface $subscriptions)
    {
        $this->subscriptions = $subscriptions; 
    }
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
        return view("Admin.Subscription.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "plan_name" => "required|string",
            "plan_price" => "required|string",
            "duration" => "required|string",
            "user_type" => "required|string"
        ]);
        $common_data = $request->only("plan_name","plan_price","duration","user_type");
        $feature_data = $request->except("_token","plan_name","plan_price","duration","user_type");
        if ($this->subscriptions->storeSubscription($common_data, $feature_data)) {
            return back()->with("msg", "Plan is created successfully");
        }else {
            return back()->with("msg", "Some error occur!");
        }
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
    public function destroy($id)
    {
        //
    }
}
