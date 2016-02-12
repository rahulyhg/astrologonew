<?php namespace App\Http\Requests;

class ContactsRequest extends Request {

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

    public function authorize()
    {
        //return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|max:100|min:3',
            'email' => 'required|email',
            'message' => 'required|max:1000',
            'g-recaptcha-response' => 'captcha' //required|captcha
        ];
    }


    public function attributes(){
        return [
            'message' => 'Сообщение',
            'name' => 'Имя',
        ];
    }

    public function messages()
    {
        return [
           // 'name.required'=>'Do not forget your name',
         //   'description.required'=>'You need the description',
         //   'name.max'=>'Your name have less than 5 letters?',
        ];
    }



}
