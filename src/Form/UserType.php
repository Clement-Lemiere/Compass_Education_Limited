<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Validator\Constraints as Assert;
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
            ->add('email', EmailType::class, [
                'row_attr' => [
                            'class' => 'formElement',
                ],      
            ])
            ->add('password', RepeatedType::class, [
                'type' => PasswordType::class,
                'options' => [],
                    'first_options'  => [
                        'label' => 'Password',
                    ],
                    'second_options' => [
                        'label' => 'Repeat your password',
                    ],
                    'invalid_message' => 'The password fields must match.',
                    'required' => true,
                    'constraints' => [
                        new Assert\NotBlank([
                            'message' => 'Please enter your password',
                        ]),
                        new Assert\Length([
                            'min' => 3,
                            'max' => 191,
                            'minMessage' => 'Your password must be at least {{ limit }} caracters long',
                        ]),
                        // new Assert\Regex([
                        //     'pattern' => '/^(?=.*[A-Z])(?=.*[a-z])(?=.*[@#%&+=_!.$-])[A-Za-z0-9@#%&+=._!$-]{8,}$/',
                        //     'message' => 'Your password must be at least 8 caracters long and must contain at least 1 uppercase, 1 lowercase, 1 number and 1 of the following caracters : @ # % & + = _ ! . $ -',
                        // ])
                    ],
                
            ]);

        $builder->addEventListener(FormEvents::PRE_SET_DATA, function (FormEvent $event) {
            $user = $event->getData();
            $form = $event->getForm();

            if ($user && in_array('ROLE_STUDENT', $user->getRoles())) {
                $form->add('student', EditStudentType::class, [
                    'label' => false,
                ]);
            }
            if ($user && in_array('ROLE_TEACHER', $user->getRoles())) {
                $form->add('teacher', EditTeacherType::class, [
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
