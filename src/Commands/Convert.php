<?php
namespace jpuck\ctime\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Carbon\Carbon;

class Convert extends Command {
    protected function configure()
    {
        $this->setName('convert')
            ->setDescription('Convert a time')
            ->addArgument(
                'time',
                InputArgument::IS_ARRAY | InputArgument::OPTIONAL,
                'Input time components',
                ['now']
            )->addOption(
                'timezone-out',
                'o',
                InputOption::VALUE_OPTIONAL,
                'Output timezone',
                'UTC'
            );
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $time = implode(' ', $input->getArgument('time'));
        $carbon = new Carbon($time);

        $timezoneOut = $input->getOption('timezone-out');
        $carbon->timezone = $timezoneOut;

        $output->writeln($carbon);
    }
}
