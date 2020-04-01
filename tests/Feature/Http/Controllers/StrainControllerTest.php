<?php

namespace Tests\Feature\Http\Controllers;

use App\Strain;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\HttpTestAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\StrainController
 */
class StrainControllerTest extends TestCase
{
    use HttpTestAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $strains = factory(Strain::class, 3)->create();

        $response = $this->get(route('strain.index'));

        $response->assertOk();
        $response->assertViewIs('strain.index');
        $response->assertViewHas('strains');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('strain.create'));

        $response->assertOk();
        $response->assertViewIs('strain.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\StrainController::class,
            'store',
            \App\Http\Requests\StrainStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $strain = $this->faker->word;

        $response = $this->post(route('strain.store'), [
            'strain' => $strain,
        ]);

        $strains = Strain::query()
            ->where('strain', $strain)
            ->get();
        $this->assertCount(1, $strains);
        $strain = $strains->first();

        $response->assertRedirect(route('strain.index'));
        $response->assertSessionHas('strain.id', $strain->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $strain = factory(Strain::class)->create();

        $response = $this->get(route('strain.show', $strain));

        $response->assertOk();
        $response->assertViewIs('strain.show');
        $response->assertViewHas('strain');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $strain = factory(Strain::class)->create();

        $response = $this->get(route('strain.edit', $strain));

        $response->assertOk();
        $response->assertViewIs('strain.edit');
        $response->assertViewHas('strain');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\StrainController::class,
            'update',
            \App\Http\Requests\StrainUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $strain = factory(Strain::class)->create();
        $strain = $this->faker->word;

        $response = $this->put(route('strain.update', $strain), [
            'strain' => $strain,
        ]);

        $response->assertRedirect(route('strain.index'));
        $response->assertSessionHas('strain.id', $strain->id);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $strain = factory(Strain::class)->create();
        $strain = factory(Strain::class)->create();

        $response = $this->get(route('strain.destroy', $strain));

        $response->assertRedirect(route('strain.index'));

        $this->assertDeleted($strain);
    }
}
