<?php 

class FirstCest
{
    public function frontpageWorks(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->see('Desenvolvimento');
        $I->wait(5); 
    }
}
