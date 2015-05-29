<?php

namespace Home\Controller;
use Think\Controller;

class SearchController extends Controller{
	public function SearchResult(){
		if (IS_GET){
			$searchType = I('searchType');
			$keyword = I("keyword");
			$this->assign("searchType", $searchType);
			
			if ($searchType == 'teacher') {
				$teacher_id = getTeacherIdByName($keyword); //通过搜索的教师名返回教师ID列表
				
				if ($teacher_id){
					$comment = D("InfoComment");
					$all_comment = $comment->searchCommentByTeacher($teacher_id);
					$this->assign("comment", $all_comment);
				}
				else{
					//Not Found
				}
			} else if ($searchType == 'course') {
				$course_id = getCourseIdByName($keyword); //通过搜索的教师名返回教师ID列表
				
				if ($course_id){
					$comment = D("InfoComment");
					$all_comment = $comment->searchCommentByCourse($course_id);
					$this->assign("comment", $all_comment);
				}
				else{
					//Not Found
				}

			}
			else {
				//
			}
			$this->display();
		}
		else if (IS_POST) {

        } else {
        	
        }
	}
}
?>
