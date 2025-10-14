<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Contact;

class ContactForm extends Component
{
    public $name, $email, $phone, $message;

    protected $rules = [
        'name'    => 'required|string|min:3',
        'email'   => 'required|email',
        'phone'   => 'nullable|string|max:30',
        'message' => 'required|string|min:5',
    ];

    public function submit()
    {
        $this->validate();
        Contact::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'message' => $this->message,
        ]);

        $this->reset(['name','email','phone','message']);
        session()->flash('success', 'Pesan terkirim. Santai, kami baca kok.');
    }

    public function render()
    {
        return view('livewire.contact-form');
    }
}
