<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Todo extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'status',
        'due_date',
        'user_id',
        'is_archived',
    ];

    protected $casts = [
        'due_date' => 'datetime',
        'is_archived' => 'boolean',
    ];

    protected $appends = [
        'formatted_due_date',
        'formatted_status'
    ];

    protected static function booted()
    {
        static::addGlobalScope('not_archived', function ($query) {
            $query->where('is_archived', false);
        });
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getFormattedDueDateAttribute(): string
    {
        return $this->due_date->format('F j, Y');
    }

    public function getFormattedStatusAttribute(): string
    {
        return ucfirst(str_replace('_', ' ', $this->status));
    }

    public function scopeSearch($query, $search)
    {
        return $query->where('title', 'like', '%' . $search . '%')
            ->orWhere('description', 'like', '%' . $search . '%');
    }

    public function scopeExpired($query)
    {
        return $query->where('due_date', '<', now());
    }

    public function scopeDueToday($query)
    {
        return $query->where('due_date', now()->format('Y-m-d'));
    }

    public function scopeDueTomorrow($query)
    {
        return $query->where('due_date', now()->addDay()->format('Y-m-d'));
    }

    public function scopeTodoStatus($query)
    {
        return $query->where('status', 'todo');
    }

    public function scopeInProgressStatus($query)
    {
        return $query->where('status', 'in_progress');
    }

    public function scopeDoneStatus($query)
    {
        return $query->where('status', 'done');
    }

}
