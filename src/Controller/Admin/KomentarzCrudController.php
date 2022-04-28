<?php

namespace App\Controller\Admin;

use App\Entity\Komentarz;
use App\Entity\Gra;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class KomentarzCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Komentarz::class;
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
