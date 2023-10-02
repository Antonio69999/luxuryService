<?php

namespace App\Form;

use App\Entity\Candidat;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\HtmlSanitizer\Type\TextTypeHtmlSanitizerExtension;
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
            ->add('passport_file', FileType::class,  [
                'data_class' => null,
                'mapped' => false,
                'required' => false,
                'attr' => [
                    'id' => 'passport',
                    'size' => '20000000',
                    'accpet' => '.pdf,.jpg,.doc,.docx,.png,.gif',
                    'name' => 'passport',
                    'type' => 'file',

                ]
            ])
            ->add('cv', FileType::class, [
                'data_class' => null,
                'mapped' => false,
                'required' => false,
                'attr' => [
                'id' => 'cv',
                'size' => 20000000,
                'accept' => '.pdf,.jpg,.doc,.docx,.png',
                'name' => 'cv',
                'type' => 'file',

                ]
            ])
            ->add('profil_picture', FileType::class, [
                'data_class' => null,
                'mapped' => false,
                'required' => false,
                'attr' => [
                    'id' => 'photo',
                    'size' => '20000000',
                    'accpet' => '.pdf,.jpg,.doc,.docx,.png,.gif',
                    'name' => 'photo',
                    'type' => 'file',
                ],
            ])
            ->add('current_location')
            ->add('date_of_birth')
            ->add('place_of_birth')
            ->add('availability')
            ->add('job_category', ChoiceType::class, [
                'choices' => [
                    'sectorA' => 'SectorA',
                    'sectorB' => 'SectorB',
                ],
            ])
            ->add('experience', ChoiceType::class, [
                'choices' => [
                    '3m' => '0 - 6 month',
                    '6m' => '6 months - 1 year',
                    '1y' => '1 - 2 years',
                    '2y' => '2+ years',
                    '5y' => '5+ years',
                    '10y' => '10 years',

                ],
            ])
            ->add('description', TextareaType::class, [
                'attr' => [
                'id' => 'description',
                'class' => 'materialize-textarea',
                'name' => 'description',
                'cols' => '50',
                'row' => '10'
                ],
                'label' => 'Short description for your profile, as well as more personnal informations (e.g. your hobbies/interests ). You can also paste any link you want.'
            ]);
            // ->add('note')
            // ->add('files');
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Candidat::class,
        ]);
    }
}
