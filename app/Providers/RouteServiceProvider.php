<?php

namespace App\Providers;

use Illuminate\Routing\Router;
use App\Repository\AnnotationRepository;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to the controller routes in your routes file.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function boot(Router $router)
    {
        // Elenco Meetup + Annotations
        $annotationRepo = app(AnnotationRepository::class);

        $this->meetupList = $annotationRepo->getMeetup()->each(function ($meetup) use ($annotationRepo) {
            return $meetup->put('annotations', $annotationRepo->get($meetup->path));
        });

        // Il Meetup più recente all'inizio
        $this->meetupList = $this->meetupList->sortByDesc(function ($meetup) {
            return $meetup->date;
        });

        view()->share('meetupList', $this->meetupList);

        parent::boot($router);
    }

    /**
     * Define the routes for the application.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function map(Router $router)
    {
        $router->group(['namespace' => $this->namespace], function ($router) {
            require app_path('Http/routes.php');
        });
    }
}
