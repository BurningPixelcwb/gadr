<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
          'name'
        , 'email'
        , 'password'
        , 'sobrenome'
        , 'nascimento'
        , 'rg'
        , 'cpf'
        , 'sexo'
        , 'telefone_1'
        , 'telefone_2'
        , 'cep'
        , 'logradouro'
        , 'bairro'
        , 'cidade'
        , 'estado'
        , 'pais'
        ,
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    /* Métodos SET */
    public function setNascimentoAttribute($value) {
        $nascimento = explode('/', $value);
        $nascimento = $nascimento[2] .'-'. $nascimento[1] .'-'. $nascimento[0];
    
        $this->attributes['nascimento'] = $nascimento;
    }

    public function setRgAttribute($value) {
        $rg = str_replace('.', '', $value);
        $rg = str_replace('-', '', $rg);
        $this->attributes['rg'] = $rg;
    }

    public function setCpfAttribute($value) {
        $cpf = str_replace('.', '', $value);
        $cpf = str_replace('-', '', $cpf);
        $this->attributes['cpf'] = $cpf;
    }

    public function setTelefone1Attribute($value) {
        $telefone1 = str_replace("(", '', $value);
        $telefone1 = str_replace(')', '', $telefone1);
        $telefone1 = str_replace(' ', '', $telefone1);
        $telefone1 = str_replace('-', '', $telefone1);
        $this->attributes['telefone_1'] = $telefone1;
    }

    public function setTelefone2Attribute($value) {
        $telefone2 = str_replace("(", '', $value);
        $telefone2 = str_replace(')', '', $telefone2);
        $telefone2 = str_replace(' ', '', $telefone2);
        $telefone2 = str_replace('-', '', $telefone2);
        $this->attributes['telefone_2'] = $telefone2;
    }

    public function setCepAttribute($value) {
        $cep = str_replace('-', '', $value);
        $this->attributes['cep'] = $cep;
    }

    /* Métodos GET */
    public function getNascimentoAttribute($value) {
        $nascimento = explode('-', $value);
        $nascimento = $nascimento[2] .'/'. $nascimento[1] .'/'. $nascimento[0];
    
        return ($nascimento);
    
    }

}
