<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;

    protected $table = 'grades';
    protected $fillable = ['nama'];

    public function scopeFilter($query, array $filters){
        if(isset($filters['search']) ? $filters['search'] : false){
          return  $query->where('nama', 'like', '%' . request('search') . '%');
        }
    }

}
