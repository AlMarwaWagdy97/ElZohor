<?php

namespace App\Http\Livewire\Site;

use App\Models\Blog;
use App\Models\BlogTranslation;
use App\Models\JopApplication;
use App\Traits\FileHandler;
use Livewire\Component;
use Livewire\WithFileUploads;

class ApplyComponent extends Component
{
    use WithFileUploads;
    use FileHandler;

    public $career_id;

    public function __construct($career_id)
    {
        $this->career_id = $career_id;
    }

    public $name;
    public $email;
    public $mobile;
    public $address;
    public $file;

    public function store()
    {

        $this->validate([
            'name' => 'required|min:4|string',
            'email' => 'nullable|email',
            'mobile' => 'required|string|min:11|max:11',
            'address' => 'required|min:4|string|max:800',
            'file' => 'required|file',


        ]);

        $m = JopApplication::create([
            'name' => $this->name,
            'email' => $this->email,
            'mobile' => $this->mobile,
            'address' => $this->address,
            'file' => $this->upload_file($this->file, '/cvs', 1),

            'career_id' => (int)$this->career_id,


        ]);
        session()->flash('success', 'application sent successfully.');
        $this->reset('name', 'email', 'mobile', 'address', 'file');

    }


    public function render()
    {
        return view('livewire.site.apply-component');
    }
}
