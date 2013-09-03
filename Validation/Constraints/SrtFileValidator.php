<?php

namespace Itasa\PannelloBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Validator\Constraints\FileValidator;

class SrtFileValidator extends FileValidator
{
    /* @var \SrtParser\srtManager */
    protected $srtManager;
    
    public function __construct(\SrtParser\srtManager $srtManager)
    {
        $this->srtManager = $srtManager;
        
    }
    public function validate($value, Constraint $constraint)
    {
      parent::validate($value, new \Symfony\Component\Validator\Constraints\File);
      
      if($value instanceof \Symfony\Component\HttpFoundation\File\UploadedFile)
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
      return;
    }
}