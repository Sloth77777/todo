<?php /** @var \Illuminate\Database\Eloquent\Collection|\App\Models\Task[] $tasks */ ?>
    <!doctype html>
<html lang="uk">
<head>
    <meta charset="utf-8">
    <title>To-Do List</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .task-done { text-decoration: line-through; color: #6c757d; }
    </style>
</head>
<body class="bg-light">
<div class="container py-4">
    <h1 class="mb-4">Список завдань</h1>

    @if (session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif

    <div class="card mb-4">
        <div class="card-body">
            <form class="row g-2" action="{{ route('tasks.store') }}" method="post">
                @csrf
                <div class="col-md-10">
                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Нове завдання..." required maxlength="255" value="{{ old('title') }}">
                    @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-2 d-grid">
                    <button class="btn btn-primary" type="submit">Додати</button>
                </div>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0 align-middle">
                    <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Назва</th>
                        <th>Статус</th>
                        <th class="text-end" style="width: 220px;">Дії</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($tasks as $task)
                        <tr>
                            <td>{{ $task->id }}</td>
                            <td class="{{ $task->status === 'done' ? 'task-done' : '' }}">{{ $task->title }}</td>
                            <td>
                                @if($task->status === 'done')
                                    <span class="badge bg-success">done</span>
                                @else
                                    <span class="badge bg-secondary">pending</span>
                                @endif
                            </td>
                            <td class="text-end">
                                <a class="btn btn-sm btn-outline-secondary" href="{{ route('tasks.edit', $task) }}">Редагувати</a>
                                <form action="{{ route('tasks.destroy', $task) }}" method="post" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger" onclick="return confirm('Видалити завдання?')">Видалити</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted py-4">Поки що немає завдань</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</body>
</html>
