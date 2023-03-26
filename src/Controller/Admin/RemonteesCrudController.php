<?php

namespace App\Controller\Admin;

use App\Entity\Remontees;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class RemonteesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Remontees::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
