<?php

namespace App\Entity;

use Date;
use Illuminate\Support\Collection;
use League\CommonMark\CommonMarkConverter;
use Illuminate\Contracts\Filesystem\FileSystem;

class Annotation extends Collection
{
    /**
     * Istanza CommonMark.
     *
     * @var \League\CommonMark\CommonMarkConverter
     */
    protected $commonmark;

    /**
     * Istanza FileSystem.
     *
     * @var \Illuminate\Contracts\Filesystem\FileSystem
     */
    protected $filesystem;

    public function __construct(FileSystem $filesystem, $path)
    {
        parent::__construct(compact('path'));

        $this->filesystem = $filesystem;
        $this->commonmark = new CommonMarkConverter;

        $this->items = $this->items + [
            'name'    => $this->getName(),
            'date'    => $this->getDate(),
            'html'    => $this->getHtml(),
            'content' => $this->getContent(),
        ];
    }

    /**
     * Ottieni il nome del file (senza estensione).
     *
     * @return string
     */
    public function getName()
    {
        return substr(strtolower(basename($this->path)), 0, -3);
    }

    /**
     * Ottieni la data del Meetup in cui è associato l'appunto.
     *
     * @return \Jenssegers\Date\Date
     */
    public function getDate()
    {
        if (str_contains($this->path, '/')) {
            $date = explode('/', $this->path)[0];

            return Date::createFromFormat('Y-m-d', $date);
        }

        return false;
    }

    /**
     * Ottieni il contenuto del file in formato Markdown.
     *
     * @return string
     */
    public function getContent()
    {
        return $this->filesystem->read($this->path);
    }

    /**
     * Ottieni il contenuto del file in formato HTML.
     *
     * @return string
     */
    public function getHtml()
    {
        return $this->commonmark->convertToHtml($this->getContent());
    }

    /**
     * Recupera dinamicamente gli attributi non esistenti.
     *
     * @param  string  $key
     * @return mixed
     */
    public function __get($key)
    {
        return $this->get($key);
    }
}
