<?php

require __DIR__ . '/vendor/autoload.php';

use Symfony\Component\Console\Application;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class GenerateAdminCommand extends Command
{
    protected static $defaultName = 'table-bug';

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $rows = [];

        $rows[] = ['foo', 'bar', 'foobar', 'barfoo'];
        $rows[] = ['', '', '<fg=red>some text long wrapped text</>', ''];

        $style = clone Table::getStyleDefinition('box');
        $style->setCellHeaderFormat('<info>%s</info>');

        $table = new Table($output);
        $table->setHeaders(['h1', 'h2', 'h3', 'h4']);
        $table->setRows($rows);
        $table->setStyle($style);
        $table->setColumnMaxWidth(2, 10);

        $table->render();

        return Command::SUCCESS;
    }
}

$application = new Application();

$application->add(new GenerateAdminCommand());
$application->run();
