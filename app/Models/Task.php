<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $fillable = [
      'tid',
      'vid',
      'name',
      'completed_by',
      'description',
      'odo',
      'tprice',
      'datecomp',
      'datestart'
    ];
    protected $primaryKey = 'tid';
}
