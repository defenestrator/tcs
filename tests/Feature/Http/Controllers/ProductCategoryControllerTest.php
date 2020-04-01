<?php

namespace Tests\Feature\Http\Controllers;

use App\Productcategory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\HttpTestAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\ProductCategoryController
 */
class ProductCategoryControllerTest extends TestCase
{
    use HttpTestAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $productCategories = factory(ProductCategory::class, 3)->create();

        $response = $this->get(route('productcategory.index'));

        $response->assertOk();
        $response->assertViewIs('productcategory.index');
        $response->assertViewHas('productcategories');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('productcategory.create'));

        $response->assertOk();
        $response->assertViewIs('productcategory.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ProductCategoryController::class,
            'store',
            \App\Http\Requests\ProductCategoryStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $productcategory = $this->faker->word;

        $response = $this->post(route('productcategory.store'), [
            'productcategory' => $productcategory,
        ]);

        $productCategories = Productcategory::query()
            ->where('productcategory', $productcategory)
            ->get();
        $this->assertCount(1, $productCategories);
        $productCategory = $productCategories->first();

        $response->assertRedirect(route('productcategory.index'));
        $response->assertSessionHas('productcategory.id', $productcategory->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $productCategory = factory(ProductCategory::class)->create();

        $response = $this->get(route('productcategory.show', $productCategory));

        $response->assertOk();
        $response->assertViewIs('productcategory.show');
        $response->assertViewHas('productcategory');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $productCategory = factory(ProductCategory::class)->create();

        $response = $this->get(route('productcategory.edit', $productCategory));

        $response->assertOk();
        $response->assertViewIs('productcategory.edit');
        $response->assertViewHas('productcategory');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ProductCategoryController::class,
            'update',
            \App\Http\Requests\ProductCategoryUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $productCategory = factory(ProductCategory::class)->create();
        $productcategory = $this->faker->word;

        $response = $this->put(route('productcategory.update', $productCategory), [
            'productcategory' => $productcategory,
        ]);

        $response->assertRedirect(route('productcategory.index'));
        $response->assertSessionHas('productcategory.id', $productcategory->id);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $productCategory = factory(ProductCategory::class)->create();
        $productCategory = factory(Productcategory::class)->create();

        $response = $this->get(route('productcategory.destroy', $productCategory));

        $response->assertRedirect(route('productcategory.index'));

        $this->assertDeleted($productCategory);
    }
}
