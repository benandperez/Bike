<?php

namespace App\DataFixtures;

use App\Entity\Bike;
use App\Entity\BikeType;
use App\Entity\Client;
use App\Entity\TypeMembership;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $typeMembershipPremium = new TypeMembership();
        $typeMembershipPremium->setDescription('Premium');
        $typeMembershipPremium->setCost(30);
        $typeMembershipPremium->setCreatedAt(new \DateTime());
        $typeMembershipPremium->setCreatedAt(new \DateTime());
        $manager->persist($typeMembershipPremium);

        $typeMembershipBasics = new TypeMembership();
        $typeMembershipBasics->setDescription('Basics');
        $typeMembershipBasics->setCost(10);
        $typeMembershipBasics->setCreatedAt(new \DateTime());
        $manager->persist($typeMembershipBasics);

        $bikeType = new BikeType();
        $bikeType->setDescription('Bicicletas electricas - Premium');
        $bikeType->setStatus(1);
        $bikeType->setTypeMembership($typeMembershipPremium);
        $bikeType->setCreatedAt(new \DateTime());
        $bikeType->setUpdatedAt(new \DateTime());
        $manager->persist($bikeType);

        $bikeType = new BikeType();
        $bikeType->setDescription('Bicicletas electricas - Basics');
        $bikeType->setStatus(1);
        $bikeType->setTypeMembership($typeMembershipBasics);
        $bikeType->setCreatedAt(new \DateTime());
        $bikeType->setUpdatedAt(new \DateTime());
        $manager->persist($bikeType);

        $bikeType = new BikeType();
        $bikeType->setDescription('Bicicletas normales - Premium');
        $bikeType->setStatus(1);
        $bikeType->setTypeMembership($typeMembershipPremium);
        $bikeType->setCreatedAt(new \DateTime());
        $bikeType->setUpdatedAt(new \DateTime());
        $manager->persist($bikeType);

        $bikeType = new BikeType();
        $bikeType->setDescription('Bicicletas normales - Basics');
        $bikeType->setStatus(1);
        $bikeType->setTypeMembership($typeMembershipBasics);
        $bikeType->setCreatedAt(new \DateTime());
        $bikeType->setUpdatedAt(new \DateTime());
        $manager->persist($bikeType);

        $bikeType = new BikeType();
        $bikeType->setDescription('Bicicletas antiguas - Premium');
        $bikeType->setStatus(1);
        $bikeType->setTypeMembership($typeMembershipPremium);
        $bikeType->setCreatedAt(new \DateTime());
        $bikeType->setUpdatedAt(new \DateTime());
        $manager->persist($bikeType);

        $bikeType = new BikeType();
        $bikeType->setDescription('Bicicletas antiguas - Basics');
        $bikeType->setStatus(1);
        $bikeType->setTypeMembership($typeMembershipBasics);
        $bikeType->setCreatedAt(new \DateTime());
        $bikeType->setUpdatedAt(new \DateTime());
        $manager->persist($bikeType);

        $client = new Client();
        $client->setFirstName('Benjamin');
        $client->setLastName('Perez');
        $client->setEmail('creoencristo7@hotmail.com');
        $client->setCreatedAt(new \DateTime());
        $manager->persist($client);

        $bike = new Bike();
        $bike->setDescription('GW');
        $bike->setModel(2021);
        $bike->setColor('Negra');
        $bike->setStatus(1);
        $bike->setCreatedAt(new \DateTime());
        $bike->setUpdatedAt(new \DateTime());
        $manager->persist($bike);

        $manager->flush();
    }
}
