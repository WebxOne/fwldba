<?php
	// check this file's MD5 to make sure it wasn't called before
	$prevMD5=@implode('', @file(dirname(__FILE__).'/setup.md5'));
	$thisMD5=md5(@implode('', @file("./updateDB.php")));
	if($thisMD5==$prevMD5){
		$setupAlreadyRun=true;
	}else{
		// set up tables
		if(!isset($silent)){
			$silent=true;
		}

		// set up tables
		setupTable('submitlog', "create table if not exists `submitlog` (   `submid` INT(6) not null auto_increment , primary key (`submid`), `cstatus` TINYINT(1) default '0' , `logtime` DATETIME , `ipaddr` VARCHAR(20) , `company` VARCHAR(50) , `country` VARCHAR(50) , `website` VARCHAR(128) , `contactname` VARCHAR(60) , `email` VARCHAR(50) , `title` VARCHAR(50) , `version` VARCHAR(15) , `pdate` DATE , `cost` FLOAT(1,0) , `ptype` VARCHAR(15) , `install` VARCHAR(50) , `os` VARCHAR(200) , `languages` VARCHAR(255) , `changeinfo` TEXT , `category` VARCHAR(80) , `requirements` VARCHAR(200) , `ksize` INT(11) , `keywords` VARCHAR(255) , `description` VARCHAR(84) , `descrlarge` TEXT , `homepage` VARCHAR(128) , `screenshot` VARCHAR(128) , `icon` VARCHAR(128) , `padfile` VARCHAR(128) , `download` VARCHAR(128) , `aspnumber` VARCHAR(5) , `backlink` VARCHAR(128) , `affiliate` VARCHAR(40) , `affiliateid` VARCHAR(15) ) CHARSET latin1", $silent);
		setupTable('paddata', "create table if not exists `paddata` (   `progid` INT(6) not null auto_increment , primary key (`progid`), `company` VARCHAR(50) , `country` VARCHAR(50) , `website` VARCHAR(128) , `contactname` VARCHAR(60) , `email` VARCHAR(50) , `title` VARCHAR(50) , `version` VARCHAR(15) , `pdate` DATE , `cost` FLOAT(1,0) , `ptype` VARCHAR(15) , `status` TINYINT(1) default '0' , `install` VARCHAR(50) , `os` VARCHAR(200) , `languages` VARCHAR(255) , `changeinfo` TEXT , `category` VARCHAR(80) , `requirements` VARCHAR(200) , `ksize` INT(11) , `keywords` VARCHAR(255) , `description` VARCHAR(84) , `descrlarge` TEXT , `homepage` VARCHAR(128) , `screenshot` VARCHAR(128) , `icon` VARCHAR(128) , `padfile` VARCHAR(128) , `download` VARCHAR(128) , `dlcount` INT(11) default '0' , `dlipaddr` VARCHAR(20) , `aspnumber` VARCHAR(5) , `affiliate` VARCHAR(40) , `affiliateid` VARCHAR(15) , `siterating` TINYINT(1) default '0' , `clean` TINYINT(1) default '0' , `paderrcount` INT(11) default '0' ) CHARSET latin1", $silent);
		setupTable('customurls', "create table if not exists `customurls` (   `customid` INT(6) not null auto_increment , primary key (`customid`), `progid` INT(6) default '0' , `customurl` VARCHAR(200) ) CHARSET latin1", $silent);
		setupTable('bannerlist', "create table if not exists `bannerlist` (   `bannerid` INT(6) not null auto_increment , primary key (`bannerid`), `imgurl` VARCHAR(128) , `linkurl` VARCHAR(128) , `listdisp` TINYINT(1) , `dldisp` TINYINT(1) , `authdisp` TINYINT(1) ) CHARSET latin1", $silent);
		setupTable('blacklist', "create table if not exists `blacklist` (   `blackid` INT(6) not null auto_increment , primary key (`blackid`), `bldomain` VARCHAR(100) ) CHARSET latin1", $silent);
		setupTable('usrreviews', "create table if not exists `usrreviews` (   `revid` INT(6) not null auto_increment , primary key (`revid`), `progid` INT(6) default '0' , `useripaddr` VARCHAR(20) , `revtime` DATETIME , `username` VARCHAR(50) , `userrating` INT(1) default '0' , `usercomment` TEXT ) CHARSET latin1", $silent);


		// save MD5
		if($fp=@fopen(dirname(__FILE__).'/setup.md5', 'w')){
			fwrite($fp, $thisMD5);
			fclose($fp);
		}
	}


	function setupIndexes($tableName, $arrFields){
		if(!is_array($arrFields)){
			return false;
		}

		foreach($arrFields as $fieldName){
			if(!$res=@db_query("SHOW COLUMNS FROM `$tableName` like '$fieldName'")){
				continue;
			}
			if(!$row=@db_fetch_assoc($res)){
				continue;
			}
			if($row['Key']==''){
				@db_query("ALTER TABLE `$tableName` ADD INDEX `$fieldName` (`$fieldName`)");
			}
		}
	}


	function setupTable($tableName, $createSQL='', $silent=true, $arrAlter=''){
		global $Translation;
		ob_start();

		echo '<div style="padding: 5px; border-bottom:solid 1px silver; font-family: verdana, arial; font-size: 10px;">';

		// is there a table rename query?
		if(is_array($arrAlter)){
			$matches=array();
			if(preg_match("/ALTER TABLE `(.*)` RENAME `$tableName`/", $arrAlter[0], $matches)){
				$oldTableName=$matches[1];
			}
		}

		if($res=@db_query("select count(1) from `$tableName`")){ // table already exists
			if($row = @db_fetch_array($res)){
				echo str_replace("<TableName>", $tableName, str_replace("<NumRecords>", $row[0],$Translation["table exists"]));
				if(is_array($arrAlter)){
					echo '<br>';
					foreach($arrAlter as $alter){
						if($alter!=''){
							echo "$alter ... ";
							if(!@db_query($alter)){
								echo '<span class="label label-danger">' . $Translation['failed'] . '</span>';
								echo '<div class="text-danger">' . $Translation['mysql said'] . ' ' . db_error(db_link()) . '</div>';
							}else{
								echo '<span class="label label-success">' . $Translation['ok'] . '</span>';
							}
						}
					}
				}else{
					echo $Translation["table uptodate"];
				}
			}else{
				echo str_replace("<TableName>", $tableName, $Translation["couldnt count"]);
			}
		}else{ // given tableName doesn't exist

			if($oldTableName!=''){ // if we have a table rename query
				if($ro=@db_query("select count(1) from `$oldTableName`")){ // if old table exists, rename it.
					$renameQuery=array_shift($arrAlter); // get and remove rename query

					echo "$renameQuery ... ";
					if(!@db_query($renameQuery)){
						echo '<span class="label label-danger">' . $Translation['failed'] . '</span>';
						echo '<div class="text-danger">' . $Translation['mysql said'] . ' ' . db_error(db_link()) . '</div>';
					}else{
						echo '<span class="label label-success">' . $Translation['ok'] . '</span>';
					}

					if(is_array($arrAlter)) setupTable($tableName, $createSQL, false, $arrAlter); // execute Alter queries on renamed table ...
				}else{ // if old tableName doesn't exist (nor the new one since we're here), then just create the table.
					setupTable($tableName, $createSQL, false); // no Alter queries passed ...
				}
			}else{ // tableName doesn't exist and no rename, so just create the table
				echo str_replace("<TableName>", $tableName, $Translation["creating table"]);
				if(!@db_query($createSQL)){
					echo '<span class="label label-danger">' . $Translation['failed'] . '</span>';
					echo '<div class="text-danger">' . $Translation['mysql said'] . db_error(db_link()) . '</div>';
				}else{
					echo '<span class="label label-success">' . $Translation['ok'] . '</span>';
				}
			}
		}

		echo "</div>";

		$out=ob_get_contents();
		ob_end_clean();
		if(!$silent){
			echo $out;
		}
	}
?>