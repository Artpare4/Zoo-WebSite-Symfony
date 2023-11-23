<?php


namespace App\Tests\Controller\Event;

use App\Tests\Support\ControllerTester;

class indexCest
{
    public function _before(ControllerTester $I)
    {
    }

    // tests
    public function correctName(ControllerTester $I)
    {
        $I->amOnPage('/event');
        $I->seeInTitle('Evénements - Zoo Parc de Laval');
    }

    public function correctHttpResponse(ControllerTester $I)
    {
        $I->amOnPage('/event');
        $I->seeResponseCodeIs(200);
    }

}
