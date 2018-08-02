<?php

use Codeception\Util\HttpCode;

class DefaultControllerCest
{
    public function tryDefault(FunctionalTester $I)
    {
        $I->amOnPage('/');
        $I->seeResponseCodeIs(HttpCode::OK);
        $I->seeCurrentUrlEquals('/');
        $I->see('Home', 'a');
    }
}
