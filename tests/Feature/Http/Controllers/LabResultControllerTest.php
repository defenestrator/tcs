<?php

namespace Tests\Feature\Http\Controllers;

use App\Labresult;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\HttpTestAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\LabResultController
 */
class LabResultControllerTest extends TestCase
{
    use HttpTestAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $labResults = factory(LabResult::class, 3)->create();

        $response = $this->get(route('labresult.index'));

        $response->assertOk();
        $response->assertViewIs('labresult.index');
        $response->assertViewHas('labresults');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('labresult.create'));

        $response->assertOk();
        $response->assertViewIs('labresult.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\LabResultController::class,
            'store',
            \App\Http\Requests\LabResultStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $labresult = $this->faker->word;

        $response = $this->post(route('labresult.store'), [
            'labresult' => $labresult,
        ]);

        $labResults = Labresult::query()
            ->where('labresult', $labresult)
            ->get();
        $this->assertCount(1, $labResults);
        $labResult = $labResults->first();

        $response->assertRedirect(route('labresult.index'));
        $response->assertSessionHas('labresult.id', $labresult->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $labResult = factory(LabResult::class)->create();

        $response = $this->get(route('labresult.show', $labResult));

        $response->assertOk();
        $response->assertViewIs('labresult.show');
        $response->assertViewHas('labresult');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $labResult = factory(LabResult::class)->create();

        $response = $this->get(route('labresult.edit', $labResult));

        $response->assertOk();
        $response->assertViewIs('labresult.edit');
        $response->assertViewHas('labresult');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\LabResultController::class,
            'update',
            \App\Http\Requests\LabResultUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $labResult = factory(LabResult::class)->create();
        $labresult = $this->faker->word;

        $response = $this->put(route('labresult.update', $labResult), [
            'labresult' => $labresult,
        ]);

        $response->assertRedirect(route('labresult.index'));
        $response->assertSessionHas('labresult.id', $labresult->id);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $labResult = factory(LabResult::class)->create();
        $labResult = factory(Labresult::class)->create();

        $response = $this->get(route('labresult.destroy', $labResult));

        $response->assertRedirect(route('labresult.index'));

        $this->assertDeleted($labResult);
    }
}
