<?php namespace App\Http\Requests;



class CategoryRequest extends Request {

    /**
     * Правила валидации для категории
     *
     * @return array
     */
    public function rules()
    {

        return [
            'title' => 'required|max:255',
            'slug' => 'required|min:3',
        ];
    }

}