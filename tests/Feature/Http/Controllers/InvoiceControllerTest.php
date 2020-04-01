<?php

namespace Tests\Feature\Http\Controllers;

use App\Invoice;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\HttpTestAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\InvoiceController
 */
class InvoiceControllerTest extends TestCase
{
    use HttpTestAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $invoices = factory(Invoice::class, 3)->create();

        $response = $this->get(route('invoice.index'));

        $response->assertOk();
        $response->assertViewIs('invoice.index');
        $response->assertViewHas('invoices');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('invoice.create'));

        $response->assertOk();
        $response->assertViewIs('invoice.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\InvoiceController::class,
            'store',
            \App\Http\Requests\InvoiceStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $invoice = $this->faker->word;

        $response = $this->post(route('invoice.store'), [
            'invoice' => $invoice,
        ]);

        $invoices = Invoice::query()
            ->where('invoice', $invoice)
            ->get();
        $this->assertCount(1, $invoices);
        $invoice = $invoices->first();

        $response->assertRedirect(route('invoice.index'));
        $response->assertSessionHas('invoice.id', $invoice->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $invoice = factory(Invoice::class)->create();

        $response = $this->get(route('invoice.show', $invoice));

        $response->assertOk();
        $response->assertViewIs('invoice.show');
        $response->assertViewHas('invoice');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $invoice = factory(Invoice::class)->create();

        $response = $this->get(route('invoice.edit', $invoice));

        $response->assertOk();
        $response->assertViewIs('invoice.edit');
        $response->assertViewHas('invoice');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\InvoiceController::class,
            'update',
            \App\Http\Requests\InvoiceUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $invoice = factory(Invoice::class)->create();
        $invoice = $this->faker->word;

        $response = $this->put(route('invoice.update', $invoice), [
            'invoice' => $invoice,
        ]);

        $response->assertRedirect(route('invoice.index'));
        $response->assertSessionHas('invoice.id', $invoice->id);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $invoice = factory(Invoice::class)->create();
        $invoice = factory(Invoice::class)->create();

        $response = $this->get(route('invoice.destroy', $invoice));

        $response->assertRedirect(route('invoice.index'));

        $this->assertDeleted($invoice);
    }
}
