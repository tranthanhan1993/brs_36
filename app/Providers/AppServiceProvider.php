<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App;
use App\Repositories\Interfaces\FollowInterface;
use App\Repositories\Interfaces\FavoriteInterface;
use App\Repositories\Interfaces\UserInterface;
use App\Repositories\Interfaces\TimelineInterface;
use App\Repositories\Eloquents\FollowRepository;
use App\Repositories\Eloquents\FavoriteRepository;
use App\Repositories\Eloquents\TimelineRepository;
use App\Repositories\UserAdmin\UserRepository;
use App\Repositories\Eloquents\RateRepository;
use App\Repositories\Eloquents\CommentRepository;
use App\Repositories\Eloquents\ReviewRepository;
use App\Repositories\Interfaces\RateInterface;
use App\Repositories\Interfaces\ReviewInterface;
use App\Repositories\Interfaces\CommentInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        App::bind(FollowInterface::class, FollowRepository::class);
        App::bind(FavoriteInterface::class, FavoriteRepository::class);
        App::bind(UserInterface::class, UserRepository::class);
        App::bind(TimelineInterface::class, TimelineRepository::class);
        App::bind(RateInterface::class, RateRepository::class);
        App::bind(ReviewInterface::class, ReviewRepository::class);
        App::bind(CommentInterface::class, CommentRepository::class);
    }
}
