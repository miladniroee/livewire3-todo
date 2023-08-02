<?php

namespace App\Livewire;

use App\Http\Controllers\TodoController;
use App\Models\Todo;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class ShowTodo extends Component
{

    protected $listeners = ['destroy','archive'];
    public ?Todo $todo = null;
    public string $description = '';

    public function mount(int $id)
    {
        $this->todo = Todo::findOrFail($id);
        $this->description = $this->todo->description;
    }

    public function destroy()
    {
        $this->todo->delete();

        Session::flash('dispatchable',[
            'swal:alert',
            [
                'type' => 'success',
                'message' => 'Task Deleted!',
            ]
        ]);

        return redirect()->route('index');
    }

    public function archive()
    {

        $this->todo->is_archived = true;
        $this->todo->save();

        Session::flash('dispatchable',[
            'swal:alert',
            [
                'type' => 'success',
                'message' => 'Task Archived!',
            ]
        ]);

        return redirect()->route('index');
    }

    public function archiveAlert()
    {
        $this->dispatch('swal:confirm', [
            'type' => 'info',
            'message' => 'Are you sure?',
            'text' => 'If Archive, you will be able to recover this task from Archives!',
            'dispatch' => 'archive',
        ]);
    }

    public function deleteAlert()
    {

        $this->dispatch('swal:confirm', [
            'type' => 'error',
            'message' => 'Are you sure?',
            'text' => 'If deleted, you will not be able to recover this imaginary file!',
            'dispatch' => 'destroy',
        ]);

    }

    public function render()
    {
        return view('livewire.show-todo');
    }
}
