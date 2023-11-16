<?php

namespace App\Validator\Constraints;


use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Validator\Constraint;
use App\Validator\Constraints;
use Symfony\Component\Validator\ConstraintValidator;
use App\Entity\Article;

class UniqueArticleNameValidator extends ConstraintValidator
{
    private $entityManager;
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager=$entityManager;
    }

    public function validate($value, Constraint $constraint)
    {
        if (!$value){
            return;
        }
        $existingArticle = $this->entityManager->getRepository(Article::class)->findOneBy(['titre_article' => $value]);
        if ($existingArticle) {
            $this->context->buildViolation($constraint->message)->addViolation();

        }

    }
}
