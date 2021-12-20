<?php

namespace Modules\User\Services;

use Modules\User\Entities\Post;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\File;

class PostService
{
    use WithFileUploads;

    public $groupId;
    public $title;
    public $content;
    public $image;

    public function createPost()
    {
        $post = Post::create(
            [
                'title'             => $this->title,
                'content'           => $this->content,
                'image'             => $this->image,
                'group_id'          => $this->groupId
            ]);

        return response()->json([
            'success'       => ($post) ? true : false,
            'message'       => ($post) ? 'Post created successfully' : 'Post Failed created',
        ]);
    }

    public function updatePost(Post $post)
    {
        $post->update([
                'title'             => $this->title,
                'content'           => $this->content,
                'image'             => ($this->image??$post->image)
        ]);

        return response()->json([
            'success'       => ($post) ? true : false,
            'message'       => ($post) ? 'Post updated successfully' : 'Post Failed updated',
        ]);
    }

    public function setGroupId($groupId)
    {
        $this->groupId = $groupId;
        return $this;
    }

    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }

    public function setImage($image)
    {
        if($image)
        {
            $this->image = $image->store('/','post_images');
        }

        return $this;
    }

    public function updateImage($image , $old) {
        if($image)
        {
            $this->image = $image->store('/','post_images');
            if($old)
            {
                File::delete('assets/images/posts'. $old);
            }
        }
        return $this;
    }

}
