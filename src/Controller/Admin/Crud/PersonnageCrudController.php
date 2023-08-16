<?php

declare(strict_types=1);

namespace App\Controller\Admin\Crud;

use App\Entity\Personnage;
use EasyCorp\Bundle\EasyAdminBundle\Contracts\Field\FieldInterface;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class PersonnageCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Personnage::class;
    }

    /**
     * @return iterable<FieldInterface>
     */
    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('nom');
        yield TextField::new('job');
        yield IntegerField::new('statForce');
        yield IntegerField::new('statEsprit');
        yield IntegerField::new('statAgilite');
        yield IntegerField::new('statCharisme');
        yield AssociationField::new('skills')->hideOnIndex();
        yield TextareaField::new('description')->hideOnIndex();
    }
}
