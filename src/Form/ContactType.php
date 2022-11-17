<?php

namespace App\Form;

use App\DTO\ContactDTO;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Votre nom / prénom',
                'required' => false,
                'attr' => [
                    'placeholder' => 'Saisir votre nom / prénom',
                    'class' => 'papa'
                ]
            ])
            ->add('email', EmailType::class, [
                'label' => 'Votre email'
            ])
            ->add('subject', ChoiceType::class, [
                'label' => 'Choisir un sujet',
                'choices' => [
                    'Choisir' => null,
                    'Papa' => 'papa',
                    'Maman' => 'maman'
                ]
            ])
            ->add('message', TextareaType::class, [
                'label' => 'Votre message'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ContactDTO::class
        ]);
    }
}
