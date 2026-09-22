<?php

declare(strict_types=1);

it('renders the about page content', function (): void {
    $response = $this->get(route('about'));

    $response->assertOk()
        ->assertSee('images/about/mission.jpg')
        ->assertSee('images/about/caa-icon.png')
        ->assertSee('We began in 2017, having identified that there was nothing already in place to bring this community together and provide support. Originally known as the Christian Ambulance Network, we changed to an ‘Association’ as our aims became more established and we are delighted to have become a charity in 2020.')
        ->assertSee('Our aim is to support staff with a focus on the Christian faith and those issues impacting people of faith')
        ->assertSee('The CAA is open to all who identify themselves as Christian, supporting the aims of the CAA.');
});
