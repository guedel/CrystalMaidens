<?php

namespace App\Command;

use App\Entity\{
    Maiden,
    Item
};
use App\Repository\ExportInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Contracts\Translation\TranslatorInterface;

#[AsCommand(
    name: 'app:export-fixtures',
    description: 'Export data as fixtures',
)]
class ExportFixturesCommand extends Command
{
    public function __construct(
        private readonly EntityManagerInterface $em,
        private readonly TranslatorInterface $translator
    ) {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->addArgument('entity', InputArgument::OPTIONAL, 'Entity to export (default all) ie App\Entity\Maiden')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $entityToExport = $input->getArgument('entity');
        if ($entityToExport == 'all' || ! $entityToExport) {
            $entityList = [
                \App\Entity\Maiden::class,
                \App\Entity\Item::class,
                \App\Entity\Etape::class,
                \App\Entity\EtapeAdversaire::class,
                \App\Entity\EtapeCrystal::class,
                \App\Entity\EtapeFragment::class,
                \App\Entity\EtapeItem::class,
                \App\Entity\BossIngredient::class,
                \App\Entity\IngredientConstituant::class,
            ];
        } else {
            $entityList = [ $entityToExport ];
        }
        foreach ($entityList as $classname) {
            $this->export($classname, $io);
        }

        $io->success($this->translator->trans("Ok that's all !"));

        return Command::SUCCESS;
    }

  /**
   * @param string $classname
   * @param SymfonyStyle $io
   * @return void
   */
    private function export(string $classname, SymfonyStyle $io): void
    {
        $repo = $this->em->getRepository($classname);
        if ($repo instanceof ExportInterface) {
            $filename = $repo->getExportFilename();
            $items = $repo->getExport();
            $file = fopen($filename, 'w');
            foreach ($items as $item) {
                fputcsv($file, $item, ";");
            }
            fclose($file);
            $io->success("$classname OK");
        } else {
            $io->note($repo::class . " does not implement ExportInterface");
        }
    }
}
