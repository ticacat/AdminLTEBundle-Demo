<?php

/*
 * This file is part of the AdminLTE-Bundle demo.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FormDemoModelType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $options = [
            'This is option 1' => 'opt1',
            'This is option 2' => 'opt2',
            'This is option 3' => 'opt3',
        ];

        $choices = [
            'This is choice 1' => 'choice1',
            'This is choice 2' => 'choice2',
            'This is choice 3' => 'choice3',
        ];

        $builder
            ->add('name', TextType::class, ['help' => 'some help text'])
            ->add('gender', ChoiceType::class, ['choices' => ['male' => 'm', 'female' => 'f']])
            ->add('someOption', ChoiceType::class, ['choices' => $options, 'expanded' => true])
            ->add('someChoices', ChoiceType::class, ['choices' => $choices, 'expanded' => true, 'multiple' => true])
            ->add('username')
            ->add('email')
            ->add('date', DateType::class, ['widget' => 'single_text', 'html5' => false])
            ->add('time', TimeType::class, ['widget' => 'single_text', 'html5' => false])
            ->add('termsAccepted', CheckboxType::class)
            ->add('message', TextareaType::class)
            ->add('price')
        ;
    }

    public function setDefaultOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => FormDemoModelType::class,
        ]);
    }
}
