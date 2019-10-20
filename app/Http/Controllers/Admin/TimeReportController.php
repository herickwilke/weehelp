<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\TimeEntry;
use Carbon\Carbon;

class TimeReportController extends Controller
{
    public function index()
    {
        $from = Carbon::now();
        $to   = Carbon::now();

        if (request('from')) {
            $from = Carbon::createFromFormat(config('panel.date_format'), request('from'));
        }

        if (request('to')) {
            $to = Carbon::createFromFormat(config('panel.date_format'), request('to'));
        }

        $projects = TimeEntry::with('project')
            ->whereBetween('start_time', [$from, $to])
            ->get();

        $workTypes = TimeEntry::with('work_type')
            ->whereBetween('start_time', [$from, $to])
            ->get();

        $projectTimes = [];

        foreach ($projects as $project) {
            if ($project->project_id && $project->project) {
                $begin = Carbon::createFromFormat(
                    config('panel.date_format') . ' ' . config('panel.time_format'),
                    $project->start_time
                );
                $end = Carbon::createFromFormat(
                    config('panel.date_format') . ' ' . config('panel.time_format'),
                    $project->end_time
                );

                if (!isset($projectTimes[$project->project->id])) {
                    $projectTimes[$project->project->id] = [
                        'name' => $project->project->name,
                        'time' => $begin->diffInSeconds($end),
                    ];
                } else {
                    $projectTimes[$project->project->id]['time'] += $begin->diffInSeconds($end);
                }
            }
        }

        $workTypeTime = [];

        foreach ($workTypes as $workType) {
            if ($workType->work_type_id && $workType->work_type) {
                $begin = Carbon::createFromFormat(
                    config('panel.date_format') . ' ' . config('panel.time_format'),
                    $workType->start_time
                );
                $end = Carbon::createFromFormat(
                    config('panel.date_format') . ' ' . config('panel.time_format'),
                    $workType->end_time
                );

                if (!isset($workTypeTime[$workType->work_type->id])) {
                    $workTypeTime[$workType->work_type->id] = [
                        'name' => $workType->work_type->name,
                        'time' => $begin->diffInSeconds($end),
                    ];
                } else {
                    $workTypeTime[$workType->work_type->id]['time'] += $begin->diffInSeconds($end);
                }
            }
        }

        return view('admin.timeReports.index', compact('projectTimes', 'workTypeTime'));
    }
}
