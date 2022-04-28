<?php

namespace App\Controller\Admin;

use App\Entity\Gra;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Filter\EntityFilter;

use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;

use Vich\UploaderBundle\Form\Type\VichImageType;

use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;

use App\Form\ZdjecieType;

class GraCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Gra::class;
    }

    
    public function configureFields(string $pageName): iterable
    {

        $imageFile = ImageField::new('miniaturka')->setUploadedFileNamePattern('[randomhash].[extension]')
        ->setUploadDir('public/'.$this->getParameter('uploads_path'))
        ->setRequired(false);

        $image = ImageField::new('miniaturka')->setBasePath($this->getParameter('uploads_path'));


        $fields = [
            //IdField::new('id'),
            AssociationField::new('id_Kategoria','Kategoria'),
            AssociationField::new('id_Wydawnictwo', 'Wydawnictwo'),
            //AssociationField::new('id_zdjecie','Miniaturka'),
          
            TextField::new('Nazwa'),
            TextEditorField::new('Opis'),
            IntegerField::new('Liczba_graczy_min', 'Liczba graczy od'),
            IntegerField::new('Liczba_graczy_max', 'Liczba graczy do'),
            TimeField::new('Sredni_czas_gry', 'Średni czas gry')->setFormat('HH:mm'),
            IntegerField::new('Wiek_od_lat', 'Wiek graczy od'),
            IntegerField::new('Cena', 'Cena/dzień'),
            IntegerField::new('Kaucja', 'Kaucja'),
            BooleanField::new('Status'),
            AssociationField::new('Egzemplarze','Ilość egzemplarzy')->hideOnForm(),
            CollectionField::new('Zdjecia')->setEntryType(ZdjecieType::class)
            ->setFormTypeOption('by_reference', false)
            ->onlyOnForms(),
            CollectionField::new('Zdjecia')
            ->setTemplatePath('images.html.twig')
            ->onlyOnDetail()
        ];


        if($pageName == Crud::PAGE_INDEX || $pageName == Crud::PAGE_DETAIL)
        {
            $fields[] = $image;
          //  dd($fields);
        }
        else
        {
            $fields[] = $imageFile;
        }


        return $fields;
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions->add(Crud::PAGE_INDEX, Action::DETAIL)
        ->add(Crud::PAGE_EDIT, Action::SAVE_AND_ADD_ANOTHER);
        //->setPermission(Action::NEW, 'ROLE_ADMIN')
        //->setPermission(Action::EDIT, 'ROLE_ADMIN');

    }

    // public function configureFilters(Filters $filters): Filters
    // {
    //     return $filters
    //         //->add(EntityFilter::new('KAtegor'))
    //         //->add(EntityFilter::new('Wydawnictwo'))
    //     ;
    // }

    // public function configureCrud(Crud $crud): Crud
    // {
    //     return $crud->setSearchFields(['Nazwa']);

    // }
    
}
