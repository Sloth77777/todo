<?php

declare(strict_types=1);

namespace App\Http\Requests;

use App\DTOs\TaskDTO;
use App\Enum\StatusTaskEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TaskStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'status' => ['sometimes', Rule::enum(StatusTaskEnum::class)],
        ];
    }

    public function toDto(): TaskDto
    {
        $data = $this->validated();

        return new TaskDTO(
            $data['title'],
            $data['status'] ?? StatusTaskEnum::PENDING->value,
        );
    }
}
