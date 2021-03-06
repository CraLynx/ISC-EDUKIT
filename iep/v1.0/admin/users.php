<?php
  
  require_once "start.php";
  
  use IEP\Managers\UserManager;
  use IEP\Managers\GroupManager;
  use IEP\Managers\SubjectManager;
  use IEP\Structures\Student;
  use IEP\Structures\Parent_;
  use IEP\Structures\Teacher;
  use IEP\Structures\User;
  use IEP\Structures\Group;
  
	if (isset($_SESSION['admin']) && 
     ($_SESSION['admin'] instanceof User) &&
     $UM->adminExists($_SESSION['admin'])
  ) {
    
    $GM = new GroupManager($DB);
    $SM = new SubjectManager($DB);
		
		$all_students = $UM->getAllStudentsElders();
		$studentsByGroup = array();
		for ($i = 0; $i < count($all_students); $i++) {
      $key = $all_students[$i]->getGroup()->getNumberGroup()." (".$all_students[$i]->getGroup()->getYearEducation().")";
			$studentsByGroup[$key][] = $all_students[$i];
		}
		
		$CT->assign("groups", $GM->getAllGroups());
		$CT->assign("subjects", $SM->getAllSubjects());
		$CT->assign("teachers", $UM->getAllTeachers());
		$CT->assign("students", $UM->getAllStudents());
		$CT->assign("elders", $UM->getAllElders());
		$CT->assign("parents", $UM->getAllParents());
		$CT->assign("allUsers", $UM->getAllUsers());
		$CT->assign("studentsByGroup", $studentsByGroup);
		
		$CT->Show("users.tpl");
		
		if (!empty($_POST['addTeacherButton'])) {
			$data = CForm::getData(["sn", "fn", "pt", "email", "paswd", "info"]);
			$data['paswd'] = md5($data['paswd']);
			$subjects = $_POST['subjects'];
			
			$new_teacher = new Teacher(
				new User(
					$data['sn'], 
					$data['fn'], 
					$data['pt'], 
					$data['email'], 
					$data['paswd'], 
					1
        ), 
				$data['info']
			);
      
			if (!empty($subjects)) {
				$new_teacher->setSubjects($subjects);
			}
			
			if ($UM->add($new_teacher)) {
        CTools::Message("Преподаватель успешно добавлен");
      } else {
        CTools::Message("Ошибка при добавлении преподавателя");
      }
			
      CTools::Redirect("users.php");
		}
		
		if (!empty($_POST['grantElderButton'])) {
			$emailStudent = htmlspecialchars($_POST['studentEmail']);
			
			if ($UM->grantElder($emailStudent)) {
				CTools::Redirect("users.php");
			}
			
		}
		
		if (!empty($_POST['revokeElderButton'])) {
			$emailStudent = htmlspecialchars($_POST['studentEmail']);
			
			if ($UM->revokeElder($emailStudent)) {
				CTools::Redirect("users.php");
			}
			
		}
		
		if (!empty($_POST['removeUserButton'])) {
			$user = $_POST['user'];
			
			if ($UM->remove($user)) {
				CTools::Redirect("users.php");
			}
			
		}
		
	}
	else {    
    CTools::Redirect("login.php");
  } 
	
?>
