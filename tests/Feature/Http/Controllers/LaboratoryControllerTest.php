<?php

namespace Tests\Feature\Http\Controllers;

use App\Laboratory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\HttpTestAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\LaboratoryController
 */
class LaboratoryControllerTest extends TestCase
{
    use HttpTestAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $laboratories = factory(Laboratory::class, 3)->create();

        $response = $this->get(route('laboratory.index'));

        $response->assertOk();
        $response->assertViewIs('laboratory.index');
        $response->assertViewHas('laboratories');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('laboratory.create'));

        $response->assertOk();
        $response->assertViewIs('laboratory.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\LaboratoryController::class,
            'store',
            \App\Http\Requests\LaboratoryStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $laboratory = $this->faker->word;

        $response = $this->post(route('laboratory.store'), [
            'laboratory' => $laboratory,
        ]);

        $laboratories = Laboratory::query()
            ->where('laboratory', $laboratory)
            ->get();
        $this->assertCount(1, $laboratories);
        $laboratory = $laboratories->first();

        $response->assertRedirect(route('laboratory.index'));
        $response->assertSessionHas('laboratory.id', $laboratory->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $laboratory = factory(Laboratory::class)->create();

        $response = $this->get(route('laboratory.show', $laboratory));

        $response->assertOk();
        $response->assertViewIs('laboratory.show');
        $response->assertViewHas('laboratory');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $laboratory = factory(Laboratory::class)->create();

        $response = $this->get(route('laboratory.edit', $laboratory));

        $response->assertOk();
        $response->assertViewIs('laboratory.edit');
        $response->assertViewHas('laboratory');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\LaboratoryController::class,
            'update',
            \App\Http\Requests\LaboratoryUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $laboratory = factory(Laboratory::class)->create();
        $laboratory = $this->faker->word;

        $response = $this->put(route('laboratory.update', $laboratory), [
            'laboratory' => $laboratory,
        ]);

        $response->assertRedirect(route('laboratory.index'));
        $response->assertSessionHas('laboratory.id', $laboratory->id);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $laboratory = factory(Laboratory::class)->create();
        $laboratory = factory(Laboratory::class)->create();

        $response = $this->get(route('laboratory.destroy', $laboratory));

        $response->assertRedirect(route('laboratory.index'));

        $this->assertDeleted($laboratory);
    }
}
