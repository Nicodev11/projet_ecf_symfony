<?php

namespace App\Controller\Admin\EasyAdmin;

use App\Entity\Plates;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class PlatesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Plates::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('name')->setLabel('Nom du plat'),
            TextEditorField::new('description')->setLabel('Description'),
            MoneyField::new('Price')->setCurrency('EUR')->setLabel('Prix'),
            AssociationField::new('categories')->setLabel('Catégorie'),
        ];
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInPlural('Liste des plats')
            ->setEntityLabelInSingular('plat');
    }
}
