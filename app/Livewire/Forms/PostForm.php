<?php

namespace App\Livewire\Forms;

use App\Models\Post;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class PostForm extends Form
{
    public ?Post $post = null;
    public string $title = '';
    public string $content = '';

    protected function rules()
    {
        return[
            'title' => [
                'required',
                'string',
                'min:3',
                'max:255',
                Rule::unique('posts', 'title')->ignore($this->post),
            ],
            'content' => 'required|min:3'
        ];
    }

    public function setPost(Post $post)
    {
        $this->post = $post;
        $this->title = $post->title;
        $this->content = $post->content;
    }
    public function store()
    {
        $this->validate();
        Post::create(
            $this->only(['title', 'content'])
        );
        $this->reset();
    }

    public function update()
    {
        $this->validate();
        $this->post->update(
            $this->only(['title', 'content'])
        );
    }

}
