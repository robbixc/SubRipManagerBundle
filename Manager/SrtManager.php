<?php

namespace Robbixc\SubRipManagerBundle\Manager;

use Captioning\Format\SubripFile;

class SrtManager
{
    /**
     * Load an instance of the srt file parser
     * @param string $filename location of the file you want to read
     * @param string $encoding custom encoding definition
     * @return SubripFile
     */
    public function load($filename, $encoding = null)
    {
        return new SubripFile($filename, $encoding, false, false);
    }
}
