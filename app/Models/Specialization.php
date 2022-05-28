<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Technician;

class Specialization extends Model {
    use HasFactory;

    protected $table = 'Specialization';
    protected $primaryKey = 'id_specialist';
    protected $fillable = [
        'id_specialist',
        'category',
        'created_at',
        'updated_at',
    ];

    public function technician(){
        return $this->hasMany(Technician::class);
    }
}
