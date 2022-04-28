<?php

namespace App\Form;

use App\Entity\Zdjecie;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Vich\UploaderBundle\Form\Type\VichFileType;

use Symfony\Component\Form\Extension\Core\Type\TextType;

class ZdjecieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('zdjeciePlik', VichFileType::class, ['label' => false, 'download_label' => true]);
            
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Zdjecie::class,
        ]);
    }
}
