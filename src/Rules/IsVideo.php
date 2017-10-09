<?php

namespace Typidesign\MediaValidator\Rules;

class IsVideo extends isMedia
{
    public function __construct(array $codecs)
    {
        $this->type = 'videos';
        parent::__construct($codecs);
    }
}
