<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentApplicationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nama_lengkap' => ['required', 'string', 'max:150'],
            'nisn' => ['nullable', 'string', 'max:20'],
            'jenis_kelamin' => ['required', 'in:L,P'],
            'tempat_lahir' => ['required', 'string', 'max:100'],
            'tanggal_lahir' => ['required', 'date'],
            'alamat' => ['required', 'string'],
            'nama_ortu' => ['required', 'string', 'max:150'],
            'no_hp' => ['required', 'string', 'max:20'],
            'email' => ['nullable', 'email', 'max:150'],
            'asal_sekolah' => ['nullable', 'string', 'max:150'],
            'dokumen_kk' => ['nullable', 'file', 'mimes:pdf,jpg,jpeg,png', 'max:3072'],
            'dokumen_akte' => ['nullable', 'file', 'mimes:pdf,jpg,jpeg,png', 'max:3072'],
            'pas_foto' => ['nullable', 'file', 'mimes:jpg,jpeg,png', 'max:3072'],
            'foto_ijazah' => ['nullable', 'file', 'mimes:jpg,jpeg,png', 'max:3072'],
        ];
    }
}
