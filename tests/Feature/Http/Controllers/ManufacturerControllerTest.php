<?php

namespace Tests\Feature\Http\Controllers;

use App\Manufacturer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\HttpTestAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\ManufacturerController
 */
class ManufacturerControllerTest extends TestCase
{
    use HttpTestAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $manufacturers = factory(Manufacturer::class, 3)->create();

        $response = $this->get(route('manufacturer.index'));

        $response->assertOk();
        $response->assertViewIs('manufacturer.index');
        $response->assertViewHas('manufacturers');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('manufacturer.create'));

        $response->assertOk();
        $response->assertViewIs('manufacturer.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ManufacturerController::class,
            'store',
            \App\Http\Requests\ManufacturerStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $manufacturer = $this->faker->word;

        $response = $this->post(route('manufacturer.store'), [
            'manufacturer' => $manufacturer,
        ]);

        $manufacturers = Manufacturer::query()
            ->where('manufacturer', $manufacturer)
            ->get();
        $this->assertCount(1, $manufacturers);
        $manufacturer = $manufacturers->first();

        $response->assertRedirect(route('manufacturer.index'));
        $response->assertSessionHas('manufacturer.id', $manufacturer->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $manufacturer = factory(Manufacturer::class)->create();

        $response = $this->get(route('manufacturer.show', $manufacturer));

        $response->assertOk();
        $response->assertViewIs('manufacturer.show');
        $response->assertViewHas('manufacturer');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $manufacturer = factory(Manufacturer::class)->create();

        $response = $this->get(route('manufacturer.edit', $manufacturer));

        $response->assertOk();
        $response->assertViewIs('manufacturer.edit');
        $response->assertViewHas('manufacturer');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ManufacturerController::class,
            'update',
            \App\Http\Requests\ManufacturerUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $manufacturer = factory(Manufacturer::class)->create();
        $manufacturer = $this->faker->word;

        $response = $this->put(route('manufacturer.update', $manufacturer), [
            'manufacturer' => $manufacturer,
        ]);

        $response->assertRedirect(route('manufacturer.index'));
        $response->assertSessionHas('manufacturer.id', $manufacturer->id);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $manufacturer = factory(Manufacturer::class)->create();
        $manufacturer = factory(Manufacturer::class)->create();

        $response = $this->get(route('manufacturer.destroy', $manufacturer));

        $response->assertRedirect(route('manufacturer.index'));

        $this->assertDeleted($manufacturer);
    }
}
