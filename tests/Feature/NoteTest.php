<?php

namespace Tests\Feature;

use App\Models\Note;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class NoteTest extends TestCase
{
    use DatabaseTransactions;
    use WithoutMiddleware;

    private const ENDPOINT = '/api/notes';

    private const JSON_STRUCTURE = ['id', 'user_id', 'title', 'note', 'updated_at', 'created_at'];

    public function test_get_notes()
    {
        Auth::setUser($this->makeUser());

        $response = $this->get(self::ENDPOINT);
        $response->assertStatus(200);

        $response->assertJsonStructure([
            '*' => self::JSON_STRUCTURE
        ]);
    }

    public function test_get_note_by_id()
    {
        Auth::setUser($this->makeUser());
        $note = Note::first();

        $response = $this->get(self::ENDPOINT.'/'.$note->id);
        $response->assertStatus(200);

        $response->assertJsonStructure(self::JSON_STRUCTURE);
    }

    public function test_create_note()
    {
        Auth::setUser($this->makeUser());
        $note = Note::factory()->make();

        $response = $this->postJson(self::ENDPOINT, $note->getAttributes());

        $response->assertStatus(201);
        $this->assertDatabaseHas($note->getTable(), $note->getAttributes());
    }

    public function test_update_note()
    {

        Auth::setUser($this->makeUser());
        $note = Note::factory()->make();

        $newNote  = Note::factory()->make();
        $response = $this->putJSON(self::ENDPOINT.'/'.$note->id, $newNote->getAttributes());

        $response->assertStatus(200);
        $this->assertDatabaseHas($note->getTable(), $newNote->getAttributes());
    }

    public function test_delete_note()
    {
        Auth::setUser($this->makeUser());
        $note = Note::first();

        $response = $this->delete(self::ENDPOINT.'/'.$note->id);

        $response->assertStatus(200);
    }
}
