<?php

kirbytext::$tags['checklist'] = array(
  'html' => function($tag) {
  	$content = $tag->attr('checklist');
  	$tmp_arr1= explode("\n- ",$content);
  	$final_arr=array();
  	
  	foreach ($tmp_arr1 as $section) {
  		$final_arr[]= explode("- ",$section);
  	}

  	$html = "<ul class='checklist'>";

  	foreach($final_arr as $section){
  		$html.="<li><input type='checkbox' class='mr'>";
	    $html.=implode($section);
	    $html.="</li>";
	}
	$html.="</ul>";

    return $html;
  }
);

?>