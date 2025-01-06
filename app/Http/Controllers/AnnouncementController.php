<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnnouncementController extends Controller
{
    // Fetch all announcements
    public function index()
    {
        $announcements = Announcement::with('user')->latest()->get();
        return view('admin.announcements', compact('announcements'));
    }

    // Create a new announcement
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        Announcement::create([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('view.announcements')->with('success', 'Announcement Created Successfully.');
    }

    // Update an announcement
    public function update(Request $request, $id)
    {
        $announcement = Announcement::find($id);

        if (!$announcement) {
            return redirect()->route('view.announcements')->with('error', 'Announcement not found.');
        }

        if ($announcement->user_id !== Auth::id()) {
            return redirect()->route('view.announcements')->with('error', 'Unauthorized action.');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $announcement->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->route('view.announcements')->with('success', 'Announcement Updated Successfully.');
    }

    // Delete an announcement
    public function destroy($id)
    {
        $announcement = Announcement::find($id);

        if (!$announcement) {
            return redirect()->route('view.announcements')->with('error', 'Announcement not found.');
        }

        if ($announcement->user_id !== Auth::id()) {
            return redirect()->route('view.announcements')->with('error', 'Unauthorized action.');
        }

        $announcement->delete();

        return redirect()->route('view.announcements')->with('error', 'Announcement Deleted Successfully.');
    }
}
