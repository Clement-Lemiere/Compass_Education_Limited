<?php

namespace App\Form;

use App\Entity\Teacher;
use App\Form\UserType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TeacherType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstName')
            ->add('lastName')
            ->add('nationality')
            ->add('qualification')
            ->add('availability')
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
            'data_class' => Teacher::class,
        ]);
    }
}
