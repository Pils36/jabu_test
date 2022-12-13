<?php

namespace App\Http\Controllers;

use App\Models\Tasks;

class TaskController extends Controller
{
    public function eventActivities()
    {
        $allTasks = Tasks::orderBy('status', 'asc')->get()->groupBy('duration');

        return $allTasks;

    }

    public function everyday()
    {
        // Create new task everyday...
        $tasks = Tasks::where('duration', 'everyday')->where('status', 'pending')->get();

        foreach ($tasks as $task) {
            // Update status to completed
            Tasks::where('id', $task->id)->update(['status' => 'completed']);

            Tasks::create([
                'name' => $task->name,
                'duration' => $task->duration,
                'durationName' => $task->durationName,
                'created_at' => date('Y-m-d H:i:s')
            ]);
        }
    }


    public function mondays()
    {
        // Create new task everyday...
        $tasks = Tasks::where('duration', 'mondays')->where('status', 'pending')->get();

        foreach ($tasks as $task) {
            // Update status to completed
            Tasks::where('id', $task->id)->update(['status' => 'completed']);

            Tasks::create([
                'name' => $task->name,
                'duration' => $task->duration,
                'durationName' => $task->durationName,
                'created_at' => date('Y-m-d H:i:s')
            ]);
        }
    }


    public function weeklyOnMondayWednesdayFriday()
    {
        // Create new task everyday...
        $tasks = Tasks::where('duration', 'weeklyOnMondayWednesdayFriday')->where('status', 'pending')->get();

        foreach ($tasks as $task) {
            // Update status to completed
            Tasks::where('id', $task->id)->update(['status' => 'completed']);
            Tasks::create([
                'name' => $task->name,
                'duration' => $task->duration,
                'durationName' => $task->durationName,
                'created_at' => date('Y-m-d H:i:s')
            ]);
        }
    }


    public function fifthOfTheMonth()
    {
        // Create new task everyday...
        $tasks = Tasks::where('duration', 'fifthOfTheMonth')->where('status', 'pending')->get();

        foreach ($tasks as $task) {
            // Update status to completed
            Tasks::where('id', $task->id)->update(['status' => 'completed']);
            Tasks::create([
                'name' => $task->name,
                'duration' => $task->duration,
                'durationName' => $task->durationName,
                'created_at' => date('Y-m-d H:i:s')
            ]);
        }
    }


    public function fifthOfMarchYearly()
    {
        // Create new task everyday...
        $tasks = Tasks::where('duration', 'fifthOfMarchYearly')->where('status', 'pending')->get();

        foreach ($tasks as $task) {
            // Update status to completed
            Tasks::where('id', $task->id)->update(['status' => 'completed']);
            Tasks::create([
                'name' => $task->name,
                'duration' => $task->duration,
                'durationName' => $task->durationName,
                'created_at' => date('Y-m-d H:i:s')
            ]);
        }
    }
}
