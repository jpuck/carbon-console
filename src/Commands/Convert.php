<?php

namespace jpuck\CarbonConsole\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Carbon\Carbon;

class Convert extends Command
{
    protected function configure()
    {
        $this->setName('convert')
            ->setDescription('Converts a timezone or format')
            ->addArgument(
                'time-in',
                InputArgument::IS_ARRAY | InputArgument::OPTIONAL,
                'Input time components',
                ['now']
            )->addOption(
                'timezone-out',
                'o',
                InputOption::VALUE_OPTIONAL,
                'Output timezone',
                'local'
            )->addOption(
                'format-out',
                'f',
                InputOption::VALUE_OPTIONAL,
                'Output format',
                'c e'
            );
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $time = implode(' ', $input->getArgument('time-in'));
        $carbon = new Carbon($time);

        $timezoneOut = $input->getOption('timezone-out');
        if ($timezoneOut === 'local') {
            $timezoneOut = date_default_timezone_get();
        }
        $carbon->timezone = $timezoneOut;

        $format = $input->getOption('format-out');
        $output->writeln($carbon->format($format));
    }
}
