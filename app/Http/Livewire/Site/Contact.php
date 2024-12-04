<?php

namespace App\Http\Livewire\Site;

use App\Mail\NotficationsMail;
use App\Models\Contactus as ModelsContactus;
use App\Models\SettingsValues;
use App\Models\User;
use App\Notifications\createContact;
use App\Settings\SettingSingleton;
use Illuminate\Support\Facades\Notification;
use Livewire\Component;
use Illuminate\Support\Facades\Mail;

class Contact extends Component
{
    public $name,  $email, $phone,  $message;

    protected function rules() {
        return [
            'name'          => 'required|min:3',
            'email'         => 'required|email|min:3',
            'phone'        => 'required|min:3|max:12',
            'message'       => 'required|String|min:3',
        ];
    }

    public function updated($field){
        $this->validateOnly($field);
    }

    public function submitForm()
    {
  
        $data = $this->validate();
        
        $contact_us = ModelsContactus::create($data);
        $users = User::all();
        // notfication in dashboard
        Notification::send($users, new createContact($contact_us->id, $contact_us->email, $contact_us->message));
        // sending mail
        try{
            $settings  = SettingSingleton::getInstance();
            $email = $settings->getItem('mail_booking')?? 'almarwa.wagdy@gmail.com';

            Mail::to($email)->send(new NotficationsMail($data));    
        }
        catch (\Exception $e){
        }

        session()->flash('success', trans('message.site.message_sucessfully'));
        $this->clearForm();
    }
    public function clearForm()
    {
        $this->name = '';
        $this->phone = '';
        $this->email = '';
        $this->message = '';
    }

    public function render()
    {
        return view('livewire.site.contact');
    }
}
