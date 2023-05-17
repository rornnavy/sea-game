<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEventRequest;
use App\Http\Resources\ShowEvenetResource;
use App\Models\Event;
use App\Models\Ticket;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $event = Event::all();

        $event = ShowEvenetResource::collection($event);

        return response()->json(['success' =>true, 'data' => $event], 200);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEventRequest $request)
    {
        $event = Event::store($request);

        return response()->json(['success' =>true, 'data' => $event], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $event = Event::find($id);

        $event =new ShowEvenetResource($event);

        return response()->json(['success' =>true, 'data' => $event], 200);
    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreEventRequest $request, string $id)
    {
        $event = Event::find($id);

        $event = Event::store($request, $id);

        return response()->json(['success' =>true, 'data' => $event], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $event = Event::find($id);

        $event->delete();

        return response()->json(['success' =>true, 'data' =>"deleted successful"], 200);
    }
    public function search($name) {

        $events = Event::where('name', 'like', "%$name%")->get();

        return response()->json($events);
    }
}
