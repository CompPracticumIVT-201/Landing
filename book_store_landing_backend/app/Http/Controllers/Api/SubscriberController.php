<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Subscriber\SubscriberRequest;
use App\Http\Resources\SubscriberResource;
use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $email = $request->input('email');
        $subscribers = Subscriber::where('email', $email)->get();
        return SubscriberResource::collection($subscribers);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SubscriberRequest $request)
    {
        $subscriber = Subscriber::create($request->validated());

        return new SubscriberResource($subscriber);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
