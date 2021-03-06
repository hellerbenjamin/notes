<?php

namespace App\Services;

use App\Models\Note;
use App\Repositories\Note\NoteRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 *
 */
class NoteService
{
    /**
     * @param  NoteRepositoryInterface  $noteRepository
     */
    public function __construct(private NoteRepositoryInterface $noteRepository)
    {
    }

    /**
     * @param  int  $id
     *
     * @return Model|null
     */
    public function getNote(int $id): ?Model
    {
        if ($note = $this->noteRepository->find($id)) {
            return $note;
        }

        throw new NotFoundHttpException('Note not found');
    }

    /**
     * @param  int  $userId
     *
     * @return Collection
     */
    public function getUserNotes(int $userId): Collection
    {
        return $this->noteRepository->findBy('user_id', '=', $userId);
    }

    /**
     * @param  array  $data
     *
     * @return Model
     */
    public function createNote(array $data): Model
    {
        return $this->noteRepository->create($data);
    }

    /**
     * @param  int  $id
     * @param  array  $data
     *
     * @return Model
     */
    public function updateNote(int $id, array $data): Model
    {
        if ( ! $this->noteRepository->find($id)) {
            throw new NotFoundHttpException('Note not found');
        }

        return $this->noteRepository->update($id, $data);
    }

    /**
     * @param  int  $id
     *
     * @return bool
     */
    public function deleteNote(int $id): bool
    {
        if ( ! $this->noteRepository->find($id)) {
            throw new NotFoundHttpException('Note not found');
        }

        return $this->noteRepository->delete($id);
    }

    /**
     * @param  int  $id
     * @param  int  $userId
     *
     * @return bool
     */
    public function isUserOwner(int $id, int $userId): bool
    {
        if ($note = $this->noteRepository->find($id)) {
            return $note->user_id === $userId;
        }

        throw new NotFoundHttpException();
    }
}
