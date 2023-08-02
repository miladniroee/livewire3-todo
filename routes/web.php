<?php

use App\Livewire\Archive;
use App\Livewire\EditTodo;
use App\Livewire\ShowTodo;
use App\Livewire\TodoList;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', TodoList::class)->name('index');

Route::get('archive', Archive::class)->name('archive');
Route::get('todo/{id}', ShowTodo::class)->name('todo');
Route::get('todo/{id}/edit', EditTodo::class)->name('todo.edit');

