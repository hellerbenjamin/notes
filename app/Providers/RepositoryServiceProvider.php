<?php

namespace App\Providers;

use App\Repositories\Note\NoteRepository;
use App\Repositories\Note\NoteRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            NoteRepositoryInterface::class,
            NoteRepository::class
        );
    }
}
