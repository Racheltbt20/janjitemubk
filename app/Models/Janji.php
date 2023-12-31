<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Janji extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $casts = [
        'tanggal' => 'datetime'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function guru() {
        return $this->belongsTo(Guru::class);
    }
}
