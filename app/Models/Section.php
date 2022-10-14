<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    public $table = 'sections';

    public $fillable = [
        'facultie_id',
        'classroom_id',
        'name',
        'status'
    ];

    protected $casts = [
        'name' => 'string',
        'status' => 'boolean'
    ];

    public static $rules = [
        'facultie_id' => 'required',
        'classroom_id' => 'required',
        'name' => 'required|string',
        'status' => 'required|boolean',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    public function classroom()
    {
        return $this->belongsTo(\App\Models\Classroom::class);
    }

    public function facultie()
    {
        return $this->belongsTo(\App\Models\Faculty::class);
    }
}
