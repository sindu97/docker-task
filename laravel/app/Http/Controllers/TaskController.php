<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use App\Models\User;
use App\Services\ApiService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class TaskController extends Controller
{

    /**
     * Contruct to call the apiservices
     * @throws Exception
     * @author Surinder Rana
     * @since 27/09/2024
     */

    public function __construct(
        protected ApiService $apiService
    ) {}


    /**
     * @param $request
     * @return array
     * @throws Exception
     * @author Surinder Rana
     * @since 27/09/2024
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {
        $allTasks = Task::where('user_id', Auth::user()->id)
            ->when($request->filled('status'), function ($query) use ($request) {
                $query->where('status', $request->status);
            })
            ->when($request->filled('priority'), function ($query) use ($request) {
                $query->where('priority', $request->priority);
            })
            ->when($request->filled('due_date'), function ($query) use ($request) {
                $query->whereDate('due_date', $request->due_date);
            })->paginate(10);
        return view('task.index', ['allTasks' => $allTasks]);
    }

    /**
     * @throws Exception
     * @author Surinder Rana
     * @since 27/09/2024
     * Show the form for creating a new resource.
     */

    public function create()
    {
        return view('task.create');
    }


    /**
     * @param $TaskRequest
     * @throws Exception
     * @author Surinder Rana
     * @since 27/09/2024
     * Store a newly created resource in storage.
     */

    public function store(TaskRequest $request)
    {
        try {
            $data = $request->validated();
            $extraData = ['user_id' => Auth::user()->id];
            $totalData = array_merge($data, $extraData);
            Task::create($totalData);
            return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
        } catch (Exception $e) {
            return redirect()->route('tasks.index')->with('error', 'Task deleted successfully.');
        }
    }

    /**
     * @param $TaskRequest
     * @throws Exception
     * @author Surinder Rana
     * @since 27/09/2024
     * Show the form for editing the specified resource.
     */

    public function edit($id)
    {
        $task = Task::findOrFail($id);
        return view('task.edit', ['task' => $task]);
    }

    /**
     * @throws Exception
     * @author Surinder Rana
     * @since 27/09/2024
     * Update the specified resource in storage.
     */

    public function update(TaskRequest $request, string $id)
    {
        try {
            $data = $request->validated();
            $task = Task::where('id', $id)->update($data);
            return redirect()->route('tasks.index')->with('success', 'Task Updated successfully.');
        } catch (Exception $e) {
            return redirect()->route('tasks.index')->with('error', 'Task not updated successfully.');
        }
    }

    /**
     * @throws Exception
     * @author Surinder Rana
     * @since 27/09/2024
     * Remove the specified resource from storage.
     */

    public function delete(string $id)
    {
        try {
            $item = Task::findOrFail($id);
            $item->delete();
            return redirect()->route('tasks.index')->with('success', 'Task Deleted successfully.');
        } catch (Exception $e) {
            return redirect()->route('tasks.index')->with('error', 'Task not deleted successfully.');
        }
    }

    /**
     * @throws Exception
     * @author Surinder Rana
     * @since 27/09/2024
     * Download the Csv
     */

    public function downloadCsv()
    {

        try {
            if (!$this->apiService->downaloadCsv()) {
                return redirect()->route('tasks.index')->with('error', 'Something went wrong!');
            }
            return $this->apiService->downaloadCsv();
        } catch (Exception $e) {
            return redirect()->route('tasks.index')->with('error', 'Something went wrong!');
        }
    }
}
