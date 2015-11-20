<?php

namespace App\Entity;

use Date;
use Illuminate\Support\Collection;
use Illuminate\Contracts\Filesystem\Filesystem;

class Meetup extends Collection
{
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

        $this->items = $this->items + [
            'date' => $this->getDate(),
        ];
    }

    /**
     * Ottieni la data del Meetup.
     *
     * @return \Jenssegers\Date\Date
     */
    public function getDate()
    {
        if (date_parse($this->path)['error_count'] === 0) {
            return Date::createFromFormat('Y-m-d', $this->path);
        }

        return false;
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
