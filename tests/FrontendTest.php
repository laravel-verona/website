<?php

class FrontendTest extends TestCase
{
    public function testWebsiteTitle()
    {
        $this->visit('/')->see(trans('lmv.website.title'));
    }
}
