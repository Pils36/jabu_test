<?php

namespace App\Http\Controllers;

use App\Models\Tasks;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        $tasks = new TaskController();

        $data = [
            'tasks' => $tasks->eventActivities()
        ];

        return view('pages.index')->with(['data' => $data]);
    }


    public function store(Request $request)
    {
        try {

            $days = Carbon::now();

            switch ($request->duration) {
                case 'everyday':
                    $request['durationName'] = 'Everyday';
                    break;
                case 'mondays':
                    $request['durationName'] = 'Mondays';
                    break;
                case 'weeklyOnMondayWednesdayFriday':
                    $request['durationName'] = 'Every Monday, Wednesday, Friday';
                    break;
                case 'fifthOfTheMonth':
                    $request['durationName'] = '5th of the month';
                    break;
                case 'fifthOfMarchYearly':
                    $request['durationName'] = '5th of March Yearly';
                    break;

                default:
                    $request['durationName'] = 'Everyday';
                    break;
            }

            $request['created_at'] = date('Y-m-d H:i:s');

            unset($request['_token']);

            Tasks::insert($request->all());

            $message = "Task added successfully";
            $status = "success";

        } catch (\Throwable $th) {
            $message = $th->getMessage();
            $status = "error";
        }


        return back()->with($status, $message);
    }
}
