<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Facultie extends Model
{
    public $table = 'faculties';

    public $fillable = [
        'name',
        'notes'
    ];

    protected $casts = [
        'name' => 'string',
        'notes' => 'string'
    ];

    public static $rules = [
        'name' => 'required|string',
        'notes' => 'nullable|string',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    public function classrooms()
    {
        return $this->hasMany(\App\Models\Classroom::class);
    }

    public function sections()
    {
        return $this->hasMany(\App\Models\Section::class);
    }
}
