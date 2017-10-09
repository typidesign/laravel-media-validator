<?php

namespace Typidesign\MediaValidator\Rules;

class IsAudio extends IsMedia
{
    public function __construct(array $codecs)
    {
        $this->type = 'audios';
        parent::__construct($codecs);
    }
}
