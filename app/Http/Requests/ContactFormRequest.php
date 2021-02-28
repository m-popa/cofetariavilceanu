<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactFormRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => 'required|max:50',
            'last_name'  => 'sometimes|max:50',
            'email'      => 'required|email',
            'subject'    => 'nullable|in:Vreau să comand un tort,Vreau să comand produse de Cofetărie,Vreau să comand produse de Patiserie,Vreau să comand produse de Gelaterie,Detalii despre livrare,Vreau să aflu mai multe informații despre alergeni,Despre altceva',
            'message'    => 'required|max:1000',
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => 'Numele este obligatoriu',
            'first_name.max'      => 'Numele nu poate depasi :max caractere',
            'last_name.max'       => 'Numele nu poate depasi :max caractere',
            'email.required'      => 'Adresa de email este invalidă',
            'email.email'         => 'Adresa de email este invalidă',
            'subject.in'          => 'Subiectul specificat nu există în listă.',
            'message.required'    => 'Mesajul este obligatoriu.',
            'message.max'         => 'Limita maximă de caractere este 400.',
        ];
    }
}
