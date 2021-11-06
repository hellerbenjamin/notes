<?php

namespace App\Repositories\Note;

use App\Models\Note;
use App\Repositories\ModelRepository;

class NoteRepository extends ModelRepository implements NoteRepositoryInterface
{

    public function __construct()
    {
        parent::__construct(new Note());
    }
}
