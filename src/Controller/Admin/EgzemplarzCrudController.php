<?php

namespace App\Controller\Admin;

use App\Entity\Egzemplarz;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;

class EgzemplarzCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Egzemplarz::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
           // IdField::new('id'),
            IntegerField::new('Identyfikator'),
            AssociationField::new('id_gra','Gra'),
            BooleanField::new('Status')
        ];
    }
    
}
