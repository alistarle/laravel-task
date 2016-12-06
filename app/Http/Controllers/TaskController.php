<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use App\Models\Todo;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    /**
     * Create a new task in the given todo
     *
     * @param Todo $todo
     * @param TaskRequest $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function store(Todo $todo, TaskRequest $request)
    {
        $task = new Task($request->all());
        $todo->tasks()->save($task);
        if($request->is('api/*'))
            return $task;
        else
            return view('blocs.task',$task);
    }

    /**
     * Update the given task
     *
     * @param TaskRequest $request
     * @param Task $task
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function update(TaskRequest $request, Task $task)
    {
        $task->update($request->all());
        if($request->users)
            $task->users()->sync(explode(',',$request->users));

        if($request->is('api/*'))
            return 'OK';
        else
            return view('blocs.task',$task);
    }

    /**
     * Delete the given task
     *
     * @param Task $task
     * @return \Illuminate\Http\RedirectResponse|string
     * @throws \Exception
     */
    public function delete(Request $request, Task $task)
    {
        $task->delete();
        if($request->is('api/*'))
            return 'OK';
        else
            return redirect()->back();
    }
}
