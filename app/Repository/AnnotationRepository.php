<?php

namespace App\Repository;

use App\Entity\Meetup;
use App\Entity\Annotation;
use Illuminate\Contracts\Filesystem\FileSystem;

class AnnotationRepository
{
    /**
     * Percorso del repository Annotations.
     *
     * @var string
     */
    protected $path;

    /**
     * Istanza FileSystem.
     *
     * @var \Illuminate\Contracts\Filesystem\FileSystem
     */
    protected $filesystem;

    public function __construct(FileSystem $filesystem)
    {
        $this->path = config('lmv.annotations.path');
        $this->filesystem = $filesystem;

        // Imposto come root la directory con il clone del repository
        $this->filesystem->getAdapter()->setPathPrefix($this->path);
    }

    /**
     * Trova un appunto.
     *
     * @param  string $path
     * @return \App\Entity\Annotation
     */
    public function find($path)
    {
        $path .= ends_with($path, '.md') ? '' : '.md';

        return new Annotation($this->filesystem, $path);
    }

    /**
     * Trova un appunto attraverso il Meetup ed il nome file.
     *
     * @param  \App\Entity\Meetup $meetup
     * @param  string $name
     * @return \App\Entity\Annotation
     */
    public function findByMeetup(Meetup $meetup, $name)
    {
        return $this->find("{$meetup->path}/{$name}");
    }

    /**
     * Ottieni l'elenco degli appunti.
     *
     * @param  string $path Percorso Meetup
     * @return \Illuminate\Support\Collection
     */
    public function get($path)
    {
        $items = [];
        $files = $this->filesystem->files($path);

        foreach ($files as $file) {
            $items[] = $this->find($file);
        }

        $items = array_sort($items, function($item) {
            return ($item->name === 'readme') ? -1 : $item->name;
        });

        return collect(array_values($items));
    }

    /**
     * Trova un Meetup.
     *
     * @param  string $path
     * @return \App\Entity\Meetup
     */
    public function findMeetup($path)
    {
        return new Meetup($this->filesystem, $path);
    }

    /**
     * Ottieni l'elenco dei Meetup.
     *
     * @return \Illuminate\Support\Collection
     */
    public function getMeetup()
    {
        $items = [];
        $exclude = ['.git'];
        $folders = collect($this->filesystem->directories())->diff($exclude);

        foreach ($folders as $folder) {
            $items[] = $this->findMeetup($folder);
        }

        return collect($items);
    }

    /**
     * Ottieni il percorso del repository Annotations.
     *
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Ottieni istanza FileSystem.
     *
     * @var \Illuminate\Contracts\Filesystem\FileSystem
     */
    public function getFilesystem()
    {
        return $this->filesystem;
    }
}
