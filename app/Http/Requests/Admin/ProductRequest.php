<?php

namespace App\Http\Requests\Admin;

use Locale;
use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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

    public function attributes()
    {
        $attr = [];
        foreach (config('translatable.locales') as $locale) {
            $attr += [$locale . '.name' => 'Name ' . Locale::getDisplayName($locale)];
            $attr += [$locale . '.slug' => 'Slug ' . Locale::getDisplayName($locale)];
            $attr += [$locale . '.description' => 'Description ' . Locale::getDisplayName($locale)];
            $attr += [$locale . '.meta_title' => 'Meta title ' . Locale::getDisplayName($locale)];
            $attr += [$locale . '.meta_description' => 'Meta description ' . Locale::getDisplayName($locale)];
            $attr += [$locale . '.meta_key' => 'Meta key ' . Locale::getDisplayName($locale)];
        }
        $attr += ['image' => 'Image'];
        $attr += ['sort' => 'Sort'];
        $attr += ['feature' => 'Fearure'];
        $attr += ['status' => 'Status'];
        $attr += ['back_ground_color' => 'Back Ground Color'];

        return $attr;
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $req = [];
        foreach (config('translatable.locales') as $locale) {
            $req += [$locale . '.name' => 'required'];
            $req += [$locale . '.description' => 'nullable'];
            $req += [$locale . '.slug' => 'required'];
            $req += [$locale . '.meta_title' => 'nullable'];
            $req += [$locale . '.meta_description' => 'nullable'];
            $req += [$locale . '.meta_key' => 'nullable'];
        }
        $req += ['image' => 'nullable|'. ImageValidate()];
        $req += ['status' => 'nullable'];
        $req += ['sort' => 'nullable'];
        $req += ['feature' => 'nullable'];
        $req += ['category_id' => 'required'];
        $req += ['back_ground_color' => 'nullable|string'];





        return $req;
    }

    public function getSanitized()
    {

        $data = $this->validated();

        $data['status'] = isset($data['status']) ? true : false;
        $data['feature'] = isset($data['feature']) ? true : false;
        foreach (config('translatable.locales') as $locale) {
            $data[$locale]['slug'] = slug($data[$locale]['slug']);
        }
        if (request()->isMethod('PUT')) {
            $data['updated_by']  = @auth()->user()->id;
        } else {
            $data['created_by']  = @auth()->user()->id;
        }
        return $data;
    }
}
