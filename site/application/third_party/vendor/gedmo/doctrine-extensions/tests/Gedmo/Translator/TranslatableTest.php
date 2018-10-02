<?php

namespace Gedmo\Translator;

use Doctrine\Common\EventManager;
use Tool\BaseTestCaseORM;
use Translator\Fixture\Person;
use Translator\Fixture\PersonCustom;
use Doctrine\ORM\Proxy\Proxy;

/**
 * These are tests for translatable behavior
 *
 * @author Konstantin Kudryashov <ever.zet@gmail.com>
 * @link http://www.gediminasm.org
 * @license MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
class TranslatableTest extends BaseTestCaseORM
{
    const PERSON = 'Translator\\Fixture\\Person';
    const PERSON_CUSTOM_PROXY = 'Translator\\Fixture\\PersonCustom';

    protected function setUp()
    {
        parent::setUp();

        $evm = new EventManager();
        $this->getMockSqliteEntityManager($evm);
    }

    public function testTranslatable()
    {
        $person = new Person();
        $person->setName('Jen');
        $person->translate('ru_RU')->setName('Ð–ÐµÐ½Ñ');
        $person->setDescription('description');
        $person->translate('ru_RU')->setDescription('multilingual description');

        $this->assertSame('Jen', $person->getName());
        $this->assertSame('Ð–ÐµÐ½Ñ', $person->translate('ru_RU')->getName());
        $this->assertSame('multilingual description', $person->translate('ru_RU')->getDescription());
        $this->assertSame('multilingual description', $person->getDescription());

        $this->em->persist($person);
        $this->em->flush();
        $this->em->clear();

        // retrieve record (translations would be fetched later - by demand)
        $person = $this->em->getRepository(self::PERSON)->findOneByName('Jen');

        $this->assertSame('Jen', $person->getName());
        $this->assertSame('Ð–ÐµÐ½Ñ', $person->translate('ru_RU')->getName());
        $this->assertSame('multilingual description', $person->translate('ru_RU')->getDescription());
        $this->assertSame('multilingual description', $person->getDescription());

        // retrieve record with all translations in one query
        $persons = $this->em->getRepository(self::PERSON)
            ->createQueryBuilder('p')
            ->select('p, t')
            ->join('p.translations', 't')
            ->getQuery()
            ->execute();
        $person = $persons[0];

        $this->assertSame('Jen', $person->getName());
        $this->assertSame('Ð–ÐµÐ½Ñ', $person->translate('ru_RU')->getName());
        $this->assertSame('multilingual description', $person->translate('ru_RU')->getDescription());
        $this->assertSame('multilingual description', $person->getDescription());

        $person->translate('es_ES')->setName('Amigo');

        $this->em->flush();

        // retrieve record with all translations in one query
        $persons = $this->em->getRepository(self::PERSON)
            ->createQueryBuilder('p')
            ->select('p, t')
            ->join('p.translations', 't')
            ->getQuery()
            ->execute();
        $person = $persons[0];

        $this->assertSame('Jen', $person->getName());
        $this->assertSame('Ð–ÐµÐ½Ñ', $person->translate('ru_RU')->getName());
        $this->assertSame('Amigo', $person->translate('es_ES')->getName());
        $this->assertSame('multilingual description', $person->translate('ru_RU')->getDescription());
    }

    /**
     * @test
     */
    public function shouldTranslateRelation()
    {
        $person = new Person();
        $person->setName('Jen');
        $person->translate('ru')->setName('Ð–ÐµÐ½Ñ');
        $person->setDescription('description');
        $person->translate('ru')->setDescription('multilingual description');

        $parent = new Person();
        $parent->setName('Jen');
        $parent->translate('ru')->setName('Ð–ÐµÐ½Ñ starshai');
        $parent->translate('fr')->setName('zenia');
        $parent->setDescription('description');
        $parent->translate('ru')->setDescription('multilingual description');

        $person->setParent($parent);
        $this->em->persist($person);
        $this->em->persist($parent);
        $this->em->flush();
        $this->em->clear();

        $person = $this->em->getRepository(self::PERSON)->findOneByName('Jen');
        $this->assertSame('Ð–ÐµÐ½Ñ', $person->translate('ru')->getName());
        $parent = $person->getParent();
        $this->assertTrue($parent instanceof Proxy);
        $this->assertSame('Ð–ÐµÐ½Ñ starshai', $parent->translate('ru')->getName());
        $this->assertSame('zenia', $parent->translate('fr')->getName());
    }

    /**
     * @test
     */
    public function shouldHandleDomainObjectProxy()
    {
        $person = new Person();
        $person->setName('Jen');
        $person->translate('ru_RU')->setName('Ð–ÐµÐ½Ñ');
        $person->setDescription('description');
        $person->translate('ru_RU')->setDescription('multilingual description');

        $this->em->persist($person);
        $this->em->flush();
        $this->em->clear();

        $personProxy = $this->em->getReference(self::PERSON, array('id' => 1));
        $this->assertTrue($personProxy instanceof Proxy);
        $name = $personProxy->translate('ru_RU')->getName();
        $this->assertSame('Ð–ÐµÐ½Ñ', $name);
    }

    public function testTranslatableProxyWithUpperCaseProperty()
    {
        $person = new Person();
        $person->setName('Jen');
        $person->translate('ru_RU')->name = 'Ð–ÐµÐ½Ñ';
        $person->setLastName('Abramowicz');
        $person->translate('ru_RU')->setLastName('ÐÐ±Ñ€Ð°Ð¼Ð¾Ð²Ð¸Ñ‡');
        $person->setDescription('description');
        $person->translate('ru_RU')->setDescription('multilingual description');

        $this->em->persist($person);
        $this->em->flush();
        $this->em->clear();

        $personProxy = $this->em->getReference(self::PERSON, array('id' => 1));
        $this->assertTrue($personProxy instanceof Proxy);
        $name = $personProxy->translate('ru_RU')->getName();
        $this->assertSame('Ð–ÐµÐ½Ñ', $name);
        $lastName = $personProxy->translate('ru_RU')->getLastName();
        $this->assertSame('ÐÐ±Ñ€Ð°Ð¼Ð¾Ð²Ð¸Ñ‡', $lastName);
    }

    public function testTranslatableWithMagicProperties()
    {
        $person = new Person();
        $person->translate('en')->setName('Jen');
        $person->translate('ru_RU')->name = 'Ð–ÐµÐ½Ñ';
        $person->translate('ru_RU')->description = 'multilingual description';

        $this->assertSame('Jen', $person->name);
        $this->assertSame('Jen', $person->translate()->name);
        $this->assertSame('Ð–ÐµÐ½Ñ', $person->translate('ru_RU')->name);
        $this->assertSame('multilingual description', $person->translate('ru_RU')->description);
        $this->assertSame('multilingual description', $person->description);
    }

    public function testTranslatableWithCustomProxy()
    {
        $person = new PersonCustom();
        $person->setName('Jen');
        $person->translate('ru_RU')->setName('Ð–ÐµÐ½Ñ');
        $person->setDescription('description');
        $person->translate('ru_RU')->setDescription('multilingual description');

        $this->assertSame('Jen', $person->getName());
        $this->assertSame('Ð–ÐµÐ½Ñ', $person->translate('ru_RU')->getName());
        $this->assertSame('multilingual description', $person->translate('ru_RU')->getDescription());
        $this->assertSame('multilingual description', $person->getDescription());

        $this->em->persist($person);
        $this->em->flush();
        $this->em->clear();

        // retrieve record (translations would be fetched later - by demand)
        $person = $this->em->getRepository(self::PERSON_CUSTOM_PROXY)->findOneByName('Jen');

        $this->assertSame('Jen', $person->getName());
        $this->assertSame('Ð–ÐµÐ½Ñ', $person->translate('ru_RU')->getName());
        $this->assertSame('multilingual description', $person->translate('ru_RU')->getDescription());
        $this->assertSame('multilingual description', $person->getDescription());

        // retrieve record with all translations in one query
        $persons = $this->em->getRepository(self::PERSON_CUSTOM_PROXY)
            ->createQueryBuilder('p')
            ->select('p, t')
            ->join('p.translations', 't')
            ->getQuery()
            ->execute();
        $person = $persons[0];

        $this->assertSame('Jen', $person->getName());
        $this->assertSame('Ð–ÐµÐ½Ñ', $person->translate('ru_RU')->getName());
        $this->assertSame('multilingual description', $person->translate('ru_RU')->getDescription());
        $this->assertSame('multilingual description', $person->getDescription());

        $person->translate('es_ES')->setName('Amigo');

        $this->em->flush();

        // retrieve record with all translations in one query
        $persons = $this->em->getRepository(self::PERSON_CUSTOM_PROXY)
            ->createQueryBuilder('p')
            ->select('p, t')
            ->join('p.translations', 't')
            ->getQuery()
            ->execute();
        $person = $persons[0];

        $this->assertSame('Jen', $person->getName());
        $this->assertSame('Ð–ÐµÐ½Ñ', $person->translate('ru_RU')->getName());
        $this->assertSame('Amigo', $person->translate('es_ES')->getName());
        $this->assertSame('multilingual description', $person->translate('ru_RU')->getDescription());
    }

    protected function getUsedEntityFixtures()
    {
        return array(
            self::PERSON, self::PERSON.'Translation',
            self::PERSON_CUSTOM_PROXY, self::PERSON_CUSTOM_PROXY.'Translation',
        );
    }
}
