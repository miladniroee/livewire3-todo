<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title ?? 'Todo App' }}</title>
    @vite('resources/css/app.css')
    @livewireStyles
</head>
<body class="bg-slate-900 text-white overflow-x-hidden">
<nav class="w-full p-3">
    <div class="w-full p-4 h-[60px] bg-slate-800 rounded-[10px] flex items-center">
        <h1 class="uppercase text-2xl">TODO Live</h1>
        <a href="{{route('index')}}" class="ml-4 hover:text-gray-300 hover:underline" wire:navigate>Todo List</a>
        <a href="{{route('archive')}}" class="ml-4 hover:text-gray-300 hover:underline" wire:navigate>Archive</a>
    </div>
</nav>

<section class="w-full p-3">

    <div class="w-full">
        {{ $slot }}
    </div>
</section>


@livewireScripts
@vite('resources/js/app.js')
</body>
</html>
