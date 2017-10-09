<?php

namespace Typidesign\MediaValidator\Rules;

use FFMpeg\FFProbe;
use Illuminate\Contracts\Validation\Rule;
use Throwable;

abstract class IsMedia implements Rule
{
    protected $codecs;
    protected $attribute;
    protected $type;
    protected $ffprobe;

    public function __construct(array $codecs)
    {
        $this->codecs = $codecs;
        $this->ffprobe = FFProbe::create([
            'ffprobe.binaries' => [
                'ffprobe',
                '/usr/bin/ffprobe',
                '/usr/local/bin/ffprobe',
                'avprobe',
                '/usr/bin/avprobe',
                '/usr/local/bin/avprobe',
                config('media-validator.ffprobe-binary'),
            ],
        ]);
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $file
     *
     * @return bool
     */
    public function passes($attribute, $file)
    {
        $this->attribute = $attribute;
        $method = $this->type;
        try {
            $stream = $this->ffprobe
                ->streams($file)
                ->$method()
                ->first();
        } catch (Throwable $e) {
            return false;
        }
        if ($stream === null) {
            return false;
        }

        return in_array($stream->get('codec_name'), $this->codecs);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return trans('validation.mimes', [
            'attribute' => $this->attribute,
            'values' => implode(', ', $this->codecs),
        ]);
    }
}
