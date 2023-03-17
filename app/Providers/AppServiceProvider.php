<?php

namespace App\Providers;

use App\Core\Artists\ArtistInterface; use App\Core\Artists\ArtistRepository;
use App\Core\Artworks\ArtworkInterface; use App\Core\Artworks\ArtworkRepository;
use App\Core\ArtworkSubject\ArtworkSubjectInterface; use App\Core\ArtworkSubject\ArtworkSubjectRepository;
use App\Core\Blog\BlogInterface; use App\Core\Blog\BlogRepository;
use App\Core\Category\CategoryInterface; use App\Core\Category\CategoryRepository;
use App\Core\Cms\CmsInterface; use App\Core\Cms\CmsRepository;
use App\Core\Collection\CollectionInterface; use App\Core\Collection\CollectionRepository;
use App\Core\Material\MaterialInterface; use App\Core\Material\MaterialRepository;
use App\Core\Movements\MovementInterface; use App\Core\Movements\MovementRepository;
use App\Core\Style\StyleInterface; use App\Core\Style\StyleRepository;
use App\Core\Subscriptions\SubscriptionInterface; use App\Core\Subscriptions\SubscriptionRepository;
use Illuminate\Support\ServiceProvider;
class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(ArtistInterface::class, ArtistRepository::class);
        $this->app->bind(SubscriptionInterface::class, SubscriptionRepository::class);
        $this->app->bind(CollectionInterface::class, CollectionRepository::class);
        $this->app->bind(StyleInterface::class, StyleRepository::class);
        $this->app->bind(ArtworkSubjectInterface::class, ArtworkSubjectRepository::class);
        $this->app->bind(MaterialInterface::class, MaterialRepository::class);
        $this->app->bind(MovementInterface::class, MovementRepository::class);
        $this->app->bind(CategoryInterface::class, CategoryRepository::class);
        $this->app->bind(ArtworkInterface::class, ArtworkRepository::class);
        $this->app->bind(CmsInterface::class, CmsRepository::class);
        $this->app->bind(BlogInterface::class, BlogRepository::class);
    }
    public function boot()
    {
       
    }
}
?>
