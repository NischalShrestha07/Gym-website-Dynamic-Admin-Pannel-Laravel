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
        $announcements = Announcement::with('user')->where('del', 0)->latest()->get();
        return view('admin.announcements.announcements', compact('announcements'));
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
            'del' => 0,
        ]);

        return redirect()->route('view.announcements')->with('success', 'Announcement Created Successfully.');
    }



    public function update(Request $request, $id)
    {
        $announcement = Announcement::find($id);

        if (!$announcement) {
            return redirect()->route('view.announcements')->with('error', 'Announcement not found.');
        }

        // Ensure the user is staff or admin
        $user = Auth::user();
        if (!in_array($user->role, ['Staff', 'Admin'])) {
            return redirect()->route('view.announcements')->with('error', 'Unauthorized action.');
        }

        // Validate the input
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        // Update the announcement
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

        // $announcement->delete();
        $announcement->del = 1;
        $announcement->save();

        return redirect()->route('view.announcements')->with('success', 'Announcement Deleted Successfully.');
    }
}
