<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display list of todos
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        if(isset($request->archived))
            $todos = Todo::with("tasks.users")->get();
        elseif(isset($request->onlyArchived))
            $todos = Todo::with("tasks.users")->archived()->get();
        else
            $todos = Todo::with("tasks.users")->unarchived()->get();

        if($request->is('api/*'))
            return $todos;
        else
            return view('main', compact('todos'));
    }

    /**
     * Display only the given todo
     *
     * @param Request $request
     * @param Todo $todo
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Request $request, Todo $todo)
    {
        $todo->load('tasks.users');
        if($request->is('api/*'))
            return $todo;
        else
            return view('todo', compact('todo'));
    }

    /**
     * Create a new Todo with the given form
     *
     * @param TodoRequest $request
     * @return Todo|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function store(TodoRequest $request)
    {
        $todo = new Todo($request->all());
        $todo->save();
        if($request->is('api/*'))
            return $todo;
        else
            return view('blocs.todo',compact('todo'));
    }

    /**
     * Update the given todo
     *
     * @param TodoRequest $request
     * @param Todo $todo
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|string
     */
    public function update(TodoRequest $request, Todo $todo)
    {
        $todo->update($request->all());
        if($request->is('api/*'))
            return 'OK';
        else
            return view('blocs.todo',compact('todo'));
    }

    /**
     * Delete the given todo
     *
     * @param Request $request
     * @param Todo $todo
     * @return string
     * @throws \Exception
     */
    public function delete(Request $request, Todo $todo)
    {
        $todo->delete();
        if($request->is('api/*'))
            return 'OK';
        else
            return redirect()->back();
    }
}
