<?php

namespace App\Livewire;

use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Request;
use Livewire\Component;

class CreateTodo extends Component
{

    public string $title = '';
    public string $description = '';

    public string $status = '';
    public string $due_date = '';

    public array $options = [
        'todo' => 'Todo',
        'in_progress' => 'In Progress',
        'done' => 'Done',
    ];

    public function createTodo()
    {
        $this->validate([
            'title' => 'required',
            'description' => 'required',
            'status' => 'required|in:todo,in_progress,done',
            'due_date' => 'required|after:yesterday'
        ]);

        $Todo = TodoController::store(
            $this->title,
            $this->description,
            $this->status,
            $this->due_date,
        );

        if ($Todo) {
            session()->flash('message', 'Todo successfully created.');
            return redirect()->route('index');
        } else {
            session()->flash('message', 'Something went wrong.');
        }
    }

    public function render()
    {
        return view('livewire.create-todo');
    }
}
