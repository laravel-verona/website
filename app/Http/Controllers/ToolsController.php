<?php

namespace App\Http\Controllers;

use App\Repository\AnnotationRepository;

class ToolsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(AnnotationRepository $annotationRepo)
    {
        $file = $annotationRepo->find('tools');

        return view('tools.index', compact('file'));
    }
}
