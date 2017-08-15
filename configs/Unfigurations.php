<?php
/**
 * @package    UNI.Sistema
 *
 * @copyright  Copyright (C) 2016 - 2017 Websailor®. All rights reserved.
 * @license    GNU General Public License version 1 or later; see LICENSE.txt
 * @Developer 	Michel Larrosa [suporte AT michel DOT eng DOT br]
 */

defined('_UNIEXEC') or die;

Class Uconfig{
	public static $conn_sgdb = 'mysql';					// pgsql
	public static $conn_user = 'smma';					// uni				// websailo_UNI2016
	public static $conn_host = 'localhost';				// localhost			// 127.0.0.1
	public static $conn_password = "j4zV5Da8hW5HPUWX";	// X4>,Wq&Nv?oL[!E
	public static $conn_db = "smma";
	public static $conn_port = "3306";					// pgsql:5432			//mysql:3306
	
	public static $Unicode="UTF-8";
	public static $UNome="UNI";
	public static $UNomeSufixo="GP";
	public static $UDepartamento="UNI - Sistema de Gestão Pública";
	public static $UTabela="xyz456_";
	public static $UCopyright="";
	public static $UDB_Prefixo="uni_";
	public static $USessaoTempo=3600;
	public static $UHash_algo="whirlpool";
	public static $UTemplate="AdminLTE-2.3.7";
}