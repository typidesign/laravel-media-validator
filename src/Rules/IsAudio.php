<?php

namespace Typidesign\MediaValidator\Rules;

class IsAudio extends isMedia
{
    public function __construct(array $codecs)
    {
        $this->type = 'audios';
        parent::__construct($codecs);
    }
}
