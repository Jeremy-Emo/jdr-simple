<?php

declare(strict_types=1);

namespace App\Controller\Admin\Crud;

use App\Entity\Map;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class MapCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Map::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('nom');
        yield AssociationField::new('aventure');
        yield TextareaField::new('infos')->hideOnIndex();
    }
}
