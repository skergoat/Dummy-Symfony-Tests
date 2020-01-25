<?php

namespace App\DataFixtures;

use App\Entity\Developer;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class DevloperFixture extends Fixture
{
    private $biography = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris sit amet aliquet ex, viverra porttitor arcu. Nulla at risus lobortis, aliquet tortor non, elementum nulla. Praesent mi neque, blandit in est sed, cursus consectetur elit. Nunc euismod ornare congue. Praesent iaculis cursus quam, eu suscipit enim tempus sed. Suspendisse enim dolor, dapibus quis vestibulum vitae, finibus et sem. Donec consectetur odio non dolor ultricies, quis imperdiet lectus fringilla. Suspendisse felis lorem, venenatis ac urna bibendum, malesuada volutpat ante. In tempor orci eu quam facilisis faucibus. In venenatis hendrerit justo ut rhoncus. Proin vel molestie ipsum, eu ultricies mi.";

    public function load(ObjectManager $manager)
    {
        $dev1 = new Developer();
        $dev1->setName('Stephane');
        $dev1->setLanguages('HTML, CSS, JS');
        $dev1->setExperience(1);
        $dev1->setBiography($this->biography);

        $dev2 = new Developer();
        $dev2->setName('Jean');
        $dev2->setLanguages('PHP, Node, React');
        $dev2->setExperience(5);
        $dev2->setBiography($this->biography);

        $dev3 = new Developer();
        $dev3->setName('Jacques');
        $dev3->setLanguages('Python, Swift, Arduino');
        $dev3->setExperience(3);
        $dev3->setBiography($this->biography);

        $manager->persist($dev1);
        $manager->persist($dev2);
        $manager->persist($dev3);
        $manager->flush();
    }
}
