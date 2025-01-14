<?php

namespace App\Http\Controllers;

use App\Models\ClassSchedule;
use Illuminate\Http\Request;

class ClassScheduleController extends Controller
{
    public function index()
    {
        $classSchedules = ClassSchedule::all();
        return view('admin.class_schedules.class', compact('classSchedules'));
    }

    //   public function AddNewClassSchedule(Request $request){}

    /**
     * Update the specified class schedule in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'class_name' => 'required|string|max:255',
            'instructor' => 'required|string|max:255',
            'day' => 'required|string|max:255',
            'time' => 'required',
        ]);

        $class = ClassSchedule::findOrFail($id);
        $class->update($request->all());

        return redirect()->route('class-schedules.index')->with('success', 'Class schedule updated successfully!');
    }

    /**
     * Remove the specified class schedule from storage.
     */
    public function destroy($id)
    {
        $class = ClassSchedule::findOrFail($id);
        $class->delete();

        return redirect()->route('class-schedules.index')->with('success', 'Class schedule deleted successfully!');
    }
}
