<?php

namespace App\Repository;

use Date;
use App\Entity\Annotation;
use League\CommonMark\CommonMarkConverter;
use Illuminate\Contracts\Filesystem\Filesystem;

class AnnotationRepository {

    protected $folder;
    protected $markdown;
    protected $filesystem;

    public function __construct(CommonMarkConverter $markdown, Filesystem $filesystem)
    {
        $this->folder = basename(config('lmv.annotations.path'));
        $this->markdown = $markdown;
        $this->filesystem = $filesystem;
    }

    public function readme()
    {
        if ( ! $this->filesystem->exists("{$this->folder}/readme.md")) {
            return false;
        }

        return $this->find('readme');
    }

    public function all()
    {
        $files = [];

        foreach ($this->filesystem->files($this->folder) as $path) {
            $name = substr(strtolower(basename($path)), 0, -3);

            if (ends_with($path, '.md') and $name !== 'readme') {
                $files[$name] = $this->find($name);
            }
        }

        return $files;
    }

    public function find($name) {
        // Verifica formato data
        $date = (date_parse($name)['error_count'] === 0) ? Date::createFromFormat('Y-m-d', $name) : false;

        // Conversione MARKDOWN => HTML
        $markdown = $this->filesystem->read("{$this->folder}/{$name}.md");
        $html = $this->markdown->convertToHtml($markdown);

        return new Annotation(compact('name', 'date', 'html', 'markdown'));
    }

}
