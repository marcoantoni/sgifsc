<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AgendaSala extends Model {
   	
   	protected $table = 'agenda_salas';
   	public $timestamps = false;

   	public static function getReservas($data_inicial){
   		return DB::select("SELECT agenda_salas.id, dia, TIME_FORMAT(inicio, '%H:%i') AS inicio, TIME_FORMAT(fim, '%H:%i') AS fim, salas.nome, solicitante, observacao, id_user, users.name FROM agenda_salas, salas, users WHERE id_sala = salas.id AND dia >= '$data_inicial' AND excluido = 0 AND users.id = agenda_salas.id_user ORDER BY dia ASC");
   	}
}