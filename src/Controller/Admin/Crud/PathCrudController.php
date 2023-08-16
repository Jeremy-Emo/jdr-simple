<?php

declare(strict_types=1);

namespace App\Controller\Admin\Crud;

use App\Entity\Path;
use EasyCorp\Bundle\EasyAdminBundle\Contracts\Field\FieldInterface;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;

class PathCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Path::class;
    }

    /**
     * @return iterable<FieldInterface>
     */
    public function configureFields(string $pageName): iterable
    {
        yield AssociationField::new('fromMap');
        yield AssociationField::new('toMap');
        yield TextareaField::new('infos')->hideOnIndex();
    }
}
