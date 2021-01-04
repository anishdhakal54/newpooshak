<?php

namespace App\Http\Livewire\Components;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class GetQuote extends Component
{
    public $firstname, $lastname, $email, $address, $category, $cat, $companyname, $user_id;
    public $categories = [];
    public $login_email, $password;
    public $enable = true;
    public $count = 5;

    //    protected $rules = [
    //        'firstname' => 'required|string',
    //        'lastname'=>'required|string',
    //        'email' => 'required|email',
    //        'address'=>'required|string',
    //        'companyname'=>'required |string'
    //
    //    ];

    public function render()
    {
        return view('livewire.components.get-quote');
    }

    public function sendquote()
    {
//        dd('test');

        //       dd( $this->user_id);
//        if (!Auth::user()) {
//            session()->flash('error', 'You need to be logged in first!');
//            return redirect(route('login'));
//        }


        foreach ($this->category as $cat) {
            if ($cat !== false) {
                array_push($this->categories, $cat);
            }
        }
        //        dd($this->user_id);

        \App\Getquote::create([
            'first_name' => $this->firstname,
            'last_name' => $this->lastname,
            'email' => $this->email,
            'company_name' => $this->companyname,
            'address' => $this->address,
            'category' => json_encode($this->categories),
            'user_id' => Auth::user()->id,
        ]);

        $notify = json_notification('success', 'Success!!!', 'We will soon contact you.', 'linecons-like');
        $this->emit('notification', $notify);
        return redirect()->to('/');
    }

    public function login()
    {


        $this->validate([
            'login_email' => 'required|max:255|email',
            'password' => 'required|max:255',
        ]);


        if (auth()->attempt(['email' => $this->login_email, 'password' => $this->password]) == false) {

            $notify = json_notification('error', 'Validation Error', 'Please check your credentials', 'linecons-exit');
            $this->emit('notification', $notify);
            $this->emit('rerenderHeader');
        } else {
            $this->count = 5;
            return redirect()->to('product/' . $this->product->slug);
        }
    }

    public function countdown()
    {
        --$this->count;
    }
}
