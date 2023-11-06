<?php

namespace App\Form;

use App\Entity\Student;
use App\Form\UserType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class StudentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstName')
            ->add('lastName')
            ->add('birthdate', null, [
                'attr' => [
                    'class' => 'dateChoice',
                ],
            ])
            ->add('nationality')
            ->add('level')
            ->add('language', null, [
                'attr' => [
                    'class' => 'checkboxStyle',
                ],
                'expanded' => true,
            ])
            ->add('user', UserType::class, [
                'label' => false,
            ])
        ;
    }

    
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Student::class,
        ]);
    }
}
