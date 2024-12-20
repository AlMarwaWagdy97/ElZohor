<?php

namespace App\Http\Requests\Admin;
use Locale;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class SliderStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function attributes(){
        $attr = [];

        foreach (config('translatable.locales') as $locale) {
            $attr += [$locale . '.title' => 'Title ' . Locale::getDisplayName($locale) ];
            $attr += [$locale . '.slug' => 'Slug '. Locale::getDisplayName($locale) ];
            $attr += [$locale . '.description' => 'Description '. Locale::getDisplayName($locale) ];
        
        }
            $attr +=['image' =>'Image'];
            $attr += ['sort' =>'Sort'];
            $attr += ['status' =>'Status'];
            return $attr;
        }

        public function rules()
        {
          
            $req = [];
            foreach(config('translatable.locales') as $locale){
                $req += [$locale . '.title' => 'nullable'];
                $req += [$locale . '.slug' => 'nullable'];
                $req += [$locale . '.sub_title' => 'nullable'];
                $req += [$locale . '.sub_description' => 'nullable'];
                $req += [$locale . '.description' => 'nullable'];
            }
            $this->isMethod('POST') ? 
                $req += ['image' =>'required|mimes:jpeg,png,jpg,gif,svg,mp4,webm|max:20000']
             : 
                $req += ['image' =>'nullable|mimes:jpeg,png,jpg,gif,svg,mp4,webm|max:20000']
            ;
           
            $req += ['sort' =>'nullable'];
            $req += ['url' =>'nullable'];
            $req += ['status' =>'nullable'];
            $req += ['updated_by' =>'nullable'];
            $req += ['created_by' =>'nullable'];
    
    
            return $req;
        }

    public function getSanitized(){

        $data = $this->validated();   
        $data['status'] = isset($data['status']) ? true : false;
        foreach (config('translatable.locales') as $locale) {
            $data[$locale]['slug'] = slug($data[$locale]['title']);
        }
        if(!isset($data['url'])) $data['url'] = "javascript:void(0)";
        $data['status'] = isset($data['status']) ? true : false;

        if (request()->isMethod('PUT')){
            $data['updated_by']  = @Auth::user()->id;
        }
        else{
            $data['created_by']  = @Auth::user()->id;
        }
        return $data;
    }



}
