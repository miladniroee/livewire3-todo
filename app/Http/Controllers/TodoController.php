<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public static function store(string $title, string $description, string $status, string $due_date, ?int $user_id = NULL)
    {
        return Todo::create([
            'title' => $title,
            'description' => $description,
            'status' => $status,
            'due_date' => $due_date,
            'user_id' => $user_id,
        ]);

    }

    public static function update(int $id, string $title, string $description, string $status, string $due_date, ?int $user_id = NULL)
    {
        $todo = Todo::find($id);
        $todo->title = $title;
        $todo->description = $description;
        $todo->status = $status;
        $todo->due_date = $due_date;
        $todo->user_id = $user_id;
        $todo->save();
        return $todo;
    }


}
