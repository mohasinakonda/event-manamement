<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return \App\Models\Event::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $event =
            Event::create([
                ...$request->validate([
                    'event_name' => 'required|string|max:255',
                    'event_description' => 'nullable|string',
                    'event_start' => 'required|date',
                    'event_end' => 'required|date|after:event_start'
                ]),
                'user_id' => 1
            ]);
        return $event;
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {

        return $event;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        $event->update([
            ...$request->validate([
                'event_name' => 'sometimes|string|max:255',
                'event_description' => 'sometimes|string',
                'event_start' => 'sometimes|date',
                'event_end' => 'sometimes|date|after:event_start'
            ]),
        ]);
        return $event;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        $event->delete();
        return response([
            'status' => true,
            'message' => 'success',
            'data' => null
        ]);
    }
}