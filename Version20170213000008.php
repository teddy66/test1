<?php

namespace Sprint\Migration;


class Version20170213000008 extends Version {

    protected $description = "Создать таблицу в БД и пополнить ее прямым запросом";

    public function up(){

	if (Locale::isWin1251()) {
            $charset = 'cp1251';
            $collate = 'cp1251_general_ci';
        } else {
            $charset = 'utf8';
            $collate = 'utf8_general_ci';
        };
		
	global $DB;
	
	$my_info_db = 'my_info_db';
	
    $DB->Query("CREATE TABLE IF NOT EXISTS ".$my_info_db."(
                `id` INT NOT NULL AUTO_INCREMENT NOT NULL,
                `name` varchar(255) COLLATE $collate NOT NULL,
				`desc` varchar(255) COLLATE $collate NOT NULL,
				`link` varchar(255) COLLATE $collate NOT NULL,
                PRIMARY KEY(id))
                ENGINE = InnoDB CHARSET $charset COLLATE $collate AUTO_INCREMENT=1;
				");
				
	$my_url = urlencode("http://test1.ru?news=1");		
	$DB->Query("INSERT INTO ".$my_info_db."(

                `name`,
				`desc`,
				`link`) VALUES (

				'Новость1',
				'Полный текст для новости1','".
				$my_url."')
                ");			
				
	$my_url = urlencode("http://test1.ru?news=2");
	$DB->Query("INSERT INTO ".$my_info_db."(

                `name`,
				`desc`,
				`link`) VALUES (

				'Новость2',
				'Полный текст для новости2','".
				$my_url."')
                ");	
				
	$my_url = urlencode("http://test1.ru?news=3");
    $DB->Query("INSERT INTO ".$my_info_db."(

                `name`,
				`desc`,
				`link`) VALUES (

				'Новость3',
				'Полный текст для новости3','".
				$my_url."')
                ");					
				   
    }

    public function down(){
	
    global $DB;
	
	$my_info_db = 'my_info_db';
	
	$DB->Query("DELETE FROM ".$my_info_db);	
	
    }

}
