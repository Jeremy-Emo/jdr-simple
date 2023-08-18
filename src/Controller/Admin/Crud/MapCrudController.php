<?php

declare(strict_types=1);

namespace App\Controller\Admin\Crud;

use App\Entity\Map;
use App\Form\PathType;
use EasyCorp\Bundle\EasyAdminBundle\Contracts\Field\FieldInterface;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class MapCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Map::class;
    }

    /**
     * @return iterable<FieldInterface>
     */
    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('nom');
        yield AssociationField::new('aventure');
        yield BooleanField::new('initialMap');
        yield CollectionField::new('pathsTo')
            ->allowAdd()
            ->allowDelete()
            ->setEntryType(PathType::class)
            ->hideOnIndex();
        yield TextareaField::new('infos')->hideOnIndex();
    }
}
