<?php

namespace App\Http\Controllers\Notes;

use App\Http\Controllers\Controller;
use App\Http\Requests\NoteRequest;
use App\Services\NoteService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

/**
 *
 */
class NotesController extends Controller
{
    /**
     * @param  NoteService  $noteService
     */
    public function __construct(private NoteService $noteService)
    {
    }

    /**
     * @return Collection
     */
    public function index(): Collection
    {
        return $this->noteService->getUserNotes(Auth::user()->getAuthIdentifier());
    }

    /**
     * @param  int  $id
     *
     * @return Model|null
     */
    public function show(int $id): ?Model
    {
        return $this->noteService->getNote($id);
    }

    /**
     * @param  Request  $request
     *
     * @return JsonResponse
     */
    public function store(NoteRequest $request): JsonResponse
    {
        $this->noteService->createNote(array_merge(
                $request->all(),
                ['user_id' => Auth::user()->getAuthIdentifier()]
            )
        );

        return response()->json(['message' => 'Note created'], 201);
    }

    /**
     * @param  int  $id
     * @param  Request  $request
     *
     * @return JsonResponse
     */
    public function update(int $id, NoteRequest $request): JsonResponse
    {
        $this->noteService->updateNote($id, $request->all());

        return response()->json(['message' => 'Note updated'],);
    }

    /**
     * @param  int  $id
     *
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        $this->noteService->deleteNote($id);

        return response()->json(['message' => 'Note delete'],);
    }
}
