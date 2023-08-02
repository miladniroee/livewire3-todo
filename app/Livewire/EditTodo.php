<?php

namespace App\Livewire;

use App\Models\Todo;
use Livewire\Component;

class EditTodo extends Component
{

    public ?Todo $todo = null;
    public string $title = '';
    public string $description = '';

    public string $status = '';
    public string $due_date = '';

    public array $options = [
        'todo' => 'Todo',
        'in_progress' => 'In Progress',
        'done' => 'Done',
    ];

    public function mount(int $id)
    {
        $this->todo = Todo::findOrFail($id);
        $this->title = $this->todo->title;
        $this->description = $this->todo->description;
        $this->status = $this->todo->status;
        $this->due_date = $this->todo->due_date->format('Y-m-d');
    }

    public function updateTodo()
    {
        $this->validate([
            'title' => 'required',
            'description' => 'required',
            'status' => 'required|in:todo,in_progress,done',
            'due_date' => 'required|after:yesterday'
        ]);

        $this->todo->title = $this->title;
        $this->todo->description = $this->description;
        $this->todo->status = $this->status;
        $this->todo->due_date = $this->due_date;
        $this->todo->save();

        session()->flash('dispatchable', [
            'swal:alert',
            [
                'type' => 'success',
                'message' => 'Todo Updated!',
            ]
        ]);

        return redirect()->route('index');
    }

    public function render()
    {
        return view('livewire.edit-todo');
    }
}
