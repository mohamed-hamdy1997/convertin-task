<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Statistic;
use Illuminate\Http\Request;

class StatisticController extends Controller
{
    public function index()
    {
        return view('admin.statistics.index');
    }

    public function getStatisticsData(Request $request)
    {
        $columns = ['user_name', 'num_of_tasks'];
        $start = $request->start;
        $order = $columns[$request->input('order.0.column', 1)];//num_of_tasks to get top users first
        $dir = $request->input('order.0.dir', 'desc');
        $search = $request->input('search.value');

        $statistics = Statistic::query()
            ->where(function ($query) use ($search) {
                $query->whereHas('user', function ($q) use ($search) {
                    $q->where('name', 'like', '%' . $search . '%');
                });
            })
            ->orderBy($order, $dir);

        $count = $statistics->count();
        $statistics = $statistics->skip($start)->take(10)->get();
        $data = [];

        if (!empty($statistics)) {
            foreach ($statistics as $index => $record) {
                $nestedData = [];
                $nestedData['user_name'] = $record->user->name;
                $nestedData['num_of_tasks'] = $record->num_of_tasks;
                $data[] = $nestedData;
            }
        }


        return response()->json(['draw' => intval($request->input('draw')), 'recordsFiltered' => $count, 'recordsTotal' => $count, 'data' => $data,]);
    }
}
