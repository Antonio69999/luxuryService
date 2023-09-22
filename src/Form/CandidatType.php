<?php

namespace App\Form;

use App\Entity\Candidat;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CandidatType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('gender', ChoiceType::class, [
                'choices' => [
                    'Male' => 'male',
                    'Female' => 'female',
                    'Non-binary' => 'non-binary',
                    'Transgender' => 'transgender',
                    'Genderqueer' => 'genderqueer',
                    'Genderfluid' => 'genderfluid',
                    'Agender' => 'agender',
                    'Bigender' => 'bigender',
                    'Two-spirit' => 'two-spirit',
                    'Androgyne' => 'androgyne',
                    'Pangender' => 'pangender',
                    'Demigender' => 'demigender',
                    'Intersex' => 'intersex',
                    'Cisgender' => 'cisgender',
                ],
            ])
            ->add('firstname')
            ->add('lastname')
            ->add('adress')
            ->add('country')
            ->add('nationality')
            ->add('passport_file')
            ->add('cv')
            ->add('profil_picture')
            ->add('current_location')
            ->add('date_of_birth')
            ->add('place_of_birth')
            ->add('availability')
            ->add('job_category')
            ->add('experience')
            ->add('description')
            ->add('note')
            ->add('created_at')
            ->add('updated_at')
            ->add('deleted_at')
            ->add('files,')
            ->add('role')
            ->add('id_user');
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Candidat::class,
        ]);
    }
}
