<?php
/**
 * Application model for Cake.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Model
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Model', 'Model');

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 */
class AppModel extends Model {
	var $stdBasic = array('AC'=>'Activo', 'DE'=>'desactivo', 'EL'=>'Eliminado');
	var $dateFormatDbPostgres = 'Y-m-d H:i:s';
	var $dateFormatView = 'd/m/Y';
	
	/**
	 * AUTOR: VENTURA RUEDA, JOSE ANTONIO
	 * @param object $date
	 * @param object $formatSend [optional]
	 * @param object $separator [optional]
	 * @return 
	 */
	function getDateFormatDB($date, $formatSend='dmY', $separator='/', $now=0){
		if(!empty($now)) return date($this->dateFormatDbPostgres);
		$date = substr($date, 0,10);
		
		switch($formatSend){
			case 'Ymd': list($year, $mon, $day) = explode("$separator", $date);		break;
			case 'mdY': list($mon, $day, $year) = explode("$separator", $date);		break;
			case 'dmY': list($day, $mon, $year) = explode("$separator", $date);		break;		
		}	
		
		$date = mktime(0, 0, 0, $mon, $day, $year);
		return date(substr($this->dateFormatDbPostgres,0,5), $date);
	}
	
	/**
	 * AUTOR: VENTURA RUEDA, JOSE ANTONIO
	 * @param object $date
	 * @param object $formatSend [optional]
	 * @param object $separator [optional]
	 * @return 
	 */
	function getDateFormatView($date, $formatSend='Ymd', $separator='-'){
		if(empty($date) || $date == null) return "";
		$date = substr($date, 0,10);
		
		switch($formatSend){
			case 'Ymd': list($year, $mon, $day) = explode("$separator", $date);		break;
			case 'mdY': list($mon, $day, $year) = explode("$separator", $date);		break;
			case 'dmY': list($day, $mon, $year) = explode("$separator", $date);		break;		
		}	
		
		$date = mktime(0, 0, 0, $mon, $day, $year);
		return date(substr($this->dateFormatView,0,5), $date);
	}
	
	/**
	 * AUTOR: VENTURA RUEDA, JOSE ANTONIO
	 * @param object $date
	 * @param object $formatSend [optional]
	 * @param object $separator [optional]
	 * @return 
	 */
	function getDateFormatViewHours($date, $formatSend='Ymd', $separator='-'){
		if(empty($date) || $date == null) return "";
		$hour = substr($date, 10);
		$date = substr($date, 0,10);
		switch($formatSend){
			case 'Ymd': list($year, $mon, $day) = explode("$separator", $date);		break;
			case 'mdY': list($mon, $day, $year) = explode("$separator", $date);		break;
			case 'dmY': list($day, $mon, $year) = explode("$separator", $date);		break;		
		}	
		
		$date = mktime(0, 0, 0, $mon, $day, $year);
		return date(sprintf("%s H:i",substr($this->dateFormatView,0,5)), $date);
	}
	
	function fecha_Mysql_Php($date){
		return $this->getDateFormatView($date);	
	}
	
	function fechaMayorQue($dFecIni, $dFecFin){
		$dFecIni = date('d-m-Y',strtotime($dFecIni));
		$dFecFin = date('d-m-Y',strtotime($dFecFin));
		
		$dFecIni = strtotime($dFecIni);
		$dFecFin = strtotime($dFecFin);
		
		if($dFecIni>=$dFecFin) return true;
		else return false;
	}
	
	/**
	 * FUNCION QUE NOS ARMA LA CONDICION DE BUSQUEDA
	 * @author VENTURA RUDA, JOSE ANTONIO
	 * @param object $fechaInicial [optional]
	 * @param object $fechaFinal [optional]
	 * @param object $field [optional]
	 * @return Array condiciones de busqueda
	 * @version 0.2 2012-02-29 13:12
	 */
	function _condicionFecha($fechaInicial = null, $fechaFinal = null, $field = null, $key='100') {
		if(empty($fechaInicial) && empty($fechaFinal)) return array();
		
		if(!empty($fechaInicial)) $fechaInicial = $this->getDateFormatDB($fechaInicial).' 00:00:00';
		if(!empty($fechaFinal)) $fechaFinal = $this->getDateFormatDB($fechaFinal).' 23:59:59';
		
		// armamos la condicion por fecha
		if(!empty($fechaInicial) || !empty($fechaFinal)) {
			if(!empty($fechaInicial) && !empty($fechaFinal)) $conditions = array($key=>"$field BETWEEN '$fechaInicial' AND '$fechaFinal'");
			else $conditions = !empty($fechaInicial) ? array($key=>"$field >= '$fechaInicial'") : array($key=>"$field <= '$fechaFinal'");
		}
		return empty($conditions) ? array() : $conditions;
	}
	
	/**AUTOR: VENTURA RUEDA, JOSE ANTONIO
	 * 
	 * @param object $date_a	fecha a comparar
	 * @param object $date_b	fecha a comparar
	 * @param object $changeDate [optional]  {true,false}  si se pone a formato de DB
	 * @return 
	 */
	function compareDate($date_a, $date_b, $compare= "=", $changeDate = true){
		if($changeDate){
			$date_a = $this->getDateFormatDB($date_a).substr($date_a, 11);
			$date_b = $this->getDateFormatDB($date_b).substr($date_b, 11);
		}
		$compare = $this->query("SELECT '$date_a' $compare '$date_b'  as compare");

		return $compare[0][0]['compare'];
	}
	
	/**
	 * retorna el numero de dia de la semana de una determinada fecha
	 * @param object $fecha
	 * @return int semana
	 * autor: Ronald Tineo
	 */
	function getNumOfDayOfWeek($fecha){
		$sql = "select extract(dow from to_timestamp('$fecha', 'YYYY-MM-DD')) as dow";
		$week = $this->query($sql);
		return $week[0][0]['dow'];
	}	
	/**
	 * retorna la semana de una determinada fecha
	 * @param object $fecha
	 * @return int semana
	 * autor: Ronald Tineo
	 */
	function getNumOfWeek($fecha){
		$sql = "select extract(week from to_timestamp('$fecha', 'YYYY-MM-DD')) as week";
		$week = $this->query($sql);
		return $week[0][0]['week'];
	}
	/**
	 * devuelve la suma de 2 inervalos de tiempo postgres
	 * @param object $inteval1
	 * @param object $interval2
	 * @return interval
	 * @autor Ronald Tineo
	 */
	function getSumIntervalTwoIntervals($inteval1,$interval2){
		$sql = "select (interval '$inteval1' + interval '$interval2') as interval";
		$interval = $this->query($sql);
		return $interval['0']['0']['interval'];
		
	}
	/**
	 * devuelve la diferencia de 2 inervalos de tiempo postgres
	 * @param object $inteval1
	 * @param object $interval2
	 * @return interval
	 * @autor Ronald Tineo
	 */
	function getDifIntervalTwoIntervals($inteval1,$interval2){
		$sql = "select (interval '$inteval1' - interval '$interval2') as interval";
		$interval = $this->query($sql);
		return $interval['0']['0']['interval'];
		
	}	
	/**
	 * Devuelve la cantidad de sabados y domingos entre dos fechas
	 * @param object $date1 [optional]
	 * @param object $date2 [optional]
	 * @param object $delimiter [optional]
	 * @return int cantidad de sabados y domingos
	 * @author Jorge G. Trujillo V.
	 * @version 0.1 2012-04-27 12:00
	 */
	function getCantSabDomBetweenTwoDates($date1 = null, $date2 = null, $delimiter = '/') {
		if(!$date1 || !$date2) {
			return false;
		}
		$cant_sab = 0;
		$cant_dom = 0;
		$date1 = str_replace($delimiter, '-', $date1);
		$date2 = str_replace($delimiter, '-', $date2);
		
		do {
			// se obtiene el dia de la semana
			$dow = $this->getDayOfWeekFromDate($date1);
			switch($dow) {
				case 6: // sabado
						$cant_sab++;
						break;
				case 0: // domingo
						$cant_dom++;
						break;
			}
			
			// se incrementa un dia a la fecha inicial
			$date1 = $this->addIntervalToTimestamp("1 day", $date1, 'DD-MM-YYYY');
		} while($date1 != $date2);
		
		return ($cant_sab + $cant_dom);
	}
	
	/**
	 * Devuelve el indice del dia de la semana
	 * @example array(
	 * 	0 => 'Domingo', 
	 * 	1 => 'Lunes', 
	 * 	2 => 'Martes', 
	 * 	3 => 'Miercoles', 
	 * 	4 => 'Jueves', 
	 * 	5 => 'Viernes', 
	 * 	6 => 'Sabado'
	 * )
	 * @param object $date [optional]
	 * @param object $delimiter [optional]
	 * @return 
	 */
	function getDayOfWeekFromDate($date = null, $delimiter = '/') {
		if(!$date) {
			return -1;
		}
		$date = str_replace($delimiter, '-', $date);
		
		$sql = "select extract(dow from '$date'::date) as dow";
		$dow = $this->query($sql);
		return $dow['0']['0']['dow'];
	}
	
	/**
	 * Devuelve el intervalo de tiempo entre dos fechas
	 * @param object $date1 [optional]
	 * @param object $date2 [optional]
	 * @param object $delimiter [optional]
	 * @return string intervalo diferencial
	 * @author Jorge G. Trujillo V.
	 * @version 0.1 2012-04-24 11:13
	 */
	function getIntervalBetweenTwoDates($date1 = null, $date2 = null, $delimiter = '/') {
		if(!$date1 || !$date2) {
			return false;
		}
		$date1 = str_replace($delimiter, '-', $date1);
		$date2 = str_replace($delimiter, '-', $date2);
		
		$sql = "select (to_timestamp('$date2', 'DD-MM-YYYY') - to_timestamp('$date1', 'DD-MM-YYYY')) as interval";
		$interval = $this->query($sql);
		return $interval['0']['0']['interval'];
	}
	
	/**
	 * Devuelve el resultado de agregar un intervalo de tiempo a una fecha y hora
	 * @param object $interval [optional]
	 * @param object $timestamp [optional]
	 * @return string nueva fecha y hora
	 * @author Jorge G. Trujillo V.
	 * @version 0.1 2012-04-23 17:59
	 */
	function addIntervalToTimestamp($interval = null, $timestamp = null, $timestamp_format = "YYYY-MM-DD HH24:MI:SS") {
		if(!$interval || !$timestamp) {
			return false;
		}
		
		$sql = "select to_char((TIMESTAMP '$timestamp' + INTERVAL '$interval'), '$timestamp_format') as new_timestamp";
		$new_timestamp = $this->query($sql);
		$new_timestamp = str_replace("/", "-", $new_timestamp['0']['0']['new_timestamp']);
		return $new_timestamp;
	}
	/**
	 * Devuelve el resultado de agregar un intervalo de tiempo a una fecha y hora
	 * @param object $interval [optional]
	 * @param object $timestamp [optional]
	 * @return string nueva fecha y hora
	 * @author Jorge G. Trujillo V.
	 * @version 0.1 2012-04-23 17:59
	 */
	
	function addIntervalToTimestampWithHour($interval = null, $timestamp = null,$timestamphour = null, $timestamp_format = "YYYY-MM-DD HH24:MI:SS") {
		if(!$interval || !$timestamp || !$timestamphour) {
			return false;
		}
		$timestampunico = date('Y-m-d',strtotime($timestamp)).' '.date('H:i:s',strtotime($timestamphour));
		
		$sql = "select to_char((TIMESTAMP '$timestampunico' + INTERVAL '$interval'), '$timestamp_format') as new_timestamp";
		$new_timestamp = $this->query($sql);
		$new_timestamp = str_replace("/", "-", $new_timestamp['0']['0']['new_timestamp']);
		return $new_timestamp;
	}	
	/***
	 * autor: abel
	 * descripcion: obtiene la fecha actual de la BD
	 * @param 
	 * @return 
	 */
	function fechaHoraActual($solaDate=false){
		$sql=	$solaDate?"SELECT CURDATE() as fecha":"SELECT now() as fecha";
		$fechaHoraActual = $this->query($sql);
		$fechaHoraActual = str_replace("/", "-", $fechaHoraActual['0']['0']['fecha']);
		return $fechaHoraActual;
	}

	/***
	 * autor:abel
	 * descripcion: convierte a numeros una cadena
	 * @param object $str cadena
	 * @return 
	 */	
	function convertirEnNumero($str){
	  $legalChars = "%[^0-9\-\. ]%";	
	  $str=preg_replace($legalChars,"",$str);
	  return $str;
	}
	
	function constantesUtilizar(){
		return array('Tqctipodocumento'=>array(	'tqcordenformulacion_id'=>26,
												'tqcordenenvasado_id'=>27,
												'tqcnotaingreso_id'=>19,
												'tqcvalesalida_id'=>2,
												'tqcguiaremision_id'=>24,
												'tqcguiaremisioncontrointerno_id'=>3,
												'tqcnotacredito_id'=>4,
												'tqcnotadebito_id'=>5,
												'tqcdevolucion_id' =>6,  //Solicitud nota credito
												'tqcfactura_id'=>13,
												'tqcconsignacion_id'=>1),
					'Tqctipo'=>array('tqcproductoterminado_id'=>1, 
									'tqctipogranel_id'=>9, 
									'tqctipoinsumo_id'=>2),
					'Tqctipoprocesamiento'=>array('tqcprocesamientoenvasado_id'=>2),
					'Tqctipodevolucion'=>array('tqcdocumentacion_id'=>1,
												'tqcdevolucion_id'=>2,
												'tqcsindespacho_id'=>3,
												'tqctransferencia_id'=>4,
												'tqcrefacturacion_id'=>5),
					'Tqcproveedor'=>array('tqc_codigo'=>'99999'),
					'Tqcmotivo'=>array('tqcguiatrasladoalmacen_id'=>24,		
									 	'tqcordenformulacion_id'=>12,
										'tqcordenenvasado_id'=>11,
										'tqcvalesalida_id'=>26,
										'tqcdevolucion_id'=>10,
										'tqcordencompra_id'=>1),
					'Tqcordenenvasado'=>array('tipo_reenvasado'=>'R', 'tipo_formulacion'=>'F', 'tipo_insumo'=>'I',
												'estado_emitido'=>0, 'estado_entregandose'=>1, 'estado_enProceso'=>6, 'estado_paraEnvasar'=>2, 
												'estado_parcialmenteEntregado'=>3, 'estado_totalEntregado'=>7, 'estado_liquidado'=>4, 'estado_desactivado'=>5),
					'Tqcordenformulacion'=>array('estado_aprobado'=>3),
					'Tqcguiaremision'=>array('estado_confirmado'=>6),
					'Tqcdevolucionmotivo'=>array('liquidaciondirecta_id'=>42)
					);
	}
	
	/**
	 * Devuelve el numero que se ingresa anteponiendo los ceros necesarios
	 * para completar su longitud
	 * @return varchar = numeroinicial + uno
	 * @param $numero Object = numeroinicial
	 * @param $logitudNumero Object = longitud del numero requerido
	 */
	function completarLongitud($numero = 0, $logitudNumero = 4){
		$numero = (int)$numero;
		$longitudNro = (int)strlen($numero);
		while(($logitudNumero-$longitudNro) > 0){
			$numero = '0'.$numero;
			++$longitudNro;
		}
		return $numero;	
	}
	
	/** Genera la visualizacion del error en las tablas basicas **/
	function visualizarError($error){
		if(empty($error)){	
			return 	array('respuesta'=>true, 'mensaje'=>"El registro a sido actualizado");}	
			foreach($error as $value){ 
				return array('respuesta'=>false, 'mensaje'=>$value);
			}
	}	
	
	/**
	 * Devuelve el id del aro al que pertenece el rol
	 * @return integer = id del aro
	 * @param $integer Object = rol del id
	 */
	function getAroId($rol_id){
		$sql = "SELECT *FROM aros WHERE model = 'Secrole' AND foreign_key = $rol_id ";
		$rs = $this->query($sql);
		$aro_id = !empty($rs)?$rs['0']['0']['id']:'';
		return $aro_id;
	}

	function getFechaDMY($fecha) {
		if($fecha == '0000-00-00' || $fecha == '1970-01-01' || $fecha == '0000-00-00 00:00:00' || $fecha == '1970-01-01 00:00:00'){
			return null;
		}
		$fecha = str_replace("/","-",$fecha);
		$fechaPhp = date('d-m-Y H:i:s', strtotime($fecha));
		$anio = date('Y',strtotime($fecha));
		$mes = date('m',strtotime($fecha));
		$dia = date('d',strtotime($fecha));
		return date('d/m/Y', mktime(0, 0, 0, $mes, $dia, $anio));
	}
	
	function configurarFechaDMY($fecha) {
		$fecha = str_replace("/","-",$fecha);
		$fechaPhp = date('d-m-Y H:i:s', strtotime($fecha));
		$anio = date('Y',strtotime($fecha));
		$mes = date('m',strtotime($fecha));
		$dia = date('d',strtotime($fecha));
		return date('d-m-Y', mktime(0, 0, 0, $mes, $dia, $anio));
	}
	
	function configurarFechaYMD($fecha) {
		$fecha = str_replace("/","-",$fecha);
		$anio = date('Y',strtotime($fecha));
		$mes = date('m',strtotime($fecha));
		$dia = date('d',strtotime($fecha));
		return date('Y-m-d', mktime(0, 0, 0, $mes, $dia, $anio));
	}
		
	function convertirHorasMinutosEnDecimal($fechaHora) {
		$fechaHora = str_replace("/","-",$fechaHora);
//		$horaMinutoDecimal = substr($fechaHora,11,2) + (substr($fechaHora,14,2)/60);
		$horaMinutoDecimal = date('H',strtotime($fechaHora)) + (date('i',strtotime($fechaHora))/60);
		return $horaMinutoDecimal;
	}
	
	function convertirMinutosEnDecimal($fechaHora) {
		$fechaHora = str_replace("/","-",$fechaHora);
		$minutoDecimal = date('i',strtotime($fechaHora))/60;
		return $minutoDecimal;
	}
	
	function convertirHorasEnDecimal($fechaHora) {
		$fechaHora = str_replace("/","-",$fechaHora);
		$horaDecimal = date('H',strtotime($fechaHora));
		return $horaDecimal;
	}
	
	function convertirDecimalEnHorasMinutos($decimal) {
		$hh = intval($decimal);
		$mm = round(($decimal - $hh) * 60);
		return date('H:i', mktime($hh, $mm));
	}
	
	function convertirHorasMinutosEnFormatoFecha($horaMinuto, $formato, $mes, $dia, $anio) {
		$horaMinutoDecimal = $this->convertirHorasMinutosEnDecimal($horaMinuto);
		$hh = intval($horaMinutoDecimal);
		$mm = ($horaMinutoDecimal - $hh) * 60;
		return date($formato, mktime($hh, $mm, 0, $mes, $dia, $anio));
	}
	
	function convertirDecimalEnFormatoFecha($decimal, $formato, $mes, $dia, $anio) {
		$hh = intval($decimal);
		$mm = ($decimal - $hh) * 60;
		return date($formato, mktime($hh, $mm, 0, $mes, $dia, $anio));
	}

	function sumarMinutosFecha($fecha,$minutos) {
		$fecha = str_replace("/","-",$fecha);
		$anio = date('Y',strtotime($fecha));
		$mes = date('m',strtotime($fecha));
		$dia = date('d',strtotime($fecha));
		$hora = date('H',strtotime($fecha));
		$minuto = date('i',strtotime($fecha));
		
		return mktime($hora, $minuto+$minutos, 0, $mes, $dia, $anio);
	}
	
	function configurarHoraHM($fecha) {
		$fecha = str_replace("/","-",$fecha);
		$hora = date('H',strtotime($fecha));
		$minuto = date('i',strtotime($fecha));
		return date('H:i', mktime($hora, $minuto));
	}
	
	function numeroHorasDeformatohms($hms){
		if (!empty($hms)){
			$hmstemp=$hms;
			$longitudtotal=strlen($hmstemp);
			$distanciasiguiente=stripos($hmstemp,':');
			$hora=substr($hmstemp,0,$distanciasiguiente);
			
			$hmstemp=substr($hmstemp,$distanciasiguiente+1,$longitudtotal);
			$distanciasiguiente=stripos($hmstemp,':');
			$minuto=substr($hmstemp,0,$distanciasiguiente);
			
			$longitudtotal=strlen($hmstemp);
			$segundo=substr($hmstemp,$distanciasiguiente+1,$longitudtotal);
	
			return ($hora+($minuto/60)+($segundo/3600));
		}else return 0;
	}
	
	function alphaNumeric($check) {
		$val='';
		if (is_array($check)) {
			$val=implode('',$check);
		}
		$check = $val;
		if (empty($check) && $check != '0') {
			return '';
		}
		$regex = '/^[a-z0-9]*$/i';
		
		if (preg_match($regex, $check)) {
			return true;
		} else {
			return 'Ingrese solo letras o números';
		}
	}

	/** MCHIUYARI
	 * FUNCION PARA CONVERTIR UN STDOBJECT A ARRAY 
	 * @param object $data
	 * @return 
	 */
	function object_2_array($data){	
		if(is_array($data) || is_object($data))
		{
			$result = array(); 
			foreach ($data as $key => $value)
			{ 
				$result[$key] = $this->object_2_array($value); 
			}
			return $result;
		}
		return $data;
	}

	public function sanear_string($string)
	{
 
    $string = trim($string);
 
    $string = str_replace(
        array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'),
        array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'),
        $string
    );
 
    $string = str_replace(
        array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'),
        array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'),
        $string
    );
 
    $string = str_replace(
        array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'),
        array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'),
        $string
    );
 
    $string = str_replace(
        array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'),
        array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'),
        $string
    );
 
    $string = str_replace(
        array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'),
        array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'),
        $string
    );
 
    $string = str_replace(
        array('ñ', 'Ñ', 'ç', 'Ç'),
        array('n', 'N', 'c', 'C',),
        $string
    );
 
    //Esta parte se encarga de eliminar cualquier caracter extraño
   /* $string = str_replace(
        array("\", "¨", "º", "-", "~", 
        	 "#", "@", "|", "!", """,
             "·", "$", "%", "&", "/",
             "(", ")", "?", "'", "¡",
             "¿", "[", "^", "<code>", "]",
             "+", "}", "{", "¨", "´",
             ">", "< ", ";", ",", ":",
             ".", " "),
        '',
        $string
    );*/
 
 
    return $string;
	}
}
