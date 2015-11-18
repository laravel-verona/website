<?php

namespace App\Entity;

use Illuminate\Support\Collection;
use League\CommonMark\CommonMarkConverter;

class Annotation extends Collection {

    /**
     * Dynamically retrieve attributes on the model.
     *
     * @param  string  $key
     * @return mixed
     */
    public function __get($key)
    {
        return $this->get($key);
    }

}
