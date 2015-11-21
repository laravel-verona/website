<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Console\Kernel;
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

    /**
     * Sync Annotations attraverso i WebHooks di Github.
     *
     * @return \Illuminate\Http\Response
     */
    public function sync(Request $request, Kernel $console)
    {
        $sign = substr($request->header('X-Hub-Signature', 'sha1=null'), 5);
        $hmac = hash_hmac('sha1', $request->getContent(), env('WEBHOOK_SECRET'));

        if (hash_equals($sign, $hmac)) {
            $console->call('lmv:sync');

            return ['output' => $console->output()];
        }

        return response('Unauthorized.', 401);
    }
}
