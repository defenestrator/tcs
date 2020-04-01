<?php

namespace Tests\Feature\Http\Controllers;

use App\Coupon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\HttpTestAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\CouponController
 */
class CouponControllerTest extends TestCase
{
    use HttpTestAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $coupons = factory(Coupon::class, 3)->create();

        $response = $this->get(route('coupon.index'));

        $response->assertOk();
        $response->assertViewIs('coupon.index');
        $response->assertViewHas('coupons');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('coupon.create'));

        $response->assertOk();
        $response->assertViewIs('coupon.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\CouponController::class,
            'store',
            \App\Http\Requests\CouponStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $coupon = $this->faker->word;

        $response = $this->post(route('coupon.store'), [
            'coupon' => $coupon,
        ]);

        $coupons = Coupon::query()
            ->where('coupon', $coupon)
            ->get();
        $this->assertCount(1, $coupons);
        $coupon = $coupons->first();

        $response->assertRedirect(route('coupon.index'));
        $response->assertSessionHas('coupon.id', $coupon->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $coupon = factory(Coupon::class)->create();

        $response = $this->get(route('coupon.show', $coupon));

        $response->assertOk();
        $response->assertViewIs('coupon.show');
        $response->assertViewHas('coupon');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $coupon = factory(Coupon::class)->create();

        $response = $this->get(route('coupon.edit', $coupon));

        $response->assertOk();
        $response->assertViewIs('coupon.edit');
        $response->assertViewHas('coupon');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\CouponController::class,
            'update',
            \App\Http\Requests\CouponUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $coupon = factory(Coupon::class)->create();
        $coupon = $this->faker->word;

        $response = $this->put(route('coupon.update', $coupon), [
            'coupon' => $coupon,
        ]);

        $response->assertRedirect(route('coupon.index'));
        $response->assertSessionHas('coupon.id', $coupon->id);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $coupon = factory(Coupon::class)->create();
        $coupon = factory(Coupon::class)->create();

        $response = $this->get(route('coupon.destroy', $coupon));

        $response->assertRedirect(route('coupon.index'));

        $this->assertDeleted($coupon);
    }
}
