<?php

namespace App\Repository;

use App\Entity\Meetup;
use App\Entity\Annotation;
use App\Exceptions\MeetupNotFoundException;
use App\Exceptions\AnnotationNotFoundException;
use Illuminate\Contracts\Filesystem\Filesystem;

class AnnotationRepository
{
    /**
     * Istanza Filesystem.
     *
     * @var \Illuminate\Contracts\Filesystem\Filesystem
     */
    protected $filesystem;

    public function __construct(Filesystem $filesystem)
    {
        $this->filesystem = $filesystem;

        // Imposto come root la directory con il clone del repository
        $this->setPath(config('lmv.annotations.path'));
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

        if (! $this->filesystem->exists($path)) {
            throw new AnnotationNotFoundException;
        }

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
        $files = array_where($this->filesystem->listContents($path), function($index, $item) {
            return ($item['type'] === 'file' and $item['extension'] === 'md');
        });

        foreach ($files as $file) {
            $items[] = $this->find($file['path']);
        }

        $items = array_sort($items, function ($item) {
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
        if (! $this->filesystem->exists($path)) {
            throw new MeetupNotFoundException;
        }

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
        $folders = collect($this->filesystem->directories())->diff($exclude)->sortByDesc(function ($name) {
            return $name;
        });

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
        $path = $this->filesystem->getAdapter()->getPathPrefix();

        return rtrim($path, '/');
    }

    /**
     * Imposta il percorso del repository Annotations.
     *
     * @return string
     */
    public function setPath($path)
    {
        $this->filesystem->getAdapter()->setPathPrefix($path);

        return $this;
    }

    /**
     * Ottieni istanza Filesystem.
     *
     * @var \Illuminate\Contracts\Filesystem\Filesystem
     */
    public function getFilesystem()
    {
        return $this->filesystem;
    }
}
