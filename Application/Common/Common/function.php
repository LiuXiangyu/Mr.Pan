<?php

use Home\Model\InfoCollegeModel;

/*  通过college_id来获得college_name
@param $college_id
return $college_name;
*/
function getCollegeNameById($college_id){
	$college = M("InfoCollege");
	$college_name= $college->where("college_id='$college_id'")->getField("college_name");
	return $college_name;	
}
