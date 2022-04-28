<?php

namespace App\Controller\Admin;

use App\Entity\Rezerwacja;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;

class RezerwacjaCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Rezerwacja::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
           // IdField::new('id'),
           AssociationField::new('Id_Egzemplarz', 'Egzemplarz')->autocomplete(),
           AssociationField::new('Id_User','Użytkownik')->autocomplete(),
           DateField::new('data_rezerwacji_start','Data rozpoczęcia rezerwacji'),
           DateField::new('data_rezerwacji_stop', 'Data zakończenia rezerwacji'),
            ChoiceField::new('status')->setChoices(['Nowa' => 'N', 'Anulowana' => 'A', 'Zakończona' => 'Z'])->renderExpanded()
        ];
    }
    
}
