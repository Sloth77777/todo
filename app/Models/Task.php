<?php

namespace App\Models;

use App\Traits\hasErrorTrait;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use hasErrorTrait;

    protected $table = 'tasks';
    protected $fillable = [
        'title',
        'status',
    ];
}
