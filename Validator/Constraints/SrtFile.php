<?php

namespace Robbixc\SubRipManagerBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraints\File;

/**
 * @Annotation
 */
class SrtFile extends File
{
    
    public $notValidMessage = 'This is not a valid SRT file';
    
    public function validatedBy()
    {
        return "srtfile_validator";
    }
}

