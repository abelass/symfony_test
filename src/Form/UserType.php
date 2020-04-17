<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;


class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        
        $builder
            ->add('email')
            //->add('roles')
            ->add('password')
            ->add('telephone', TextType::class, [
                'label' => 'label.telephone',
            ])
            ->add('addresse')
            ->add('comment')
            ->add('name')
            ->add('slug')
            ->add('createdAt', DateType::class, [
                'label' => 'label.created.at'
            ])
            ->add('modifiedAt')
            ->add('publishedAt')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'translation_domain' => 'form',
            'data_class' => User::class,
        ]);
    }
}
