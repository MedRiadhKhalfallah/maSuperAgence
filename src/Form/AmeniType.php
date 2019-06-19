<?php

namespace App\Form;

use App\Entity\Ameni;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AmeniType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name',null, ['label'=> 'Prenom'])
            ->add('lastName',null, ['label'=> 'Nom'])
            ->add('age',null, ['label'=> 'Age']);

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Ameni::class,
            'translation_domain' => 'forms',
        ]);
    }
}
