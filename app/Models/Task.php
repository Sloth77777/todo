<?php

namespace App\Models;

use App\Enum\StatusTaskEnum;
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
    protected $casts = [
        'status' => StatusTaskEnum::class,
    ];

}
