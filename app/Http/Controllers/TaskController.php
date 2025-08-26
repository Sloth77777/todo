<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\TaskStoreRequest;
use App\Http\Requests\TaskUpdateRequest;
use App\Http\Service\TaskService;
use App\Models\Task;
use App\Traits\hasErrorTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class TaskController extends Controller
{
    use HasErrorTrait;
    public function __construct(private readonly TaskService $taskService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index():View
    {
        $tasks = Task::query()->paginate(10)->withQueryString();

        return view('index', ['tasks' => $tasks]);
    }


    /**
     * Store a newly created resource in storage.
     * @throws \Exception
     */
    public function store(TaskStoreRequest $request): RedirectResponse
    {
        $task = $this->taskService->store($request->toDto());

        if ($task->hasErrors()) {
            return back()->withErrors($task->getErrors());
        }

        return to_route('tasks.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task):View
    {
        return view('show', ['task' => $task])->with('task', $task);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task):View
    {
        return view('edit', ['task' => $task])->with('task', $task);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TaskUpdateRequest $request, Task $task): RedirectResponse
    {
        $taskUpdate = $this->taskService->update($request->toDto(),$task);

        if ($taskUpdate->hasErrors()) {
            return back()->withErrors($taskUpdate->getErrors());
        }

        return to_route('tasks.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task): RedirectResponse
    {
        $taskDelete = $this->taskService->destroy($task->id);

        if ($taskDelete->hasErrors()) {
            return back()->withErrors($taskDelete->getErrors());
        }

        return to_route('tasks.index');
    }
}
