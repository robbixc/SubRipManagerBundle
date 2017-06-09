<?php

namespace Robbixc\SubRipManagerBundle\Validator\Constraints;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Validator\Constraints\FileValidator;
use Robbixc\SubRipManagerBundle\Manager\SrtManager;

class SrtFileValidator extends FileValidator
{
    protected $srtManager;

    public function __construct(SrtManager $srtManager)
    {
        $this->srtManager = $srtManager;

    }
    public function validate($value, Constraint $constraint)
    {
      parent::validate($value, new File);

      if($value instanceof UploadedFile)
      {
        try
        {
           $this->srtManager->load($value->getPathname());
        }
        catch(\Exception $e)
        {
           $this->context->addViolation($constraint->notValidMessage);
        }
      }
    }
}
