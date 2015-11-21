<?php

namespace App\Entity;

use Date;
use League\CommonMark\Converter;
use League\CommonMark\DocParser;
use League\CommonMark\Environment;
use League\CommonMark\HtmlRenderer;
use Illuminate\Support\Collection;
use Illuminate\Contracts\Filesystem\Filesystem;
use Webuni\CommonMark\TableExtension\TableExtension;

class Annotation extends Collection
{
    /**
     * Istanza CommonMark.
     *
     * @var \League\CommonMark\CommonMarkConverter
     */
    protected $commonmark;

    /**
     * Istanza Filesystem.
     *
     * @var \Illuminate\Contracts\Filesystem\Filesystem
     */
    protected $filesystem;

    public function __construct(Filesystem $filesystem, $path)
    {
        parent::__construct(compact('path'));

        $this->filesystem = $filesystem;
        $this->commonmark = $this->getCommonMark();

        $this->items = $this->items + [
            'name'    => $this->getName(),
            'date'    => $this->getDate(),
            'html'    => $this->getHtml(),
            'content' => $this->getContent(),
            'commit'  => $this->getCommitInfo(),
        ];
    }

    /**
     * Ottieni le informazioni relative all'ultimo commit.
     *
     * @return string|bool
     */
    public function getCommitInfo()
    {
        $prefix = $this->filesystem->getAdapter()->getPathPrefix();
        $command = 'cd '.$prefix.' && git log -n 1 --pretty=format:\'{"hash": "%H", "author": "%an", "date": "%ai", "message": "%f"}\' '.$this->path;
        $rawOutput = exec($command);
        $commitInfo = json_decode($rawOutput);

        if (json_last_error() == JSON_ERROR_NONE) {
            $commitInfo->date = Date::parse($commitInfo->date);
            $commitInfo->url = config('lmv.annotations.commit')."/{$commitInfo->hash}";

            return $commitInfo;
        }

        return false;
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
     * Ottieni istanza CommonMark.
     *
     * @return \League\CommonMark\Converter
     */
    public function getCommonMark()
    {
        $environment = Environment::createCommonMarkEnvironment();
        $environment->addExtension(new TableExtension());

        return new Converter(new DocParser($environment), new HtmlRenderer($environment));
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
