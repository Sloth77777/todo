<?php

declare(strict_types=1);

namespace App\Http\Repositories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Model;

class TaskRepository
{

    public function store(array $array): Model|Task
    {
        return Task::query()->create($array);
    }

    public function update(array $array, Task $task): bool
    {
        return $task->update($array);
    }

    public function destroy(int $id): ?bool
    {
        return Task::query()->findOrFail($id)?->delete();
    }

}
