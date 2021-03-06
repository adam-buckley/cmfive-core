<?php

function index_ALL(Web $w) {
    $w->Tag->navigation($w, "Tag Admin");
	$tags = $w->Tag->getAllTags();
	$table_header = array("Tag", "Actions");
	
	$table_data = [];
	if (!empty($tags)) {
		foreach($tags as $t) {
			$table_data[]  =array(
				$t['tag'],
				Html::b("/tag/edit/".$t['id'],"Edit",false).Html::b("/tag/delete/".$t['id'],"Delete",false)
			);
		}
	}
	$w->ctx("tags_table", Html::table($table_data, null, "tablesorter", $table_header));
}