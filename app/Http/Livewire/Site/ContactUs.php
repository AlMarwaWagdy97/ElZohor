<?php

namespace App\Http\Livewire\Site;

use App\Mail\NotficationsMail;
use App\Models\Contactus as ModelsContactus;
use App\Models\SettingsValues;
use App\Models\User;
use App\Notifications\createContact;
use Illuminate\Support\Facades\Notification;
use Livewire\Component;
use Illuminate\Support\Facades\Mail;

class ContactUs extends Component
{
    public $name,  $email, $mobile,  $message;

    protected function rules() {
        return [
            'name'          => 'required|min:3',
            'email'         => 'required|email|min:3',
            'mobile'        => 'required|min:3|max:12',
            'message'       => 'required|String|min:3',
        ];
    }

    public function updated($field){
        $this->validateOnly($field);
    }

    public function sendForm()
    {
        $data = $this->validate();
        
        $contact_us = ModelsContactus::create($data);
        $users = User::all();
        // notfication in dashboard
        Notification::send($users, new createContact($contact_us->id, $contact_us->email, $contact_us->message));
        // sending mail
        $email = @SettingsValues::where('key' , 'mail_booking')->first()->value ?? 'almarwa.wagdy@gmail.com';
        Mail::to($email)->send(new NotficationsMail($data));

        session()->flash('success', trans('message.site.message_sucessfully'));
        $this->clearForm();
    }
    public function clearForm()
    {
        $this->name = '';
        $this->mobile = '';
        $this->email = '';
        $this->message = '';
    }

    public function render()
    {
        return view('livewire.site.contact-us');
    }
}
