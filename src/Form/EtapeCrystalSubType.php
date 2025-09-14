<?php declare(strict_types=1);

namespace App\Form;

use App\Entity\EtapeCrystal;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EtapeCrystalSubType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('crystal')
            ->add('minimum')
            ->add('maximum')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => EtapeCrystal::class,
        ]);
    }
}
