<?php

namespace App\Commands;

use App\Dba\Cache;
use Faker\Factory as Factory;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class DbaCacheCommand
{
    private const LIMIT = 100;
    
    private $faker;

    public function __construct(
    ) {
        $this->faker = Factory::create();
    }

    public function __invoke(InputInterface $input, OutputInterface $output)
    {
        $output->writeln("\nBeginning dba cache SET execution... \n");

        $db = realpath("")."/cache/app.db4";
        $cache = new Cache($db, 'flatfile', 'c-', true);

        for ($key = 0; $key < self::LIMIT; $key++) 
        {
            $value = $this->faker->address();
            $cache->put($key, $value, rand(1, 21600));
        }

        $cache->closeDba();

        $output->writeln("\Dba cache SET executed ! \n");
    }
}
