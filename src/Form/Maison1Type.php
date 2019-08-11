<?php

namespace App\Form;

use App\Entity\Gouvernorat;
use App\Entity\Maison;
use App\Entity\Region;
use App\Entity\Type;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Maison1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('prix')
            ->add('loue')
            ->add('etage')
            ->add('clima')
            ->add('imageFile', FileType::class,[
                'required' => false
            ])
            ->add('Gouvernorat', EntityType::class, [
                'class' => Gouvernorat::class,
                'choice_label' => 'title',
    ])
            ->add('region', EntityType::class, [
                'class' => Region::class,
                'choice_label' => 'title',
            ])
            ->add('type',EntityType::class, [
                'class' => Type::class,
                'choice_label' => 'title',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Maison::class,
        ]);
    }
}
