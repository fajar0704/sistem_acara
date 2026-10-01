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
        $events = Event::latest()->get();
        return view('admin.event.index', compact('events'));
    }

    public function create()
    {
        return view('admin.event.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'photo' => 'required|image|mimes:jpeg,png,jpg,webp|max:5120',
            'start' => 'required|date',
            'end' => 'required|date|after_or_equal:start',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
        ]);

        $photo = $request->file('photo')->store('', 'public');

        $baseSlug = Str::slug($request->name);
        $slug = $baseSlug;
        $count = 1;
        while (Event::where('slug', $slug)->exists()) {
            $slug = "{$baseSlug}-{$count}";
            $count++;
        }

        $event = new Event;
        $event->name = $request->name;
        $event->slug = $slug;
        $event->start = $request->start;
        $event->end = $request->end;
        $event->description = $request->description;
        $event->price = $request->price;
        $event->photo = $photo;
        $event->status = 'Opened';
        $event->save();

        return redirect()->route('admin.event')->with('success', 'Add Event Success!!');
    }

    public function edit($slug)
    {
        $event = Event::where('slug', $slug)->firstOrFail();
        return view('admin.event.edit', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|in:Opened,Closed',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'start' => 'required|date',
            'end' => 'required|date|after_or_equal:start',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
        ]);

        $baseSlug = Str::slug($request->name);
        $slug = $baseSlug;
        $count = 1;
        while (Event::where('slug', $slug)->where('id', '!=', $event->id)->exists()) {
            $slug = "{$baseSlug}-{$count}";
            $count++;
        }

        $event->name = $request->name;
        $event->slug = $slug;
        $event->start = $request->start;
        $event->end = $request->end;
        $event->description = $request->description;
        $event->price = $request->price;
        $event->status = $request->status;

        if ($request->hasFile('photo')) {
            if ($event->photo && $event->photo !== "noimage.jpeg" && Storage::disk('public')->exists($event->photo)) {
                Storage::disk('public')->delete($event->photo);
            }
            $photo = $request->file('photo')->store('', 'public');
            $event->photo = $photo;
        }

        $event->save();

        return redirect()->route('admin.event')->with('success', 'Update Event Success!!');
    }

    public function destroy(Event $event)
    {
        if ($event->photo && $event->photo !== "noimage.jpeg" && Storage::disk('public')->exists($event->photo)) {
            Storage::disk('public')->delete($event->photo);
        }
        $event->delete();
        return redirect()->route('admin.event')->with('success', 'Event Deleted');
    }

    public function detail($slug)
    {
        $event = Event::where('slug', $slug)->firstOrFail();
        return view('admin.event.detail', compact('event'));
    }
}
