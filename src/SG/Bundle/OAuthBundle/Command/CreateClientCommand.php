<?php
/**
 * CreateClientCommand.php
 *
 * Ariel Ferrandini <arielferrandini@gmail.com>
 * 07/07/14
 */ 

namespace SG\Bundle\OAuthBundle\Command;


use SG\Bundle\OAuthBundle\Entity\Client;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class CreateClientCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('sg:oauth-server:client:create')
            ->setDescription('Creates a new client')
            ->addArgument('name', InputArgument::REQUIRED, 'The client name.')
            ->addOption(
                'redirect-uri',
                null,
                InputOption::VALUE_REQUIRED | InputOption::VALUE_IS_ARRAY,
                'Sets redirect uri for client. Use this option multiple times to set multiple redirect URIs.',
                null
            )
            ->addOption(
                'grant-type',
                null,
                InputOption::VALUE_REQUIRED | InputOption::VALUE_IS_ARRAY,
                'Sets allowed grant type for client. Use this option multiple times to set multiple grant types..',
                null
            )
            ->setHelp(
                <<<EOT
                    The <info>%command.name%</info>command creates a new client.

<info>php %command.full_name% [--redirect-uri=...] [--grant-type=...] name</info>

EOT
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $clientManager = $this->getContainer()->get('fos_oauth_server.client_manager.default');

        /** @var Client $client */
        $client = $clientManager->createClient();
        $client->setName($input->getArgument('name'));
        $client->setRedirectUris($input->getOption('redirect-uri'));
        $client->setAllowedGrantTypes($input->getOption('grant-type'));

        $clientManager->updateClient($client);

        $output->writeln(sprintf("Added a new client '%s' with following information:", $client->getName()));
        $output->writeln(sprintf("\tPublic id: <info>%s</info>", $client->getPublicId()));
        $output->writeln(sprintf("\tSecret:    <info>%s</info>", $client->getSecret()));
    }
}
 