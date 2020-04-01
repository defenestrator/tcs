<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;

class NewContent
{
    use SerializesModels;

    public $content;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($content)
    {
        $this->content = $content;
    }
}
