<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email')
            ->add('agreeTerms', CheckboxType::class, [
                'mapped' => false,
                'constraints' => [
                    new IsTrue([
                        'message' => 'You should agree to our terms.',
                    ]),
                ],
            ])
            ->add('plainPassword', RepeatedType::class, [ // oblige l’utilisateur à taper le mot de passe deux fois (pour éviter les erreurs de saisie).

                'type' => PasswordType::class,
                'invalid_message' => 'ressaye a nouveaux ça ne correspond pas.', // message affiché si les deux champs ne correspondent pas.
                'mapped' => false,
                'attr' => ['autocomplete' => 'new-password'], // dit au navigateur qu’il s’agit d’un nouveau mot de passe (meilleure gestion de la sécurité).
                'required' => true,
                'first_options' => ['label' => 'mot de passe'],
                'second_options' => ['label' => 'confirmer mot de passe'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a password', // le mot de passe est obligatoire.
                    ]),
                    new Length([
                        'min' => 6, // minimum de 6 caractères, maximum de 4096 (limite de sécurité de Symfony).
                        'minMessage' => 'Your password should be at least {{ limit }} characters',
                        'max' => 4096,
                    ]),
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
