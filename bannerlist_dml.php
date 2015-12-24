<?php

// Data functions (insert, update, delete, form) for table bannerlist

// This script and data application were generated by AppGini 5.50
// Download AppGini for free from http://bigprof.com/appgini/download/

function bannerlist_insert(){
	global $Translation;

	// mm: can member insert record?
	$arrPerm=getTablePermissions('bannerlist');
	if(!$arrPerm[1]){
		return false;
	}

	$data['imgurl'] = makeSafe($_REQUEST['imgurl']);
		if($data['imgurl'] == empty_lookup_value){ $data['imgurl'] = ''; }
	$data['linkurl'] = makeSafe($_REQUEST['linkurl']);
		if($data['linkurl'] == empty_lookup_value){ $data['linkurl'] = ''; }
	$data['listdisp'] = makeSafe($_REQUEST['listdisp']);
		if($data['listdisp'] == empty_lookup_value){ $data['listdisp'] = ''; }
	$data['dldisp'] = makeSafe($_REQUEST['dldisp']);
		if($data['dldisp'] == empty_lookup_value){ $data['dldisp'] = ''; }
	$data['authdisp'] = makeSafe($_REQUEST['authdisp']);
		if($data['authdisp'] == empty_lookup_value){ $data['authdisp'] = ''; }

	// hook: bannerlist_before_insert
	if(function_exists('bannerlist_before_insert')){
		$args=array();
		if(!bannerlist_before_insert($data, getMemberInfo(), $args)){ return false; }
	}

	$o=array('silentErrors' => true);
	sql('insert into `bannerlist` set       `imgurl`=' . (($data['imgurl'] !== '' && $data['imgurl'] !== NULL) ? "'{$data['imgurl']}'" : 'NULL') . ', `linkurl`=' . (($data['linkurl'] !== '' && $data['linkurl'] !== NULL) ? "'{$data['linkurl']}'" : 'NULL') . ', `listdisp`=' . (($data['listdisp'] !== '' && $data['listdisp'] !== NULL) ? "'{$data['listdisp']}'" : 'NULL') . ', `dldisp`=' . (($data['dldisp'] !== '' && $data['dldisp'] !== NULL) ? "'{$data['dldisp']}'" : 'NULL') . ', `authdisp`=' . (($data['authdisp'] !== '' && $data['authdisp'] !== NULL) ? "'{$data['authdisp']}'" : 'NULL'), $o);
	if($o['error']!=''){
		echo $o['error'];
		echo "<a href=\"bannerlist_view.php?addNew_x=1\">{$Translation['< back']}</a>";
		exit;
	}

	$recID = db_insert_id(db_link());

	// hook: bannerlist_after_insert
	if(function_exists('bannerlist_after_insert')){
		$res = sql("select * from `bannerlist` where `bannerid`='" . makeSafe($recID, false) . "' limit 1", $eo);
		if($row = db_fetch_assoc($res)){
			$data = array_map('makeSafe', $row);
		}
		$data['selectedID'] = makeSafe($recID, false);
		$args=array();
		if(!bannerlist_after_insert($data, getMemberInfo(), $args)){ return (get_magic_quotes_gpc() ? stripslashes($recID) : $recID); }
	}

	// mm: save ownership data
	sql("insert ignore into membership_userrecords set tableName='bannerlist', pkValue='$recID', memberID='".getLoggedMemberID()."', dateAdded='".time()."', dateUpdated='".time()."', groupID='".getLoggedGroupID()."'", $eo);

	return (get_magic_quotes_gpc() ? stripslashes($recID) : $recID);
}

function bannerlist_delete($selected_id, $AllowDeleteOfParents=false, $skipChecks=false){
	// insure referential integrity ...
	global $Translation;
	$selected_id=makeSafe($selected_id);

	// mm: can member delete record?
	$arrPerm=getTablePermissions('bannerlist');
	$ownerGroupID=sqlValue("select groupID from membership_userrecords where tableName='bannerlist' and pkValue='$selected_id'");
	$ownerMemberID=sqlValue("select lcase(memberID) from membership_userrecords where tableName='bannerlist' and pkValue='$selected_id'");
	if(($arrPerm[4]==1 && $ownerMemberID==getLoggedMemberID()) || ($arrPerm[4]==2 && $ownerGroupID==getLoggedGroupID()) || $arrPerm[4]==3){ // allow delete?
		// delete allowed, so continue ...
	}else{
		return $Translation['You don\'t have enough permissions to delete this record'];
	}

	// hook: bannerlist_before_delete
	if(function_exists('bannerlist_before_delete')){
		$args=array();
		if(!bannerlist_before_delete($selected_id, $skipChecks, getMemberInfo(), $args))
			return $Translation['Couldn\'t delete this record'];
	}

	sql("delete from `bannerlist` where `bannerid`='$selected_id'", $eo);

	// hook: bannerlist_after_delete
	if(function_exists('bannerlist_after_delete')){
		$args=array();
		bannerlist_after_delete($selected_id, getMemberInfo(), $args);
	}

	// mm: delete ownership data
	sql("delete from membership_userrecords where tableName='bannerlist' and pkValue='$selected_id'", $eo);
}

function bannerlist_update($selected_id){
	global $Translation;

	// mm: can member edit record?
	$arrPerm=getTablePermissions('bannerlist');
	$ownerGroupID=sqlValue("select groupID from membership_userrecords where tableName='bannerlist' and pkValue='".makeSafe($selected_id)."'");
	$ownerMemberID=sqlValue("select lcase(memberID) from membership_userrecords where tableName='bannerlist' and pkValue='".makeSafe($selected_id)."'");
	if(($arrPerm[3]==1 && $ownerMemberID==getLoggedMemberID()) || ($arrPerm[3]==2 && $ownerGroupID==getLoggedGroupID()) || $arrPerm[3]==3){ // allow update?
		// update allowed, so continue ...
	}else{
		return false;
	}

	$data['imgurl'] = makeSafe($_REQUEST['imgurl']);
		if($data['imgurl'] == empty_lookup_value){ $data['imgurl'] = ''; }
	$data['linkurl'] = makeSafe($_REQUEST['linkurl']);
		if($data['linkurl'] == empty_lookup_value){ $data['linkurl'] = ''; }
	$data['listdisp'] = makeSafe($_REQUEST['listdisp']);
		if($data['listdisp'] == empty_lookup_value){ $data['listdisp'] = ''; }
	$data['dldisp'] = makeSafe($_REQUEST['dldisp']);
		if($data['dldisp'] == empty_lookup_value){ $data['dldisp'] = ''; }
	$data['authdisp'] = makeSafe($_REQUEST['authdisp']);
		if($data['authdisp'] == empty_lookup_value){ $data['authdisp'] = ''; }
	$data['selectedID']=makeSafe($selected_id);

	// hook: bannerlist_before_update
	if(function_exists('bannerlist_before_update')){
		$args=array();
		if(!bannerlist_before_update($data, getMemberInfo(), $args)){ return false; }
	}

	$o=array('silentErrors' => true);
	sql('update `bannerlist` set       `imgurl`=' . (($data['imgurl'] !== '' && $data['imgurl'] !== NULL) ? "'{$data['imgurl']}'" : 'NULL') . ', `linkurl`=' . (($data['linkurl'] !== '' && $data['linkurl'] !== NULL) ? "'{$data['linkurl']}'" : 'NULL') . ', `listdisp`=' . (($data['listdisp'] !== '' && $data['listdisp'] !== NULL) ? "'{$data['listdisp']}'" : 'NULL') . ', `dldisp`=' . (($data['dldisp'] !== '' && $data['dldisp'] !== NULL) ? "'{$data['dldisp']}'" : 'NULL') . ', `authdisp`=' . (($data['authdisp'] !== '' && $data['authdisp'] !== NULL) ? "'{$data['authdisp']}'" : 'NULL') . " where `bannerid`='".makeSafe($selected_id)."'", $o);
	if($o['error']!=''){
		echo $o['error'];
		echo '<a href="bannerlist_view.php?SelectedID='.urlencode($selected_id)."\">{$Translation['< back']}</a>";
		exit;
	}


	// hook: bannerlist_after_update
	if(function_exists('bannerlist_after_update')){
		$res = sql("SELECT * FROM `bannerlist` WHERE `bannerid`='{$data['selectedID']}' LIMIT 1", $eo);
		if($row = db_fetch_assoc($res)){
			$data = array_map('makeSafe', $row);
		}
		$data['selectedID'] = $data['bannerid'];
		$args = array();
		if(!bannerlist_after_update($data, getMemberInfo(), $args)){ return; }
	}

	// mm: update ownership data
	sql("update membership_userrecords set dateUpdated='".time()."' where tableName='bannerlist' and pkValue='".makeSafe($selected_id)."'", $eo);

}

function bannerlist_form($selected_id = '', $AllowUpdate = 1, $AllowInsert = 1, $AllowDelete = 1, $ShowCancel = 0){
	// function to return an editable form for a table records
	// and fill it with data of record whose ID is $selected_id. If $selected_id
	// is empty, an empty form is shown, with only an 'Add New'
	// button displayed.

	global $Translation;

	// mm: get table permissions
	$arrPerm=getTablePermissions('bannerlist');
	if(!$arrPerm[1] && $selected_id==''){ return ''; }
	$AllowInsert = ($arrPerm[1] ? true : false);
	// print preview?
	$dvprint = false;
	if($selected_id && $_REQUEST['dvprint_x'] != ''){
		$dvprint = true;
	}


	// populate filterers, starting from children to grand-parents

	// unique random identifier
	$rnd1 = ($dvprint ? rand(1000000, 9999999) : '');

	if($selected_id){
		// mm: check member permissions
		if(!$arrPerm[2]){
			return "";
		}
		// mm: who is the owner?
		$ownerGroupID=sqlValue("select groupID from membership_userrecords where tableName='bannerlist' and pkValue='".makeSafe($selected_id)."'");
		$ownerMemberID=sqlValue("select lcase(memberID) from membership_userrecords where tableName='bannerlist' and pkValue='".makeSafe($selected_id)."'");
		if($arrPerm[2]==1 && getLoggedMemberID()!=$ownerMemberID){
			return "";
		}
		if($arrPerm[2]==2 && getLoggedGroupID()!=$ownerGroupID){
			return "";
		}

		// can edit?
		if(($arrPerm[3]==1 && $ownerMemberID==getLoggedMemberID()) || ($arrPerm[3]==2 && $ownerGroupID==getLoggedGroupID()) || $arrPerm[3]==3){
			$AllowUpdate=1;
		}else{
			$AllowUpdate=0;
		}

		$res = sql("select * from `bannerlist` where `bannerid`='".makeSafe($selected_id)."'", $eo);
		if(!($row = db_fetch_array($res))){
			return error_message($Translation['No records found']);
		}
		$urow = $row; /* unsanitized data */
		$hc = new CI_Input();
		$row = $hc->xss_clean($row); /* sanitize data */
	}else{
	}

	// code for template based detail view forms

	// open the detail view template
	if($dvprint){
		$templateCode = @file_get_contents('./templates/bannerlist_templateDVP.html');
	}else{
		$templateCode = @file_get_contents('./templates/bannerlist_templateDV.html');
	}

	// process form title
	$templateCode = str_replace('<%%DETAIL_VIEW_TITLE%%>', 'Banners', $templateCode);
	$templateCode = str_replace('<%%RND1%%>', $rnd1, $templateCode);
	$templateCode = str_replace('<%%EMBEDDED%%>', ($_REQUEST['Embedded'] ? 'Embedded=1' : ''), $templateCode);
	// process buttons
	if($AllowInsert){
		if(!$selected_id) $templateCode=str_replace('<%%INSERT_BUTTON%%>', '<button type="submit" class="btn btn-success" id="insert" name="insert_x" value="1" onclick="return bannerlist_validateData();"><i class="glyphicon glyphicon-plus-sign"></i> ' . $Translation['Save New'] . '</button>', $templateCode);
		$templateCode=str_replace('<%%INSERT_BUTTON%%>', '<button type="submit" class="btn btn-default" id="insert" name="insert_x" value="1" onclick="return bannerlist_validateData();"><i class="glyphicon glyphicon-plus-sign"></i> ' . $Translation['Save As Copy'] . '</button>', $templateCode);
	}else{
		$templateCode=str_replace('<%%INSERT_BUTTON%%>', '', $templateCode);
	}

	// 'Back' button action
	if($_REQUEST['Embedded']){
		$backAction = 'window.parent.jQuery(\'.modal\').modal(\'hide\'); return false;';
	}else{
		$backAction = '$$(\'form\')[0].writeAttribute(\'novalidate\', \'novalidate\'); document.myform.reset(); return true;';
	}

	if($selected_id){
		if(!$_REQUEST['Embedded']) $templateCode=str_replace('<%%DVPRINT_BUTTON%%>', '<button type="submit" class="btn btn-default" id="dvprint" name="dvprint_x" value="1" onclick="$$(\'form\')[0].writeAttribute(\'novalidate\', \'novalidate\'); document.myform.reset(); return true;"><i class="glyphicon glyphicon-print"></i> ' . $Translation['Print Preview'] . '</button>', $templateCode);
		if($AllowUpdate){
			$templateCode=str_replace('<%%UPDATE_BUTTON%%>', '<button type="submit" class="btn btn-success btn-lg" id="update" name="update_x" value="1" onclick="return bannerlist_validateData();"><i class="glyphicon glyphicon-ok"></i> ' . $Translation['Save Changes'] . '</button>', $templateCode);
		}else{
			$templateCode=str_replace('<%%UPDATE_BUTTON%%>', '', $templateCode);
		}
		if(($arrPerm[4]==1 && $ownerMemberID==getLoggedMemberID()) || ($arrPerm[4]==2 && $ownerGroupID==getLoggedGroupID()) || $arrPerm[4]==3){ // allow delete?
			$templateCode=str_replace('<%%DELETE_BUTTON%%>', '<button type="submit" class="btn btn-danger" id="delete" name="delete_x" value="1" onclick="return confirm(\'' . $Translation['are you sure?'] . '\');"><i class="glyphicon glyphicon-trash"></i> ' . $Translation['Delete'] . '</button>', $templateCode);
		}else{
			$templateCode=str_replace('<%%DELETE_BUTTON%%>', '', $templateCode);
		}
		$templateCode=str_replace('<%%DESELECT_BUTTON%%>', '<button type="submit" class="btn btn-default" id="deselect" name="deselect_x" value="1" onclick="' . $backAction . '"><i class="glyphicon glyphicon-chevron-left"></i> ' . $Translation['Back'] . '</button>', $templateCode);
	}else{
		$templateCode=str_replace('<%%UPDATE_BUTTON%%>', '', $templateCode);
		$templateCode=str_replace('<%%DELETE_BUTTON%%>', '', $templateCode);
		$templateCode=str_replace('<%%DESELECT_BUTTON%%>', ($ShowCancel ? '<button type="submit" class="btn btn-default" id="deselect" name="deselect_x" value="1" onclick="' . $backAction . '"><i class="glyphicon glyphicon-chevron-left"></i> ' . $Translation['Back'] . '</button>' : ''), $templateCode);
	}

	// set records to read only if user can't insert new records and can't edit current record
	if(($selected_id && !$AllowUpdate && !$AllowInsert) || (!$selected_id && !$AllowInsert)){
		$jsReadOnly .= "\tjQuery('#imgurl').replaceWith('<div class=\"form-control-static\" id=\"imgurl\">' + (jQuery('#imgurl').val() || '') + '</div>');\n";
		$jsReadOnly .= "\tjQuery('#imgurl, #imgurl-edit-link').hide();\n";
		$jsReadOnly .= "\tjQuery('#linkurl').replaceWith('<div class=\"form-control-static\" id=\"linkurl\">' + (jQuery('#linkurl').val() || '') + '</div>');\n";
		$jsReadOnly .= "\tjQuery('#linkurl, #linkurl-edit-link').hide();\n";
		$jsReadOnly .= "\tjQuery('#listdisp').replaceWith('<div class=\"form-control-static\" id=\"listdisp\">' + (jQuery('#listdisp').val() || '') + '</div>');\n";
		$jsReadOnly .= "\tjQuery('#dldisp').replaceWith('<div class=\"form-control-static\" id=\"dldisp\">' + (jQuery('#dldisp').val() || '') + '</div>');\n";
		$jsReadOnly .= "\tjQuery('#authdisp').replaceWith('<div class=\"form-control-static\" id=\"authdisp\">' + (jQuery('#authdisp').val() || '') + '</div>');\n";
		$jsReadOnly .= "\tjQuery('.select2-container').hide();\n";

		$noUploads = true;
	}elseif($AllowInsert){
		$jsEditable .= "\tjQuery('form').eq(0).data('already_changed', true);"; // temporarily disable form change handler
			$jsEditable .= "\tjQuery('form').eq(0).data('already_changed', false);"; // re-enable form change handler
	}

	// process combos

	/* lookup fields array: 'lookup field name' => array('parent table name', 'lookup field caption') */
	$lookup_fields = array();
	foreach($lookup_fields as $luf => $ptfc){
		$pt_perm = getTablePermissions($ptfc[0]);

		// process foreign key links
		if($pt_perm['view'] || $pt_perm['edit']){
			$templateCode = str_replace("<%%PLINK({$luf})%%>", '<button type="button" class="btn btn-default view_parent hspacer-lg" id="' . $ptfc[0] . '_view_parent" title="' . htmlspecialchars($Translation['View'] . ' ' . $ptfc[1], ENT_QUOTES, 'iso-8859-1') . '"><i class="glyphicon glyphicon-eye-open"></i></button>', $templateCode);
		}

		// if user has insert permission to parent table of a lookup field, put an add new button
		if($pt_perm['insert'] && !$_REQUEST['Embedded']){
			$templateCode = str_replace("<%%ADDNEW({$ptfc[0]})%%>", '<button type="button" class="btn btn-success add_new_parent" id="' . $ptfc[0] . '_add_new" title="' . htmlspecialchars($Translation['Add New'] . ' ' . $ptfc[1], ENT_QUOTES, 'iso-8859-1') . '"><i class="glyphicon glyphicon-plus-sign"></i></button>', $templateCode);
		}
	}

	// process images
	$templateCode=str_replace('<%%UPLOADFILE(bannerid)%%>', '', $templateCode);
	$templateCode=str_replace('<%%UPLOADFILE(imgurl)%%>', '', $templateCode);
	$templateCode=str_replace('<%%UPLOADFILE(linkurl)%%>', '', $templateCode);
	$templateCode=str_replace('<%%UPLOADFILE(listdisp)%%>', '', $templateCode);
	$templateCode=str_replace('<%%UPLOADFILE(dldisp)%%>', '', $templateCode);
	$templateCode=str_replace('<%%UPLOADFILE(authdisp)%%>', '', $templateCode);

	// process values
	if($selected_id){
		$templateCode=str_replace('<%%VALUE(bannerid)%%>', htmlspecialchars($row['bannerid'], ENT_QUOTES, 'iso-8859-1'), $templateCode);
		$templateCode=str_replace('<%%URLVALUE(bannerid)%%>', urlencode($urow['bannerid']), $templateCode);
		$templateCode=str_replace('<%%VALUE(imgurl)%%>', htmlspecialchars($row['imgurl'], ENT_QUOTES, 'iso-8859-1'), $templateCode);
		$templateCode=str_replace('<%%URLVALUE(imgurl)%%>', urlencode($urow['imgurl']), $templateCode);
		$templateCode=str_replace('<%%VALUE(linkurl)%%>', htmlspecialchars($row['linkurl'], ENT_QUOTES, 'iso-8859-1'), $templateCode);
		$templateCode=str_replace('<%%URLVALUE(linkurl)%%>', urlencode($urow['linkurl']), $templateCode);
		$templateCode=str_replace('<%%VALUE(listdisp)%%>', htmlspecialchars($row['listdisp'], ENT_QUOTES, 'iso-8859-1'), $templateCode);
		$templateCode=str_replace('<%%URLVALUE(listdisp)%%>', urlencode($urow['listdisp']), $templateCode);
		$templateCode=str_replace('<%%VALUE(dldisp)%%>', htmlspecialchars($row['dldisp'], ENT_QUOTES, 'iso-8859-1'), $templateCode);
		$templateCode=str_replace('<%%URLVALUE(dldisp)%%>', urlencode($urow['dldisp']), $templateCode);
		$templateCode=str_replace('<%%VALUE(authdisp)%%>', htmlspecialchars($row['authdisp'], ENT_QUOTES, 'iso-8859-1'), $templateCode);
		$templateCode=str_replace('<%%URLVALUE(authdisp)%%>', urlencode($urow['authdisp']), $templateCode);
	}else{
		$templateCode=str_replace('<%%VALUE(bannerid)%%>', '', $templateCode);
		$templateCode=str_replace('<%%URLVALUE(bannerid)%%>', urlencode(''), $templateCode);
		$templateCode=str_replace('<%%VALUE(imgurl)%%>', '', $templateCode);
		$templateCode=str_replace('<%%URLVALUE(imgurl)%%>', urlencode(''), $templateCode);
		$templateCode=str_replace('<%%VALUE(linkurl)%%>', '', $templateCode);
		$templateCode=str_replace('<%%URLVALUE(linkurl)%%>', urlencode(''), $templateCode);
		$templateCode=str_replace('<%%VALUE(listdisp)%%>', '', $templateCode);
		$templateCode=str_replace('<%%URLVALUE(listdisp)%%>', urlencode(''), $templateCode);
		$templateCode=str_replace('<%%VALUE(dldisp)%%>', '', $templateCode);
		$templateCode=str_replace('<%%URLVALUE(dldisp)%%>', urlencode(''), $templateCode);
		$templateCode=str_replace('<%%VALUE(authdisp)%%>', '', $templateCode);
		$templateCode=str_replace('<%%URLVALUE(authdisp)%%>', urlencode(''), $templateCode);
	}

	// process translations
	foreach($Translation as $symbol=>$trans){
		$templateCode=str_replace("<%%TRANSLATION($symbol)%%>", $trans, $templateCode);
	}

	// clear scrap
	$templateCode=str_replace('<%%', '<!-- ', $templateCode);
	$templateCode=str_replace('%%>', ' -->', $templateCode);

	// hide links to inaccessible tables
	if($_REQUEST['dvprint_x'] == ''){
		$templateCode .= "\n\n<script>\$j(function(){\n";
		$arrTables = getTableList();
		foreach($arrTables as $name => $caption){
			$templateCode .= "\t\$j('#{$name}_link').removeClass('hidden');\n";
			$templateCode .= "\t\$j('#xs_{$name}_link').removeClass('hidden');\n";
		}

		$templateCode .= $jsReadOnly;
		$templateCode .= $jsEditable;

		if(!$selected_id){
			$templateCode.="\n\tif(document.getElementById('imgurlEdit')){ document.getElementById('imgurlEdit').style.display='inline'; }";
			$templateCode.="\n\tif(document.getElementById('imgurlEditLink')){ document.getElementById('imgurlEditLink').style.display='none'; }";
			$templateCode.="\n\tif(document.getElementById('linkurlEdit')){ document.getElementById('linkurlEdit').style.display='inline'; }";
			$templateCode.="\n\tif(document.getElementById('linkurlEditLink')){ document.getElementById('linkurlEditLink').style.display='none'; }";
		}

		$templateCode.="\n});</script>\n";
	}

	// ajaxed auto-fill fields
	$templateCode .= '<script>';
	$templateCode .= '$j(function() {';


	$templateCode.="});";
	$templateCode.="</script>";
	$templateCode .= $lookups;

	// handle enforced parent values for read-only lookup fields

	// don't include blank images in lightbox gallery
	$templateCode = preg_replace('/blank.gif" data-lightbox=".*?"/', 'blank.gif"', $templateCode);

	// don't display empty email links
	$templateCode=preg_replace('/<a .*?href="mailto:".*?<\/a>/', '', $templateCode);

	// hook: bannerlist_dv
	if(function_exists('bannerlist_dv')){
		$args=array();
		bannerlist_dv(($selected_id ? $selected_id : FALSE), getMemberInfo(), $templateCode, $args);
	}

	return $templateCode;
}
?>