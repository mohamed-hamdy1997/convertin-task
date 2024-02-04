<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateTaskRequest;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        return view('admin.tasks.index');
    }

    public function getTasksData(Request $request)
    {
        $columns = ['title', 'description', 'assigned_name', 'admin_name', 'created_at'];

        $limit = $request->length;
        $start = $request->start;
        $order = $columns[$request->input('order.0.column', 1)];
        $dir = $request->input('order.0.dir', 'desc');
        $search = $request->input('search.value');

        $tasks = Task::query()
            ->where(function ($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search . '%');
            })
            ->orderBy($order, $dir);

        $count = $tasks->count();
        $tasks = $tasks->skip($start)->take($limit)->get();
        $data = [];

        if (!empty($tasks)) {
            foreach ($tasks as $index => $record) {
                $nestedData = [];
                $nestedData['title'] = $record->title;
                $nestedData['description'] = $record->description;
                $nestedData['assigned_name'] = $record->user->name;
                $nestedData['admin_name'] = $record->admin->name;
                $nestedData['created_at'] = $record->created_at->toDateTimeString();

                $data[] = $nestedData;
            }
        }

        return response()->json(['draw' => intval($request->input('draw')), 'recordsFiltered' => $count, 'recordsTotal' => $count, 'data' => $data,]);
    }

    public function createTaskView()
    {
        $admins = User::query()->admin()->verified()->select(['id', 'name'])->get();
        $users = User::query()->user()->verified()->select(['id', 'name'])->get();

        return view('admin.tasks.create', compact(['admins', 'users']));
    }

    public function createTask(CreateTaskRequest $request)
    {
        Task::query()->create($request->validated());

        return redirect()->route('admin.tasks.view')->with('success', "The task is created successfully.");
    }
}
