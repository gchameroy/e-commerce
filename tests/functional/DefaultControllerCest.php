<?php

use Codeception\Util\HttpCode;

class DefaultControllerCest
{
    public function tryDefault(FunctionalTester $I)
    {
        $I->amOnPage('/default');
        $I->seeResponseCodeIs(HttpCode::OK);
        $I->seeCurrentUrlEquals('/default');
        $I->see('Hello DefaultController!', 'h1');
    }
}
