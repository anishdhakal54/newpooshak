<?php

namespace App\Http\Livewire;

use App\Comment;
use App\Post;
use Livewire\Component;

class BlogDetail extends Component
{
    public $post;
    public $comments;
    public $user_comment;
    public $count_verified_comment=0;

    public function mount($slug){
        $this->post = Post::where( 'slug', $slug )->first();
        $this->comments = $this->post->comments->where('approved',true);
    }

    public function render()
    {
        return view('livewire.blog-detail');
    }

    public function postComment(){
        $this->validate([
            'user_comment' => 'required'
        ]);
        if ( auth()->guest() ) {
            session()->flash('error', 'Comment Failed to post. You need to login first');
            return false;
        }

        $comment = new Comment();

        $comment->user_id  = auth()->id();
        $comment->post_id  = $this->post->id;
        $comment->comment  = $this->user_comment;
        $comment->approved = 1;

        $comment->save();

        session()->flash('success', 'Comment comment successfully posted.');
        $notify = json_notification('success', 'Success!!!', 'Your comment Has Reached To Us.', 'linecons-like');
        $this->emit('notification', $notify);
        $this->user_comment = "";
    }
}
