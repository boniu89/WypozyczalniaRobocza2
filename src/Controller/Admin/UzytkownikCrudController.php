<?php

namespace App\Controller\Admin;

use App\Entity\Uzytkownik;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TelephoneField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UzytkownikCrudController extends AbstractCrudController
{

/**
     * @var UserPasswordEncoderInterface
     */
    private $passwordEncoder;

    /**
     * UserCrudController constructor.
     * @param UserPasswordEncoderInterface $passwordEncoder
     */

    public function __construct(
        UserPasswordEncoderInterface $passwordEncoder
    ) {
        $this->passwordEncoder = $passwordEncoder;
    }

    public static function getEntityFqcn(): string
    {
        return Uzytkownik::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        $password = TextField::new('clearpassword')
        ->setLabel("Nowe hasło")
        ->setFormType(PasswordType::class)
        ->setFormTypeOption('empty_data', '')
        ->setRequired(false)
        ->setHelp('If the right is not given, leave the field blank.')
        ->hideOnIndex();

        return [
           // IdField::new('id'),
            //AssociationField::new('id_rola'),
            ChoiceField::new('roles', 'Rola')->allowMultipleChoices()->setChoices(['User' => 'ROLE_USER', 'Admin' => 'ROLE_ADMIN']),
            TextField::new('imie'),
            TextField::new('nazwisko'),
            TextField::new('nick', 'Login'),
            $password,//TextField::new('password', 'Hasło')->OnlyOnForms(),
            TextField::new('ulica'),
            TextField::new('nr_domu'),
            IntegerField::new('nr_lokalu'),
            EmailField::new('email', 'Adres e-mail'),
            IntegerField::new('nr_tel_kom', 'Numer telefonu'),
            BooleanField::new('powiadomienie_o_nowosciach', 'Zgoda na newsletter'),
            BooleanField::new('status'),
            BooleanField::new('is_verified', 'Zweryfikowany')
            //$2y$13$z1uy6ByeUkCJ3LHhraAQ1eNlEKb0PY2N.GYMvLkX/eR9AKI/ap.b.
            //$2y$13$z1uy6ByeUkCJ3LHhraAQ1eNlEKb0PY2N.GYMvLkX/e
        ];
    }

    public function updateEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        // set new password with encoder interface
       // dd($entityInstance);
        if (method_exists($entityInstance, 'setPassword') && !$this->get('request_stack')->getCurrentRequest()->isXmlHttpRequest()) {

            $clearPassword = trim($this->get('request_stack')->getCurrentRequest()->request->all()['Uzytkownik']['clearpassword']);

            ///MyLog::info("clearPass:" . $clearPassword);

            // save password only if is set a new clearpass
            if ( !empty($clearPassword) ) {
                ////MyLog::info("clearPass not empty! encoding password...");
                $encodedPassword = $this->passwordEncoder->encodePassword($this->getUser(), $clearPassword);
                $entityInstance->setPassword($encodedPassword);
            }
        }

        parent::updateEntity($entityManager, $entityInstance);
    }

    public function persistEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {//dd('dupa');
        if (method_exists($entityInstance, 'setPassword')) {

            $clearPassword = trim($this->get('request_stack')->getCurrentRequest()->request->all()['Uzytkownik']['clearpassword']);

            ///MyLog::info("clearPass:" . $clearPassword);

            // save password only if is set a new clearpass
            if ( !empty($clearPassword) ) {
                ////MyLog::info("clearPass not empty! encoding password...");
                $encodedPassword = $this->passwordEncoder->encodePassword($this->getUser(), $clearPassword);
                $entityInstance->setPassword($encodedPassword);
            }
        }

        parent::persistEntity($entityManager, $entityInstance);

    }

    // public function createEntity(string $entityInstance): void
    // {
    //     // set new password with encoder interface
    //    // dd($entityInstance);
    //     if (method_exists($entityInstance, 'setPassword')) {

    //         $clearPassword = trim($this->get('request_stack')->getCurrentRequest()->request->all()['Uzytkownik']['clearpassword']);
    // //dd($this->get('request_stack')->getCurrentRequest()->request->all());
    //         ///MyLog::info("clearPass:" . $clearPassword);

    //         // save password only if is set a new clearpass
    //         if ( !empty($clearPassword) ) {
    //             ////MyLog::info("clearPass not empty! encoding password...");
    //            // dd($clearPassword);
    //             $encodedPassword = $this->passwordEncoder->encodePassword($this->getUser(), $clearPassword);
    //           //  dd($encodedPassword);
    //             $entityInstance->setPassword($encodedPassword);
    //         }
    //     }

    //     parent::createEntity($entityInstance);
    // }

}
