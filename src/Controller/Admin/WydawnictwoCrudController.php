<?php

namespace App\Controller\Admin;

use App\Entity\Wydawnictwo;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;

use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;

class WydawnictwoCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Wydawnictwo::class;
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

    public function configureActions(Actions $actions): Actions
    {
        return $actions->add(Crud::PAGE_INDEX, Action::DETAIL)
        ->add(Crud::PAGE_EDIT, Action::SAVE_AND_ADD_ANOTHER);
        //->setPermission(Action::NEW, 'ROLE_ADMIN')
        //->setPermission(Action::EDIT, 'ROLE_ADMIN');

    }
    
}
