<div class="container mx-auto">
    <div class="block mb-7">
        <a href="{{route('todo', $todo->id)}}" class="link " wire:navigate>
            <svg class="w-4 h-4 inline-block" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                 viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7"
                      d="M5 1 1 5l4 4"/>
            </svg>
            <span class="align-middle">Back to Todo</span>
        </a>
    </div>



    <form wire:submit.prevent="updateTodo" class="w-full p-4 bg-slate-800 rounded-[10px] flex flex-col gap-4">

        <div class="flex flex-col space-y-2">
            <label for="title">Title</label>
            <input wire:model="title" type="text" id="title" class="input">
            @error('title')<small class="text-red-500">{{ $message }}</small>@enderror
        </div>

        <div class="flex flex-col space-y-2">
            <label for="description">Description</label>
            <textarea wire:model="description" id="description" class="input"></textarea>
            @error('description')<small class="text-red-500">{{ $message }}</small>@enderror
        </div>

        <div class="flex flex-col space-y-2">
            <label for="status">Status</label>
            <select wire:model="status" id="status" class="input">
                <option value="" disabled selected>Select Status</option>
                @foreach($options as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                @endforeach
            </select>
            @error('status') <small class="text-red-500">{{ $this->error }}</small> @enderror
        </div>


        <div class="flex flex-col space-y-2">
            <label for="due_date">Due Date</label>
            <input wire:model="due_date" type="date" id="due_date" min="{{now()->format('Y-m-d')}}" class="input text-white">
            @error('due_date')<small class="text-red-500">{{ $message }}</small>@enderror
        </div>

        <div class="flex gap-3">
            <button type="submit" class="btn ">Update Task</button>
            <a href="{{route('todo', $todo->id)}}" class="btn btn-outline-red" wire:navigate>Cancel</a>
        </div>
    </form>
</div>
