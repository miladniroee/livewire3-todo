<?php

namespace App\Livewire;

use App\Models\Todo;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class TodoList extends Component
{

    protected $listeners = [
        'archive'
    ];

    public Collection $todos;
    public Collection $doneTodos;
    public Collection $inProgressTodos;

    public function archive(int $id)
    {
        $todo = Todo::findOrFail($id);
        $todo->is_archived = true;
        $todo->save();

        Session::flash('dispatchable',[
            'swal:alert',
            [
                'type' => 'success',
                'message' => 'Task Archived!',
            ]
        ]);

        return redirect()->route('index');
    }


    public function mount()
    {
        $this->todos = Todo::orderBy('due_date', 'asc')->todoStatus()->get();
        $this->doneTodos = Todo::orderBy('due_date', 'asc')->doneStatus()->get();
        $this->inProgressTodos = Todo::orderBy('due_date', 'asc')->inProgressStatus()->get();

        if (Session::has('dispatchable')) {
            $this->dispatch(...(Session::get('dispatchable')));
        }
    }

    public function render()
    {
        return view('livewire.todo-list');
    }
}
