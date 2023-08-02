<div x-data="{ open: false }">

    <button @click="open = !open" class="btn flex gap-2 items-center ">
        <svg class="w-4 h-4 inline-block" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="M9 1v16M1 9h16"/>
        </svg>
        <span>New Task</span>
    </button>


    <div x-show="open" @click="open = !open"
         class="w-full h-screen bg-black/50 absolute top-0 left-0 p-4 z-10" x-transition></div>


        <div x-show="open"
             class="box box-center my-3 w-[95%] lg:w-1/2 max-w-[700px] min-w-[300px] z-20">
            <h2 class="text-2xl font-bold pt-3 pb-5  text-center">New Task</h2>
            <div class="border border-bottom-1 border-gray-700"></div>
            <form wire:submit.prevent="createTodo" class="w-full p-4 bg-slate-800 rounded-[10px] flex flex-col gap-4">

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
                    <input wire:model="due_date" type="date" id="due_date" class="input text-white">
                    @error('due_date')<small class="text-red-500">{{ $message }}</small>@enderror
                </div>

                <div class="flex gap-3">
                    <button type="submit" class="btn ">Create Todo</button>
                    <button type="button" class="btn btn-outline-red" @click="open = !open">Cancel</button>
                </div>
            </form>
        </div>

</div>
