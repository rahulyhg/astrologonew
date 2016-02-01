<?php namespace App\Http\Requests;

use App\Models\Category;

class CategoryRequest extends Request {

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        return [
            'title' => 'required|max:255',
            'slug' => 'required|unique:categories|min:3',
        ];
    }

}