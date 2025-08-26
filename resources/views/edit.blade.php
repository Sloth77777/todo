<!doctype html>
<html lang="uk">
<head>
    <meta charset="utf-8">
    <title>Редагувати завдання #{{ $task->id }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-4">
    <h1 class="mb-4">Редагувати завдання</h1>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('tasks.update', $task) }}" method="post">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Назва</label>
                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" required
                           maxlength="255" value="{{ old('title', $task->title) }}">
                    @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Статус</label>
                    <select name="status" class="form-select @error('status') is-invalid @enderror" required>
                        <option value="pending" @selected(old('status', $task->status) === 'pending')>pending</option>
                        <option value="done" @selected(old('status', $task->status) === 'done')>done</option>
                    </select>
                    @error('status')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex gap-2">
                    <a href="{{ route('tasks.index') }}" class="btn btn-outline-secondary">Назад</a>
                    <button class="btn btn-primary" type="submit">Зберегти</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
