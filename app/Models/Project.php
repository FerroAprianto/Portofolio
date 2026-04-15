<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'role',
        'tech',
        'icon',
        'color',
        'demo_url',
        'github_url',
        'is_visible',
        'sort_order',
    ];

    protected $casts = [
        'tech'       => 'array',
        'is_visible' => 'boolean',
    ];

    // Scope: hanya yang visible, urut by sort_order
    public function scopeVisible($query)
    {
        return $query->where('is_visible', true)->orderBy('sort_order');
    }
}