<?php

namespace App\Http\Controllers;

use App\Repository\AnnotationRepository;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

abstract class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $meetupList;

    public function __construct()
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
    }
}
