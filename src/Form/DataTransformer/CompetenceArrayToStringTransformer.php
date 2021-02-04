<?php


namespace App\Form\DataTransformer;

use App\Entity\Competence;
use App\Repository\CompetenceRepository;
use Symfony\Component\Form\DataTransformerInterface;


class CompetenceArrayToStringTransformer implements DataTransformerInterface
{
    /**
     * @var CompetenceRepository
     */
    private $competenceRepository;

    public function __construct(CompetenceRepository $competenceRepository)
    {
        $this->competenceRepository = $competenceRepository;
    }

    /**
     * On passe de Tag[] à une chaine
     * @param array $competences
     * @return string
     */
    public function transform($competences): string
    {
        return implode(',', $competences);
    }

    /**
     * On passe d'une chaine à Tag[]
     * @param string $string
     * @return array
     */
    public function reverseTransform($string): array
    {
        $names = explode(',', $string);
        $tags = $this->competenceRepository->findBy([
            'name' => $names,
        ]);
        $newNames = array_diff($names, $tags);

        foreach ($newNames as $name) {
            $tag = new Competence();
            $tag->setName($name);
            $tags[] = $tag;
        }

        return $tags;
    }
}