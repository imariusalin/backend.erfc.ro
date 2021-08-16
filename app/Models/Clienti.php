<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Response;


class Clienti extends Model
{
    use HasFactory;
    public $table = 'clienti';
    protected $fillable = [
      'nume_firma', 'cui_firma','owner','status'
    ];
}
