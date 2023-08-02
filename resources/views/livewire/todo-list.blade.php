<div class="container mx-auto">

    <div class="flex gap-3 justify-end my-8">
        <div class="lg:flex gap-3 hidden" >
            <button onclick="columnView()">
                <svg class="w-[36px] h-[36px] text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="20" height="16" fill="none" viewBox="0 0 20 16">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" d="M13 1v14M7 1v14M2 1h16a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1Z"/>
                </svg>
            </button>
            <button onclick="rowView()">
                <svg class="w-[36px] h-[36px] text-gray-500 rotate-90" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="20" height="16" fill="none" viewBox="0 0 20 16">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" d="M13 1v14M7 1v14M2 1h16a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1Z"/>
                </svg>
            </button>
        </div>
        @livewire('CreateTodo')
    </div>
    <div class="flex flex-col gap-7" id="container-todo">
        @if(!$inProgressTodos->isEmpty())
            <div>
                <h2 class="text-3xl font-bold mb-3">In Progress</h2>
                <div class="flex flex-wrap gap-3">
                    @foreach($inProgressTodos as $todo)
                        <div class="box flex-1 min-w-[200px] relative overflow-x-hidden flex flex-col"
                             style="flex-basis: min-content">
                            <button class="absolute top-3 right-3 text-gray-700 hover:text-white transition-all w-[17px] hover:w-[80px] whitespace-nowrap overflow-hidden" type="button" wire:click="archive({{$todo->id}})">
                                <svg class="w-[17px] h-[17px] inline-block" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linejoin="round" stroke-width="1.7" d="M8 8v1h4V8m4 7H4a1 1 0 0 1-1-1V5h14v9a1 1 0 0 1-1 1ZM2 1h16a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1Z"/>
                                </svg>
                                <span>Archive</span>
                            </button>
                            <h3 class="text-xl pr-[80px] bold mb-3 truncate">{{$todo->title}}</h3>


                            <p>{{\Illuminate\Support\Str::excerpt($todo->description)}}</p>

                            <div class="flex justify-between flex-row-reverse items-center  mt-auto">
                                <time @class([
                        'whitespace-nowrap',
                        'badge',
                        'h-min',
                        "bg-red-500" => $todo->due_date->isPast(),
                        "bg-yellow-500" => $todo->due_date->isToday(),
                        "bg-green-500" => $todo->due_date->isFuture(),
                        ])>{{$todo->formatted_due_date}}</time>
                                <a href="{{route('todo',$todo->id)}}" class="link p-1" wire:navigate>
                                    <span>More...</span>
                                    <svg class="w-[17px] h-[17px] inline-block" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" d="m1 9 4-4-4-4"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif


        @if(!$todos->isEmpty())
            <div>
                <h2 class="text-3xl font-bold mb-3">Todos</h2>
                <div class="flex flex-wrap gap-3">
                    @foreach($todos as $todo)
                        <div class="box flex-1 min-w-[200px] relative overflow-x-hidden flex flex-col"
                             style="flex-basis: min-content">
                            <button class="absolute top-3 right-3 text-gray-700 hover:text-white transition-all w-[17px] hover:w-[80px] whitespace-nowrap overflow-hidden" type="button" wire:click="archive({{$todo->id}})">
                                <svg class="w-[17px] h-[17px] inline-block" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linejoin="round" stroke-width="1.7" d="M8 8v1h4V8m4 7H4a1 1 0 0 1-1-1V5h14v9a1 1 0 0 1-1 1ZM2 1h16a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1Z"/>
                                </svg>
                                <span>Archive</span>
                            </button>
                            <h3 class="text-xl pr-[80px] bold mb-3 truncate">{{$todo->title}}</h3>


                            <p>{{\Illuminate\Support\Str::excerpt($todo->description)}}</p>

                            <div class="flex justify-between flex-row-reverse items-center  mt-auto">
                                <time @class([
                        'whitespace-nowrap',
                        'badge',
                        'h-min',
                        "bg-red-500" => $todo->due_date->isPast(),
                        "bg-yellow-500" => $todo->due_date->isToday(),
                        "bg-green-500" => $todo->due_date->isFuture(),
                        ])>{{$todo->formatted_due_date}}</time>
                                <a href="{{route('todo',$todo->id)}}" class="link p-1" wire:navigate>
                                    <span>More...</span>
                                    <svg class="w-[17px] h-[17px] inline-block" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" d="m1 9 4-4-4-4"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif


        <div>
            <h2 class="text-3xl font-bold mb-3">Done</h2>
            <div class="flex flex-wrap gap-3">
                @foreach($doneTodos as $todo)
                    <div class="box flex-1 min-w-[200px] relative overflow-x-hidden flex flex-col"
                         style="flex-basis: min-content">
                        <button class="absolute top-3 right-3 text-gray-700 hover:text-white transition-all w-[17px] hover:w-[80px] whitespace-nowrap overflow-hidden" type="button" wire:click="archive({{$todo->id}})">
                            <svg class="w-[17px] h-[17px] inline-block" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                <path stroke="currentColor" stroke-linejoin="round" stroke-width="1.7" d="M8 8v1h4V8m4 7H4a1 1 0 0 1-1-1V5h14v9a1 1 0 0 1-1 1ZM2 1h16a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1Z"/>
                            </svg>
                            <span>Archive</span>
                        </button>
                        <h3 class="text-xl pr-[80px] bold mb-4 truncate">{{$todo->title}}</h3>
                        <p class="mb-4">{{\Illuminate\Support\Str::excerpt($todo->description)}}</p>
                        <div class="flex justify-between flex-row-reverse items-center  mt-auto">
                            <time @class([
                        'whitespace-nowrap',
                        'badge',
                        'h-min',
                        "bg-red-500" => $todo->due_date->isPast(),
                        "bg-yellow-500" => $todo->due_date->isToday(),
                        "bg-green-500" => $todo->due_date->isFuture(),
                        ])>{{$todo->formatted_due_date}}</time>
                            <a href="{{route('todo',$todo->id)}}" class="link p-1" wire:navigate>
                                <span>More...</span>
                                <svg class="w-[17px] h-[17px] inline-block" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" d="m1 9 4-4-4-4"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>

    <script>
        function rowView() {
            document.getElementById('container-todo').classList.remove('lg:flex-row')
        }

        function columnView() {
            document.getElementById('container-todo').classList.add('lg:flex-row')
        }
    </script>

</div>

