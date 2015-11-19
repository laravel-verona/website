<?php

namespace App\Http\Controllers;

use App\Repository\AnnotationRepository;

class AnnotationController extends Controller
{
    protected $annotationRepo;

    public function __construct(AnnotationRepository $annotationRepo)
    {
        parent::__construct();

        $this->annotationRepo = $annotationRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($date)
    {
        $meetup = $this->annotationRepo->findMeetup($date);
        $files = $this->annotationRepo->get($meetup->path);

        return view('annotations.index', compact('meetup', 'files'));
    }
}
