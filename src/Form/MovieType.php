<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class MovieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('mov_title', TextType::class,[
                'attr'=>['class' => 'form-control'],
                'label' => false,
                'required'   => true])

            ->add('mov_desc', TextareaType::class,[
                'attr'=>['class' => 'form-control'],
                'label' => false,
                'required'   => true])

            ->add('mov_year',null,[  
                'attr'=>['class' => 'form-control'],
                'label' => false,
                'required'   => false])

            ->add('mov_poster',TextType::class,[
                'attr'=>['class' => 'form-control'],
                'label' => false,
                'required'   => false])
                
            ->add('save', SubmitType::class,[
                'attr' => ['class' => 'btn btn-primary']])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
