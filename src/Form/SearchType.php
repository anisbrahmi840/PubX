<?php

namespace App\Form;

use App\Entity\Gouvernorat;
use App\Entity\Region;
use App\Entity\Search;
use App\Entity\Type;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('gouvernorat', EntityType::class, [
                'class' => Gouvernorat::class,
                'choice_label' => 'title',
            ])
            ->add('region', EntityType::class, [
                'class' => Region::class,
                'choice_label' => 'title'
            ])
            ->add('type', EntityType::class, [
                'class' => Type::class,
                'choice_label' => 'title',
                'expanded' => true,
            ])
        ;
    }



    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Search::class,
        ]);
    }

    public function getBlockPrefix()
    {
        return '';
    }
}
