<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;

class LanguageSwitchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('locale', ChoiceType::class, [
                'choices' => [
                    'English' => 'en',
                    'Español' => 'es',
                ],
            ]);
    }
}
