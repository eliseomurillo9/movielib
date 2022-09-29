<?php

namespace App\Form;

use App\Entity\Film;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FilmType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', null, [
                'label' => 'Nom de film',
            ])
            ->add('release_at', null, [
                'widget' => 'single_text',
                'label' => 'Date de premiere'
            ])
            ->add('poster', null)
            ->add('duration', null, [
                'hours' => range(0, 5),
                'minutes' => range(0, 59)
            ]);
            // ->add('genre_id');
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Film::class,
        ]);
    }
}
