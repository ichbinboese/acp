<?php

namespace App\Form;

use App\Entity\Anfrage;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AnfrageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titel', ChoiceType::class,
                [
                    'choices' => [
                        'Anrede auswählen' => false,
                        '--------------------'  => false,
                        'Herr' => 'Herr',
                        'Frau' => 'Frau',
                        'Divers' => 'Divers',
                    ],
                    'attr'  => [
                        'class' => 'form-control'
                    ],
                    'label' => 'Anrede'
                ])
            ->add('vorname', TextType::class,
                [
                    'label' => 'Vorname',
                    'attr'  => [
                        'class' => 'form-control'
                    ],
                ])
            ->add('nachname', TextType::class,
                [
                    'label' => 'Nachname',
                    'attr'  => [
                        'class' => 'form-control'
                    ],
                ])
            ->add('strasse',TextType::class,
                [
                    'label' => 'Straße',
                    'attr'  => [
                        'class' => 'form-control'
                    ],
                ])
            ->add('plz', NumberType::class,
                [
                    'label' => 'Postleitzahl',
                    'attr'  => [
                        'class' => 'form-control'
                    ],
                ])
            ->add('ort',TextType::class,
                [
                    'label' => 'Ort',
                    'attr'  => [
                        'class' => 'form-control'
                    ],
                ])
            ->add('telnr',TextType::class,
                [
                    'label' => 'Telefon-Nr.',
                    'attr'  => [
                        'class' => 'form-control'
                    ],
                ])
            ->add('email', EmailType::class,
                [
                    'label' => 'E-Mail-Adresse',
                    'attr'  => [
                        'class' => 'form-control'
                    ],
                ])
            ->add('anfahrt', DateType::class,
                [
                    'label' => 'Datum Anreise',
                    'attr'  => [
                        'class' => 'form-control'
                    ],
                    'widget' => 'single_text',
                    'data' => new \DateTime("now + 1days")
                ])
            ->add('abfahrt',DateType::class,
                [
                    'label' => 'Datum Abreise',
                    'attr'  => [
                        'class' => 'form-control'
                    ],
                    'widget' => 'single_text',
                    'data' => new \DateTime("now + 2days")
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Anfrage::class,
        ]);
    }
}
