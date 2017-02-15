<?php
namespace jpuck\TimeConverter\Commands;

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
                'timezone-in',
                InputArgument::REQUIRED,
                'Input timezone to convert'
            )->addArgument(
                'time',
                InputArgument::REQUIRED,
                'Input time to convert'
            )->addArgument(
                'timezone-out',
                InputArgument::OPTIONAL,
                'Output timezone to convert',
                'UTC'
            );
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $timezoneIn  = $input->getArgument('timezone-in');
        $time        = $input->getArgument('time');
        $timezoneOut = $input->getArgument('timezone-out');

        $carbon = new Carbon($time, $timezoneIn);

        $carbon->timezone = $timezoneOut;

        $output->writeln($carbon);
    }
}
