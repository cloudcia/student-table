<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = 'students';

    protected $fillable = ['nis', 'nama', 'tanggal_lahir', 'grade_id', 'alamat'];

    public function grades()
    {
        return $this->belongsTo(\App\Models\Grade::class, 'grade_id');
    }
}
