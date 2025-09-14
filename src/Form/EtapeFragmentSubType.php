<?php declare(strict_types=1);

namespace App\Form;

use App\Entity\EtapeFragment;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EtapeFragmentSubType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('maiden')
            ->add('minimum')
            ->add('maximum')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => EtapeFragment::class,
        ]);
    }
}
