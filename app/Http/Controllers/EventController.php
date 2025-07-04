<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::paginate();
        return view('admin.event.index', compact('events'));
    }

    public function create()
    {
        return view('admin.event.create');
    }

    public function store(Request $request)
    {
        $photo = $request->file('photo')->store('', 'public');
        
        $event = new Event;
        $event->name = $request->name;
        $event->slug = Str::of($request->name)->slug('-');
        $event->start = $request->start;
        $event->end = $request->end;
        $event->description = $request->description;
        $event->price = $request->price;
        $event->photo = $photo;
        $event->save();

        return redirect()->route('admin.event')->with('success', 'Add Event Success!!');
    }

    public function edit($slug)
    {
        $event = Event::where('slug', $slug)->first();
        return view('admin.event.edit', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        $event->name = $request->name;
        $event->slug = Str::of($request->name)->slug('-');
        $event->start = $request->start;
        $event->end = $request->end;
        $event->description = $request->description;
        $event->price = $request->price;
        $event->status = $request->status;
        if($request->file('photo'))
        {
            if($event->photo !== "noimage.jpeg")
            {
                Storage::disk('public')->delete($event->photo);
            }
            $photo = $request->file('photo')->store('', 'public');
            $event->photo =$photo;
        }
        $event->update();

        return redirect()->route('admin.event')->with('success', 'Update Event Success!!');
    }

    public function destroy(Event $event)
    {
        if($event->photo !== "noimage.jpeg")
        {
            Storage::disk('public')->delete($event->photo);
        }
        $event->delete();
        return redirect()->route('admin.event')->with('success', 'Event Deleted');
    }

    public function detail($slug)
    {
        $event = Event::where('slug', $slug)->first();
        return view('admin.event.detail', compact('event'));
    }
}
