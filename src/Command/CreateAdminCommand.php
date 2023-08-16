<?php

declare(strict_types=1);

namespace App\Command;

use App\Entity\AdminUser;
use App\Repository\AdminUserRepository;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Contracts\Service\Attribute\Required;

#[AsCommand(
    name: 'admin:create',
    description: 'Crée un utilisateur admin',
)]
class CreateAdminCommand extends Command
{
    #[Required]
    public AdminUserRepository $repository;

    public function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $io->title('CREATION D\'UN ADMINISTRATEUR');

        $username = $io->ask('Entrez le username du nouvel utilisateur');
        $password = $io->ask('Entrez le mot de passe du nouvel utilisateur');

        $io->confirm('Valider la création de cet utilisateur :'.$username.' ?', true);

        $io->progressStart(100);

        $user = (new AdminUser())
            ->setUsername($username)
            ->setPlainPassword($password);

        $io->progressAdvance(50);

        $this->repository->save($user);

        $io->progressFinish();
        $io->success('Utilisateur enregistré avec succès !');

        return Command::SUCCESS;
    }
}
