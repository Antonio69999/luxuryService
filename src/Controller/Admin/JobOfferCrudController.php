<?php

namespace App\Controller\Admin;

use App\Entity\JobOffer;
use Doctrine\DBAL\Types\BooleanType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class JobOfferCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return JobOffer::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('reference'),
            TextField::new('job_title'),
            TextEditorField::new('description'),
            IntegerField::new('activity'),
            TextEditorField::new('notes'),
            TextField::new('job_type'),
            TextField::new('location'),
            TextField::new('job_category'),
            DateField::new('closing_date'),
            IntegerField::new('salary'),
            DateField::new('created_at'),
            AssociationField::new('client'),
        ];
    }
    
}
