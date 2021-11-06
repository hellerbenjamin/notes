<?php

namespace App\Services;

use App\Models\Note;
use App\Repositories\Note\NoteRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class NoteService
{
    public function __construct(private NoteRepositoryInterface $noteRepository)
    {
    }

    public function getNote(int $id): ?Model
    {
        if ($note = $this->noteRepository->find($id)) {
            return $note;
        }

        throw new NotFoundHttpException('Note not found');
    }

    public function getUserNotes(int $userId): Collection
    {
        return $this->noteRepository->findBy('user_id', '=', $userId);
    }

    public function createNote(array $data): Model
    {
        return $this->noteRepository->create($data);
    }

    public function updateNote(int $id, array $data): Model
    {
        if ( ! $this->noteRepository->find($id)) {
            throw new NotFoundHttpException('Note not found');
        }

        return $this->noteRepository->update($id, $data);
    }

    public function deleteNote(int $id): bool
    {
        if ( ! $this->noteRepository->find($id)) {
            throw new NotFoundHttpException('Note not found');
        }

        return $this->noteRepository->delete($id);
    }
}
