<div class="container mx-auto">
    <div class="block mb-7">
        <a href="{{route('index')}}" class="link" wire:navigate>
            <svg class="w-4 h-4 inline-block" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                 viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7"
                      d="M5 1 1 5l4 4"/>
            </svg>
            <span class="align-middle">Back to list</span>
        </a>
    </div>

    <time @class([
                        'whitespace-nowrap',
                        'badge',
                        'h-min',
                        "bg-red-500" => $todo->due_date->isPast(),
                        "bg-yellow-500" => $todo->due_date->isToday(),
                        "bg-green-500" => $todo->due_date->isFuture(),
                        ])>{{$todo->formatted_due_date}}</time>

    <h2 class="text-3xl font-bold mt-2">{{$todo->title}}</h2>

    <p class="leading-10 my-8">{{$todo->description}}</p>


    <a href="{{route('todo.edit', $todo->id)}}" class="btn" wire:navigate>
        <svg class="w-4 h-4 inline-block" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
             viewBox="0 0 20 18">
            <path
                d="M12.687 14.408a3.01 3.01 0 0 1-1.533.821l-3.566.713a3 3 0 0 1-3.53-3.53l.713-3.566a3.01 3.01 0 0 1 .821-1.533L10.905 2H2.167A2.169 2.169 0 0 0 0 4.167v11.666A2.169 2.169 0 0 0 2.167 18h11.666A2.169 2.169 0 0 0 16 15.833V11.1l-3.313 3.308Zm5.53-9.065.546-.546a2.518 2.518 0 0 0 0-3.56 2.576 2.576 0 0 0-3.559 0l-.547.547 3.56 3.56Z"/>
            <path
                d="M13.243 3.2 7.359 9.081a.5.5 0 0 0-.136.256L6.51 12.9a.5.5 0 0 0 .59.59l3.566-.713a.5.5 0 0 0 .255-.136L16.8 6.757 13.243 3.2Z"/>
        </svg>
        <span class="align-middle">Edit</span>
    </a>


    <div class="border-0 border-b-[1px] border-gray-700 mt-10 mb-4"></div>


    <div>
        <h4 class="text-xl mb-4">More Actions</h4>
        <button type="button" class="btn btn-outline mr-3" wire:click="archiveAlert">
            <svg class="w-4 h-4 inline-block" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                 viewBox="0 0 20 16">
                <path
                    d="M19 0H1a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h18a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1ZM2 6v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6H2Zm11 3a1 1 0 0 1-1 1H8a1 1 0 0 1-1-1V8a1 1 0 0 1 2 0h2a1 1 0 0 1 2 0v1Z"/>
            </svg>
            <span class="align-middle">Archive</span>
        </button>
        <button type="button" class="btn btn-outline-red" wire:click="deleteAlert">
            <svg class="w-4 h-4 inline-block" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                 viewBox="0 0 18 20">
                <path
                    d="M17 4h-4V2a2 2 0 0 0-2-2H7a2 2 0 0 0-2 2v2H1a1 1 0 0 0 0 2h1v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V6h1a1 1 0 1 0 0-2ZM7 2h4v2H7V2Zm1 14a1 1 0 1 1-2 0V8a1 1 0 0 1 2 0v8Zm4 0a1 1 0 0 1-2 0V8a1 1 0 0 1 2 0v8Z"/>
            </svg>
            <span class="align-middle">Delete</span>
        </button>
    </div>

</div>
