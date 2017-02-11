<?php
	require_once "engine/ctemplater.php";
	require_once "engine/ctools.php";
	require_once "engine/cform.php";
	require_once "engine/settings.php";
	
	require_once "iep/structures/user.class.php";
	require_once "iep/managers/usermanager.class.php";
	require_once "iep/managers/subjectsmanager.class.php";
	require_once "iep/managers/newsmanager.class.php";
	require_once "iep/typesUser.php";
	
  use IEP\Managers\UserManager;
  use IEP\Managers\SubjectsManager;
  use IEP\Managers\NewsManager;
	
	$CT = new CTemplater("templates/tpl", "templates/tpl_c", "templates/configs", "templates/cache");
	
	$opt = array(
		"PDO::ATTR_ERRMODE" => PDO::ERRMODE_EXCEPTION,
		"PDO::ATTR_DEFAULT_FETCH_MODE" => PDO::FETCH_ASSOC
	);
	$DB = new PDO("mysql:dbname=".DATA_BASE_NAME.";host=127.0.0.1", USER_NAME, USER_PASSWORD, $opt);
	$DB->exec("SET NAMES utf8");
	
	$UM = new UserManager($DB);
	
	$SM = new SubjectsManager($DB);
	
	$NM = new NewsManager($DB);
	
	$news = $NM->getNews();
	$groups = $DB->query("SELECT grp FROM `groups`");
	
	$CT->assign("groups", $groups);
	$CT->assign("news", $news);
	
	session_start();
?>
