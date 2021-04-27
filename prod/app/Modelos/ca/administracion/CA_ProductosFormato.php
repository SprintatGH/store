<?php



namespace App\Modelos\ca\administracion;



use Illuminate\Database\Eloquent\Model;



class CA_ProductosFormato extends Model

{

    protected $table = 'formatos';



    protected $fillable = [

            'id' ,'estado','nombre','created_at', 'updated_at', 'empresa_id', 'user_create_id'

    ];

}