<?php

declare(strict_types=1);

namespace App\Http\Service;

use App\DTOs\TaskDTO;
use App\Http\Repositories\TaskRepository;
use App\Models\Task;
use App\Traits\hasErrorTrait;
use Illuminate\Support\Facades\DB;

class TaskService
{
    use hasErrorTrait;
    protected string $error;

    public function __construct(protected TaskRepository $taskRepository)
    {
    }

    public function store(TaskDTO $toDto): static
    {
        try {
            DB::beginTransaction();
            $this->taskRepository->store([
                'title' => $toDto->title,
                'status' => $toDto->status
            ]);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            $this->addError($exception->getMessage());
        }
        return $this;
    }

    public function update(TaskDTO $toDto, Task $task): static
    {
        try {
            DB::beginTransaction();
            $this->taskRepository->update([
                'title' => $toDto->title,
                'status' => $toDto->status
            ], $task);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            $this->addError($exception->getMessage());
        }
        return $this;
    }

    public function destroy(int $id): static
    {
        try {
            $this->taskRepository->destroy($id);
        } catch (\Exception $exception) {
            $this->addError($exception->getMessage());
        }
        return $this;
    }
}
