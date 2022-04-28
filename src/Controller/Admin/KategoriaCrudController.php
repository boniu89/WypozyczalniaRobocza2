<?php

namespace App\Controller\Admin;

use App\Entity\Kategoria;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;

class KategoriaCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Kategoria::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            //IdField::new('id'),
            TextField::new('nazwa'),
            BooleanField::new('status')
            //ChoiceField::new('status')->setChoices(['Dostępny' => 'D', 'Niedostępny' => 'N'])->renderExpanded()
            //TextField::new('status'),
        ];
    }
    
}
