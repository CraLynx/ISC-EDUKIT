use `iep`;

DROP FUNCTION IF EXISTS getAdminId;
DROP FUNCTION IF EXISTS getUserId;
DROP FUNCTION IF EXISTS getStudentId;
DROP FUNCTION IF EXISTS getElderId;
DROP FUNCTION IF EXISTS getParentId;
DROP FUNCTION IF EXISTS getTeacherId;
DROP FUNCTION IF EXISTS getSubjectId;
DROP FUNCTION IF EXISTS getSpecialtyId;
DROP FUNCTION IF EXISTS getGroupId;
DROP FUNCTION IF EXISTS isGroupHaveElder;
DROP FUNCTION IF EXISTS isEmailExists;
DROP FUNCTION IF EXISTS ifTrafficFixed;


DELIMITER //

CREATE FUNCTION isEmailExists(email char(30))
	RETURNS BOOL
BEGIN
	IF EXISTS (SELECT `email` FROM `users` WHERE `email`=email) THEN
		RETURN TRUE;
	ELSE
		RETURN FALSE;
	END IF; 
END;

/* Функции для пользователей */

CREATE FUNCTION getAdminId (emailAdmin char(30))
	RETURNS INT
BEGIN
	DECLARE aid int;
	
	SELECT `id_admin` INTO aid FROM `admins` WHERE `email`=emailAdmin LIMIT 1;
	
	RETURN aid;
END;

CREATE FUNCTION getUserId (emailUser char(30))
	RETURNS INT
BEGIN
	DECLARE uid int;
	
	SELECT `id_user` INTO uid FROM `users` WHERE `email`=emailUser;
	
	RETURN uid;
END;

CREATE FUNCTION getStudentId (emailUser char(30)) 
	RETURNS INT
BEGIN
  DECLARE sid int;
  
  SELECT `id_user` INTO sid FROM `users` WHERE `email`=emailUser AND (`id_type_user`=3 OR `id_type_user`=2);
  
  RETURN sid;
END;

CREATE FUNCTION getParentId (emailUser char(30)) 
	RETURNS INT
BEGIN
  DECLARE pid int;
  
  SELECT `id_user` INTO pid FROM `users` WHERE `email`=emailUser AND `id_type_user`=4 LIMIT 1;
  
  RETURN pid;
END;

CREATE FUNCTION getElderId (emailUser char(30)) 
	RETURNS INT
BEGIN
  DECLARE eid int;
  
  SELECT `id_user` INTO eid FROM `users` WHERE `email`=emailUser AND `id_type_user`=2 LIMIT 1;
  
  RETURN eid;
END;


CREATE FUNCTION getTeacherId(emailTeacher char(30)) 
  RETURNS int
BEGIN
  DECLARE tid int;
  
  SELECT `id_user` INTO tid FROM `users` WHERE `email`=emailTeacher AND `id_type_user`=1 LIMIT 1;
  
  RETURN tid;
END;

CREATE FUNCTION isGroupHaveElder(_grp int) RETURNS bool
BEGIN
	IF EXISTS (
		SELECT * FROM `users` u
			INNER JOIN `students` s ON u.id_user=s.id_student
		WHERE `id_type_user`=2 AND `grp`=_grp
	) THEN
		return true;
	ELSE
		return false;
	END IF;
END;




/* Функции для предметов */


CREATE FUNCTION getSubjectId(subject char(255)) 
  RETURNS int
BEGIN
	DECLARE sid int;
  
	SELECT `id_subject` INTO sid FROM `subjects` WHERE `description`=subject;
  
	RETURN sid;
END;


CREATE FUNCTION getSpecialtyId(spec char(10))
	RETURNS int
BEGIN
	DECLARE sid int;
	
	SELECT DISTINCT `id_spec` INTO sid FROM `specialty` WHERE `code_spec`=code_spec;
	
	RETURN sid;
END;

CREATE FUNCTION getGroupId(g char(10))
	RETURNS int
BEGIN
	DECLARE gid int;
	
	SELECT DISTINCT `grp` INTO gid FROM `groups` WHERE `description`=g;
	
	RETURN gid;
END;


/* Функции для посещения */

CREATE FUNCTION ifTrafficFixed(elder_email char(30))
	RETURNS BOOL
BEGIN
	IF EXISTS(SELECT * FROM `student_traffic` WHERE `date_visit`=DATE(NOW()) AND `id_student`=getUserId(elder_email)) THEN
		RETURN TRUE;
	ELSE
		RETURN FALSE;
	END IF;
END;


//

DELIMITER ;