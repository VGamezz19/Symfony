<?php

namespace AppBundle\Form;

use AppBundle\Entity\gfd;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class gfdType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('usrger', TextType::class, ['error_bubbling' => true])
            ->add('prigrid', IntegerType::class, ['error_bubbling' => true]);




    }

public function configureOptions(OptionsResolver $resolver)
{
    $resolver->setDefaults([
        'data_class' => 'AppBundle\Entity\gfd'
    ]);
}

    public function getName()
    {
        return 'app_bundlegfd_type';
    }
}
