<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormEvent;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class,  [
                'attr' => [
                    'class' => 'formElement'
                ],
            ])

            ->add('roles', ChoiceType::class, [
                'choices' => [
                    'ROLE_STUDENT' => 'student',
                    'ROLE_TEACHER' => 'teacher',
                    'ROLE_ADMIN' => 'admin',
                ],
                'attr' => [
                    'class' => 'formElement'
                ],
                'multiple' => true,
            ])

            ->add('password', RepeatedType::class, [
                'type' => PasswordType::class,
                'options' => [
                    'attr' => [
                        'class' => 'formElement',
                    ],
                ],
                'first_options'  => [
                    'label' => 'Password',
                    'block_prefix' => 'formElement',
                ],
                'second_options' => [
                    'label' => 'Repeat your password',
                    'block_prefix' => 'formElement',
                ],
            ]);

        $builder->addEventListener(FormEvents::PRE_SET_DATA, function (FormEvent $event) {
            $user = $event->getData();
            $form = $event->getForm();

            if ($user && in_array('ROLE_STUDENT', $user->getRoles())) {
                $form->add('student', StudentType::class, [
                    'label' => false,
                ]);
            }
            if ($user && in_array('ROLE_TEACHER', $user->getRoles())) {
                $form->add('teacher', TeacherType::class, [
                    'label' => false,
                ]);
            }
        });
    }




    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
