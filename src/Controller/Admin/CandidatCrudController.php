<?php

namespace App\Controller\Admin;

use App\Entity\Candidat;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;

class CandidatCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Candidat::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('firstname'),
            TextField::new('lastname'),
            ChoiceField::new('gender')->setChoices([
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
            ])->hideOnIndex(),
            AssociationField::new('user')->autocomplete()->setLabel('email'),
            TextField::new('adress')->hideOnIndex(),
            TextField::new('country')->hideOnIndex(),
            TextField::new('nationality')->hideOnIndex(),
            ImageField::new('profil_picture')->setUploadDir('public/assets/uploads/')->hideOnIndex(),
            TextField::new('current_location')->hideOnIndex(),
            DateTimeField::new('date_of_birth')->hideOnIndex(),
            Textfield::new('place_of_birth')->hideOnIndex(),
            BooleanField::new('availability'),
            ChoiceField::new('job_category')->setChoices([
                'Commercial' => 'Commercial',
                'Retail Sales' => 'Retail Sales',
                'Creative' => 'Creative',
                'Technology' => 'Technology',
                'Marketing & PR' => 'Marketing',
                'Fashion & Luxury' => 'Fashion & Luxury',
                'Management & HR' => 'Management & HR',
            ]),
            ChoiceField::new('experience')->setChoices([
                '0 - 6 month' => '3m',
                    '6 months - 1 year' => '6m',
                    '1 - 2 years' => '1y',
                    '2+ years' => '2y',
                    '5+ years' => '5y',
                    '10 years' => '10y'
            ])->hideOnIndex()
            // DateField::new('')
        ];
    }
}
