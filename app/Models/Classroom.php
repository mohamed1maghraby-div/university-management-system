<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    use HasFactory;

    public $table = 'classrooms';

    public $fillable = [
        'facultie_id',
        'name'
    ];

    protected $casts = [
        'facultie_id' => 'string',
        'name' => 'string'
    ];

    public static $rules = [
        'facultie_id' => 'required|numeric',
        'name' => 'required|string',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    public function facultie()
    {
        return $this->belongsTo(\App\Models\Facultie::class);
    }
}
