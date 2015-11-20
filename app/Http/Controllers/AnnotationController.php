<?php

namespace App\Http\Controllers;

use App\Repository\AnnotationRepository;
use App\Exceptions\MeetupNotFoundException;
use App\Exceptions\AnnotationNotFoundException;

class AnnotationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($date, AnnotationRepository $annotationRepo)
    {
        try {
            $meetup = $annotationRepo->findMeetup($date);
            $files = $annotationRepo->get($meetup->path);
        } catch (MeetupNotFoundException $e) {
            abort(404);
        } catch (AnnotationNotFoundException $e) {
            abort(404);
        }

        return view('annotations.index', compact('meetup', 'files'));
    }
}
