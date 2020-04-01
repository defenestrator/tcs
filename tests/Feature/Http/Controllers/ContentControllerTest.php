<?php

namespace Tests\Feature\Http\Controllers;

use App\Content;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\HttpTestAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\ContentController
 */
class ContentControllerTest extends TestCase
{
    use HttpTestAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $contents = factory(Content::class, 3)->create();

        $response = $this->get(route('content.index'));

        $response->assertOk();
        $response->assertViewIs('content.index');
        $response->assertViewHas('contents');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('content.create'));

        $response->assertOk();
        $response->assertViewIs('content.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ContentController::class,
            'store',
            \App\Http\Requests\ContentStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $content = $this->faker->word;

        $response = $this->post(route('content.store'), [
            'content' => $content,
        ]);

        $contents = Content::query()
            ->where('content', $content)
            ->get();
        $this->assertCount(1, $contents);
        $content = $contents->first();

        $response->assertRedirect(route('content.index'));
        $response->assertSessionHas('content.id', $content->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $content = factory(Content::class)->create();

        $response = $this->get(route('content.show', $content));

        $response->assertOk();
        $response->assertViewIs('content.show');
        $response->assertViewHas('content');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $content = factory(Content::class)->create();

        $response = $this->get(route('content.edit', $content));

        $response->assertOk();
        $response->assertViewIs('content.edit');
        $response->assertViewHas('content');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ContentController::class,
            'update',
            \App\Http\Requests\ContentUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $content = factory(Content::class)->create();
        $content = $this->faker->word;

        $response = $this->put(route('content.update', $content), [
            'content' => $content,
        ]);

        $response->assertRedirect(route('content.index'));
        $response->assertSessionHas('content.id', $content->id);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $content = factory(Content::class)->create();
        $content = factory(Content::class)->create();

        $response = $this->get(route('content.destroy', $content));

        $response->assertRedirect(route('content.index'));

        $this->assertDeleted($content);
    }
}
