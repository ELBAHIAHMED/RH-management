<?php

namespace App\Factory;

use App\Entity\Experience;
use App\Repository\ExperienceRepository;
use Zenstruck\Foundry\RepositoryProxy;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;

/**
 * @method static Experience|Proxy createOne(array $attributes = [])
 * @method static Experience[]|Proxy[] createMany(int $number, $attributes = [])
 * @method static Experience|Proxy find($criteria)
 * @method static Experience|Proxy findOrCreate(array $attributes)
 * @method static Experience|Proxy first(string $sortedField = 'id')
 * @method static Experience|Proxy last(string $sortedField = 'id')
 * @method static Experience|Proxy random(array $attributes = [])
 * @method static Experience|Proxy randomOrCreate(array $attributes = [])
 * @method static Experience[]|Proxy[] all()
 * @method static Experience[]|Proxy[] findBy(array $attributes)
 * @method static Experience[]|Proxy[] randomSet(int $number, array $attributes = [])
 * @method static Experience[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static ExperienceRepository|RepositoryProxy repository()
 * @method Experience|Proxy create($attributes = [])
 */
final class ExperienceFactory extends ModelFactory
{
    public function __construct()
    {
        parent::__construct();

        // TODO inject services if required (https://github.com/zenstruck/foundry#factories-as-services)
    }

    protected function getDefaults(): array
    {
        return [
            // TODO add your default values here (https://github.com/zenstruck/foundry#model-factories)
            'firstExperience' => self::faker()->realText(30),
            'secondExperience' => self::faker()->realText(30),
            'thirdExperience' => self::faker()->realText(30),
            'employeeIdExp' => self::faker()->numberBetween(1,1),
        ];
    }

    protected function initialize(): self
    {
        // see https://github.com/zenstruck/foundry#initialization
        return $this
            // ->afterInstantiate(function(Experience $experience) {})
        ;
    }

    protected static function getClass(): string
    {
        return Experience::class;
    }
}
