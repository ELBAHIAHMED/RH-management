<?php

namespace App\Factory;

use App\Entity\PersonalSkills;
use App\Repository\PersonalSkillsRepository;
use Zenstruck\Foundry\RepositoryProxy;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;

/**
 * @method static PersonalSkills|Proxy createOne(array $attributes = [])
 * @method static PersonalSkills[]|Proxy[] createMany(int $number, $attributes = [])
 * @method static PersonalSkills|Proxy find($criteria)
 * @method static PersonalSkills|Proxy findOrCreate(array $attributes)
 * @method static PersonalSkills|Proxy first(string $sortedField = 'id')
 * @method static PersonalSkills|Proxy last(string $sortedField = 'id')
 * @method static PersonalSkills|Proxy random(array $attributes = [])
 * @method static PersonalSkills|Proxy randomOrCreate(array $attributes = [])
 * @method static PersonalSkills[]|Proxy[] all()
 * @method static PersonalSkills[]|Proxy[] findBy(array $attributes)
 * @method static PersonalSkills[]|Proxy[] randomSet(int $number, array $attributes = [])
 * @method static PersonalSkills[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static PersonalSkillsRepository|RepositoryProxy repository()
 * @method PersonalSkills|Proxy create($attributes = [])
 */
final class PersonalSkillsFactory extends ModelFactory
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
            'fist' => self::faker()->text(12),
            'employeeIdPersonalSkills'=>self::faker()->numberBetween(1,1),
            'second' => self::faker()->text(12),
            'third' => self::faker()->text(12),
            'fourth' => self::faker()->text(12),
        ];
    }

    protected function initialize(): self
    {
        // see https://github.com/zenstruck/foundry#initialization
        return $this
            // ->afterInstantiate(function(PersonalSkills $personalSkills) {})
        ;
    }

    protected static function getClass(): string
    {
        return PersonalSkills::class;
    }
}
