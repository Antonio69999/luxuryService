<?php

namespace App\Tests\Unit;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Validator\ConstraintViolation;


class EntityTest extends KernelTestCase
{
    private $validator;

    protected function setUp(): void
    {
        self::bootKernel();
        $this->validator = static::getContainer()->get('validator');
    }

    public function testUser(): void        //à l'inverse on peut tester un InvalidUser
    {
        $this->validator = static::getContainer()->get('validator');

            $user = new User();
            $user->setEmail('test@example.com')
                ->setPassword('password')
                ->setName('John Doe');
    
            $errors = $this->validator->validate($user);
    
            $this->assertCount(0, $errors); //on affirme qu'il n'y aucune erreurs

        // $this->assertSame('test', $kernel->getEnvironment());
        // $routerService = static::getContainer()->get('router');
        // $myCustomService = static::getContainer()->get(CustomService::class);
    }
}
