<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class UpdateSettingFeature extends Component
{
    public $featured ;
//    public $locale;
    public $model;

    public function mount($featured = null , $model = null) // to pass a parameter inside livewire blade compoonent
    {
        $this->model = $model;

        $this->featured = $featured;

         $this->featured = $model->featured ?? '';

    }


    public function updatefeaturd(){
        $this->featured =  $this->featured;
    }




//    public function updateSlug()
//    {
//        $this->slug = $this->generateArabicSlug($this->title);
//    }

//    private function generateArabicSlug($string)
//    {
//        $string = $this->normalizeArabic($string);
//        $string = preg_replace('/[^\p{L}\p{N}\s]/u', '-', $string);
//        $string = preg_replace('/[-\s]+/', '-', $string);
//        $string = trim($string, '-');
//        return strtolower($string);
//    }
//
//    private function normalizeArabic($string)
//    {
//        $string = str_replace(['ـ'], '', $string); // Remove Arabic tatweel
//        $string = preg_replace('/\s+/', ' ', $string);
//        return $string;
//    }

    //    /***********************saving method********************/
    public function save()
    {
         // Validate input if needed
        $this->validate([
//            'i' => 'required|string|max:255',
            'featured' => 'nullable|integer|max:1|min:0',
        ]);

        // Save or update the model
        if ($this->model) {

            $this->model->featured = $this->featured;
            $this->model->save();
        } else {
            // Logic to create a new model instance if $this->model is not set
        }

        // Optionally set a success message or redirect
        $this->message = 'Data saved successfully!';
    }
//    /***********************saving method********************/



    public function render()
    {
        return view('livewire.admin.update-setting-feature');
    }
}
