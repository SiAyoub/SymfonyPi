<?php

namespace App\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

class UniqueArticleName extends Constraint
{
public string $message='Ce nom d\'article est déjà utilisé.';
}