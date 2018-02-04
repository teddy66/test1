<?php
namespace My\TaskFirst;

use Bitrix\Main\Entity;
use	Bitrix\Main\Localization\Loc;
	
Loc::loadMessages(__FILE__);

/**
 * Class DbTable
 * 
 * Fields:
 * <ul>
 * <li> id int mandatory
 * <li> name string(255) mandatory
 * <li> desc string(255) mandatory
 * <li> link string(255) mandatory
 * </ul>
 *
 * @package Bitrix\Info
 **/

class DbTable extends Entity\DataManager
{
	/**
	 * Returns DB table name for entity.
	 *
	 * @return string
	 */
	public static function getTableName()
	{
		return 'my_info_db';
	}

	/**
	 * Returns entity map definition.
	 *
	 * @return array
	 */
	public static function getMap()
	{
		return array(
			'id' => array(
				'data_type' => 'integer',
				'primary' => true,
				'autocomplete' => true,
				'title' => Loc::getMessage('DB_ENTITY_ID_FIELD'),
			),
			'name' => array(
				'data_type' => 'string',
				'required' => true,
				'validation' => array(__CLASS__, 'validateName'),
				'title' => Loc::getMessage('DB_ENTITY_NAME_FIELD'),
			),
			'desc' => array(
				'data_type' => 'string',
				'required' => true,
				'validation' => array(__CLASS__, 'validateDesc'),
				'title' => Loc::getMessage('DB_ENTITY_DESC_FIELD'),
			),
			'link' => array(
				'data_type' => 'string',
				'required' => true,
				'validation' => array(__CLASS__, 'validateLink'),
				'title' => Loc::getMessage('DB_ENTITY_LINK_FIELD'),
			),
		);
	}
}
