<?php

namespace Tests\Feature\Http\Controllers;

use App\Tag;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\HttpTestAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\TagController
 */
class TagControllerTest extends TestCase
{
    use HttpTestAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $tags = factory(Tag::class, 3)->create();

        $response = $this->get(route('tag.index'));

        $response->assertOk();
        $response->assertViewIs('tag.index');
        $response->assertViewHas('tags');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('tag.create'));

        $response->assertOk();
        $response->assertViewIs('tag.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\TagController::class,
            'store',
            \App\Http\Requests\TagStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $tag = $this->faker->word;

        $response = $this->post(route('tag.store'), [
            'tag' => $tag,
        ]);

        $tags = Tag::query()
            ->where('tag', $tag)
            ->get();
        $this->assertCount(1, $tags);
        $tag = $tags->first();

        $response->assertRedirect(route('tag.index'));
        $response->assertSessionHas('tag.id', $tag->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $tag = factory(Tag::class)->create();

        $response = $this->get(route('tag.show', $tag));

        $response->assertOk();
        $response->assertViewIs('tag.show');
        $response->assertViewHas('tag');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $tag = factory(Tag::class)->create();

        $response = $this->get(route('tag.edit', $tag));

        $response->assertOk();
        $response->assertViewIs('tag.edit');
        $response->assertViewHas('tag');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\TagController::class,
            'update',
            \App\Http\Requests\TagUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $tag = factory(Tag::class)->create();
        $tag = $this->faker->word;

        $response = $this->put(route('tag.update', $tag), [
            'tag' => $tag,
        ]);

        $response->assertRedirect(route('tag.index'));
        $response->assertSessionHas('tag.id', $tag->id);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $tag = factory(Tag::class)->create();
        $tag = factory(Tag::class)->create();

        $response = $this->get(route('tag.destroy', $tag));

        $response->assertRedirect(route('tag.index'));

        $this->assertDeleted($tag);
    }
}
