<?php

namespace App\Form;

use App\Entity\Session;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SessionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('type')
        ->add('date', null, [
            'attr' => ['class' => 'multiSelectStyle'],
        ])
        ->add('time', null, [
            'attr' => ['class' => 'multiSelectStyle'],
        ])
        ->add('teacher', null, [
            'attr' => ['class' => 'selectStyle'],
        ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Session::class,
        ]);
    }
}
