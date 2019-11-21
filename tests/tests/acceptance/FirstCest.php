<?php 

class FirstCest
{
    public function frontpageWorks(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->see('Desenvolvimento');
        $I->see('Olá, mundo!');
    }
}
