<?php
namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class FixturesCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('app:fixtures:load');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        try {
            $command = $this->getApplication()->find('doctrine:database:drop');
            $arguments = ['--force' => true, '--if-exists' => true];
            $arrayInput = new ArrayInput($arguments);
            $command->run($arrayInput, $output);

            $command = $this->getApplication()->find('doctrine:database:create');
            $arguments = [];
            $arrayInput = new ArrayInput($arguments);
            $command->run($arrayInput, $output);

            $command = $this->getApplication()->find('doctrine:migrations:migrate');
            $command->run($input, $output);

            $command = $this->getApplication()->find('hautelook:fixtures:load');
            $arguments = ['--append' => true];
            $arrayInput = new ArrayInput($arguments);
            $command->run($arrayInput, $output);
        } catch (\Exception $e) {
            $output->writeln($e->getMessage());
        }
    }
}
