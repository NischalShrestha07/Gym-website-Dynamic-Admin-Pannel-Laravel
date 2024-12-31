<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function index()
    {
        return view('admin.calendar');
        //
    }

    public function fetchEvents()
    {
        return Event::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'start' => 'required|date',
            'end' => 'nullable|date|after_or_equal:start',
        ]);

        $event = Event::create($request->all());

        return response()->json(['id' => $event->id]);
    }

    // Fetch a specific event for editing
    public function show($id)
    {
        $event = Event::findOrFail($id);
        return response()->json($event);
    }

    // Update an existing event
    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);
        $event->update($request->only(['title', 'start', 'end']));
        return response()->json(['success' => true]);
    }

    // Delete an event
    // public function destroy($id)
    // {
    //     $event = Event::findOrFail($id);
    //     $event->delete();
    //     return response()->json(['success' => true]);
    // }
    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();
        return response()->json(['success' => true]);
    }
}
