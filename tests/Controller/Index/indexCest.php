<?php

namespace App\Tests\Controller\Index;

use App\Factory\UserFactory;
use App\Tests\Support\ControllerTester;

class indexCest
{
    public function _before(ControllerTester $I)
    {
    }

    // tests
    public function correctName(ControllerTester $I)
    {
        $I->amOnPage('/');
        $I->seeInTitle('index - Zoo Parc de Laval');
    }

    public function correctHttpResponse(ControllerTester $I)
    {
        $I->amOnPage('/');
        $I->seeResponseCodeIs(200);
    }

    public function contentIsCorrect(ControllerTester $I): void
    {
        $I->amOnPage('/');
        $I->seeResponseCodeIs(200);
        $I->seeInTitle('index - Zoo Parc de Laval');
        $I->see('Nos Animation', 'h1');
        $I->see('Nos Animaux', 'h1');
    }

    public function adminsCanAccessCrud(ControllerTester $I): void
    {
        $user = UserFactory::createOne([
            'email' => 'admin@test.com',
            'password' => 'test',
            'phoneUser' => '0606060606',
            'roles' => ['ROLE_ADMIN'],
            'nomUser' => 'Admin',
            'pnomUser' => 'Toujours',
        ]);

        $realUser = $user->object();
        $I->amLoggedInAs($realUser);
        $I->amOnPage('/');
        $I->see('Compte Administrateur', 'p');
    }
}
