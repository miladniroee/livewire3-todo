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


    <div>
        <h2 class="text-3xl font-bold mb-3">Archive</h2>
        <div class="flex flex-wrap gap-3">
            @foreach($archives as $todo)
                <div class="box flex-1 min-w-[200px] relative overflow-x-hidden flex flex-col"
                     style="flex-basis: min-content">

                    <h3 class="text-xl pr-[80px] bold mb-3 truncate">{{$todo->title}}</h3>

                    <p>{{\Illuminate\Support\Str::excerpt($todo->description)}}</p>

                    <div class="flex justify-between flex-row-reverse items-center  mt-auto">
                        <time class="whitespace-nowrap badge h-min bg-blue-500">{{$todo->formatted_due_date}}</time>
                        <button type="button" class="link p-1" wire:click="restore({{$todo->id}})">
                            <svg class="w-[17px] h-[17px] inline-block" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="m14.707 4.793-4-4a1 1 0 0 0-1.416 0l-4 4a1 1 0 1 0 1.416 1.414L9 3.914V12.5a1 1 0 0 0 2 0V3.914l2.293 2.293a1 1 0 0 0 1.414-1.414Z"/>
                                <path d="M18 12h-5v.5a3 3 0 0 1-6 0V12H2a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2Zm-3 5a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z"/>
                            </svg>
                            <span class="align-middle">Restore</span>
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</div>
