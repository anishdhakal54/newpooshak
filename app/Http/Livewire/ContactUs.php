<?php

namespace App\Http\Livewire;

use App\Contact;
use Livewire\Component;
use Mail;

class ContactUs extends Component
{
    public $name, $email, $message, $subject,$phone;

    public function updated($field)
    {
        $this->validateOnly($field, [
            'email' => 'required|email',
            'name' => 'required',
            'phone' => 'required',
            'subject' => 'required',
            'message' => 'required'
        ]);
    }

    public function render()
    {
        return view('livewire.contact-us');
    }

    public function insertContact()
    {
        $this->validate([
            'email' => 'required|max:255|email',
            'name' => 'required',
            'phone' => 'required',
            'subject' => 'required',
            'message' => 'required'
        ]);
        $newRequest = new Contact();
        $newRequest->name = $this->name;
        $newRequest->email = $this->email;
        $newRequest->subject = $this->subject;
        $newRequest->phone = $this->phone;
        $newRequest->message = $this->message;

        $newRequest->save();
        $data = [
            'name' => $this->name,
            'email' => $this->email,
            'subject' => $this->subject,
            'message' => $this->message,
            'phone' => $this->phone,
        ];
        $this->reset();

        $notify = json_notification('success', 'Success!!!', 'Your message Has Reached To Us.We Well Contact You Very Soon.', 'linecons-like');
        $this->emit('notification', $notify);
        session()->flash('success', 'Thanks for contacting us');


//        Mail::to($this->email)->send(new \App\Mail\UserMessage($data));
    }
}
