<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aula extends Model
{
    use HasFactory;
    public function administrador(){
        return $this->belongsTo(Administrador::class,'id_administrador');
    }

    protected $buscable = ['capacidad','codigo','tipo','caracteristicas','ubicacion','imagen'];

    public static function search($buscar='', $caracteristicas='', $tipo='', $rangeDown='', $rangeUp=''){

        if($buscar){
            if($caracteristicas){
                if($tipo){
                    if($rangeDown && $rangeUp){
                        return $aulas = self::where('capacidad', '<=', $rangeUp)
                        ->where('capacidad', '>=', $rangeDown) 
                        ->where('caracteristicas', 'like', "%$caracteristicas%")
                        ->Where('tipo', 'like', "%$tipo%")
                        ->where('codigo', 'like', "%$buscar%")
                        ->orWhere('ubicacion', 'like', "%$buscar%")
                        ->get();
                    }else{
                        return $aulas = self::where('caracteristicas', 'like', "%$caracteristicas%")
                        ->Where('tipo', 'like', "%$tipo%")
                        ->where('codigo', 'like', "%$buscar%")
                        ->orWhere('ubicacion', 'like', "%$buscar%")
                        ->get();
                    }
                }else{
                    if($rangeDown && $rangeUp){
                        return $aulas = self::where('capacidad', '<=', $rangeUp)
                        ->where('capacidad', '>=', $rangeDown) 
                        ->where('caracteristicas', 'like', "%$caracteristicas%")
                        ->where('codigo', 'like', "%$buscar%")
                        ->orWhere('ubicacion', 'like', "%$buscar%")
                        ->get();
                    }else{
                        return $aulas = self::where('caracteristicas', 'like', "%$caracteristicas%")
                        ->where('codigo', 'like', "%$buscar%")
                        ->orWhere('ubicacion', 'like', "%$buscar%")
                        ->get();
                    }
                }
            }else{
                if($tipo){
                    if($rangeDown && $rangeUp){
                        return $aulas = self::where('capacidad', '<=', $rangeUp)
                        ->where('capacidad', '>=', $rangeDown)
                        ->Where('tipo', 'like', "%$tipo%")
                        ->where('codigo', 'like', "%$buscar%")
                        ->orWhere('ubicacion', 'like', "%$buscar%")
                        ->get();
                    }else{
                        return $aulas = self::Where('tipo', 'like', "%$tipo%")
                        ->where('codigo', 'like', "%$buscar%")
                        ->orWhere('ubicacion', 'like', "%$buscar%")
                        ->get();
                    }
                }else{
                    if($rangeDown && $rangeUp){
                        return $aulas = self::where('capacidad', '<=', $rangeUp)
                        ->where('capacidad', '>=', $rangeDown)
                        ->where('codigo', 'like', "%$buscar%")
                        ->orWhere('ubicacion', 'like', "%$buscar%")
                        ->get();
                    }else{
                        return $aulas = self::where('codigo', 'like', "%$buscar%")
                        ->orWhere('ubicacion', 'like', "%$buscar%")
                        ->get();
                    }
                }
            }
        }else{
            if($caracteristicas){
                if($tipo){
                    if($rangeDown && $rangeUp){
                        return $aulas = self::where('capacidad', '<=', $rangeUp)
                        ->where('capacidad', '>=', $rangeDown) 
                        ->where('caracteristicas', 'like', "%$caracteristicas%")
                        ->Where('tipo', 'like', "%$tipo%")
                        ->get();
                    }else{
                        return $aulas = self::where('caracteristicas', 'like', "%$caracteristicas%")
                        ->Where('tipo', 'like', "%$tipo%")
                        ->get();
                    }
                }else{
                    if($rangeDown && $rangeUp){
                        return $aulas = self::where('capacidad', '<=', $rangeUp)
                        ->where('capacidad', '>=', $rangeDown) 
                        ->where('caracteristicas', 'like', "%$caracteristicas%")
                        ->get();
                    }else{
                        return $aulas = self::where('caracteristicas', 'like', "%$caracteristicas%")
                        ->get();
                    }
                }
            }else{
                if($tipo){
                    if($rangeDown && $rangeUp){
                        return $aulas = self::where('capacidad', '<=', $rangeUp)
                        ->where('capacidad', '>=', $rangeDown)
                        ->Where('tipo', 'like', "%$tipo%")
                        ->get();
                    }else{
                        return $aulas = self::where('tipo', 'like', "%$tipo%")
                        ->get();
                    }
                }else{
                    if($rangeDown && $rangeUp){
                        return $aulas = self::where('capacidad', '<=', $rangeUp)
                        ->where('capacidad', '>=', $rangeDown)
                        ->get();
                    }else{
                        return response()->json([               
                            'Respuesta' => 0
                        ], 505); ;
                    }
                }
            }
        }
    }

}
