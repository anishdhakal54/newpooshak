<?php

namespace App\Http\Livewire;

use App\Post;
use Livewire\Component;
use Livewire\WithPagination;

class Blog extends Component
{
    use WithPagination;
    public function render()
    {
        $posts = Post::orderby( 'id', 'DESC' )->paginate(12);

        return view('livewire.blog',['posts' => $posts]);
    }
    public function paginationView()
    {
        return 'partials.custom-pagination-links-view';
    }
}
