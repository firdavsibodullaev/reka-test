<?php

namespace App\Providers;

use App\Contracts\MediaLibraryRepositoryInterface;
use App\Contracts\TagRepositoryInterface;
use App\Contracts\TagServiceInterface;
use App\Contracts\TodoRepositoryInterface;
use App\Contracts\TodoServiceInterface;
use App\Repositories\MediaLibraryRepository;
use App\Repositories\TagRepository;
use App\Repositories\TodoRepository;
use App\Services\TagService;
use App\Services\TodoService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public array $bindings = [
        MediaLibraryRepositoryInterface::class => MediaLibraryRepository::class,
        TagRepositoryInterface::class => TagRepository::class,
        TagServiceInterface::class => TagService::class,
        TodoRepositoryInterface::class => TodoRepository::class,
        TodoServiceInterface::class => TodoService::class
    ];

    /**
     * Register any application services.
     */
    public function register(): void
    {
        foreach (glob(__DIR__ . '/../Support/*.php') as $php) {
            require_once $php;
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
