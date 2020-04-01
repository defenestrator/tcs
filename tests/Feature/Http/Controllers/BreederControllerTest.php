<?php

namespace Tests\Feature\Http\Controllers;

use App\Breeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\HttpTestAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\BreederController
 */
class BreederControllerTest extends TestCase
{
    use HttpTestAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $breeders = factory(Breeder::class, 3)->create();

        $response = $this->get(route('breeder.index'));

        $response->assertOk();
        $response->assertViewIs('breeder.index');
        $response->assertViewHas('breeders');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('breeder.create'));

        $response->assertOk();
        $response->assertViewIs('breeder.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\BreederController::class,
            'store',
            \App\Http\Requests\BreederStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $breeder = $this->faker->word;

        $response = $this->post(route('breeder.store'), [
            'breeder' => $breeder,
        ]);

        $breeders = Breeder::query()
            ->where('breeder', $breeder)
            ->get();
        $this->assertCount(1, $breeders);
        $breeder = $breeders->first();

        $response->assertRedirect(route('breeder.index'));
        $response->assertSessionHas('breeder.id', $breeder->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $breeder = factory(Breeder::class)->create();

        $response = $this->get(route('breeder.show', $breeder));

        $response->assertOk();
        $response->assertViewIs('breeder.show');
        $response->assertViewHas('breeder');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $breeder = factory(Breeder::class)->create();

        $response = $this->get(route('breeder.edit', $breeder));

        $response->assertOk();
        $response->assertViewIs('breeder.edit');
        $response->assertViewHas('breeder');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\BreederController::class,
            'update',
            \App\Http\Requests\BreederUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $breeder = factory(Breeder::class)->create();
        $breeder = $this->faker->word;

        $response = $this->put(route('breeder.update', $breeder), [
            'breeder' => $breeder,
        ]);

        $response->assertRedirect(route('breeder.index'));
        $response->assertSessionHas('breeder.id', $breeder->id);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $breeder = factory(Breeder::class)->create();
        $breeder = factory(Breeder::class)->create();

        $response = $this->get(route('breeder.destroy', $breeder));

        $response->assertRedirect(route('breeder.index'));

        $this->assertDeleted($breeder);
    }
}
