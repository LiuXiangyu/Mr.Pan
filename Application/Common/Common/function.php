<?php

use Home\Model\InfoCollegeModel;

/*  通过college_id来获得college_name
@param $college_id
return $college_name;
*/
function getCollegeNameById($college_id){
	$college = new InfoCollegeModel;
	$college_name = $college->where("college_id='$college_id")->getField("college_name");
	//$college_name = "dsf";
	return $college_name;	
}
