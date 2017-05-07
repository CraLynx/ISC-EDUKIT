use iep;

DROP VIEW IF EXISTS v_Admins;
DROP VIEW IF EXISTS v_Users;
DROP VIEW IF EXISTS v_Students;
DROP VIEW IF EXISTS v_Teachers;
DROP VIEW IF EXISTS v_Elders;
DROP VIEW IF EXISTS v_Parents;

DROP VIEW IF EXISTS v_Groups;
DROP VIEW IF EXISTS v_Specialtyes;

DROP VIEW IF EXISTS v_Subjects;
DROP VIEW IF EXISTS v_News;

DROP VIEW IF EXISTS v_Traffic;
DROP VIEW IF EXISTS v_Relations;
DROP VIEW IF EXISTS v_Tests;

CREATE VIEW v_Admins (sn, fn, pt, email, passwd) as
	SELECT `sn`, `fn`, `pt`, `email`, `passwd`
	FROM `admins`
	ORDER BY `sn`, `fn`, `pt`;

CREATE VIEW v_Users (sn, fn, pt, email, paswd, type_user) as
	SELECT `second_name`, `first_name`, `patronymic`, `email`, `password`, `id_type_user` 
	FROM `users` 
	ORDER BY `second_name`, `first_name`, `patronymic`;
	
CREATE VIEW v_Students (sn, fn, pt, email, paswd, type_user, home_address, cell_phone, grp, grp_id, is_budget, code_spec) as
	SELECT u.second_name, u.first_name, u.patronymic, u.email, u.password, u.id_type_user, s.home_address, s.cell_phone, g.description, g.grp, g.is_budget, sp.code_spec
	FROM `users` u 
		INNER JOIN `students` s ON u.id_user=s.id_student
		INNER JOIN `groups` g ON s.grp=g.grp
		INNER JOIN `specialty` sp ON sp.id_spec=g.code_spec
	WHERE u.id_type_user=3
	ORDER BY u.second_name, u.first_name, u.patronymic;

CREATE VIEW v_Parents (sn, fn, pt, email, paswd, age, education, work_place, post, home_phone, cell_phone, type_user) as
  SELECT u.second_name, u.first_name, u.patronymic, u.email, u.password, p.age, p.education, p.work_place, p.post, p.home_phone, p.cell_phone, u.id_type_user
  FROM `users` u 
		INNER JOIN `parents` p ON u.id_user=p.id_parent
  WHERE u.id_type_user=4
  ORDER BY u.second_name, u.first_name, u.patronymic;

CREATE VIEW v_Teachers (sn, fn, pt, email, paswd, info, type_user) as
	SELECT u.second_name, u.first_name, u.patronymic, u.email, u.password, t.info, u.id_type_user
	FROM `users` u
		INNER JOIN `teachers` t ON u.id_user=t.id_teacher
  WHERE u.id_type_user=1
  ORDER BY u.second_name, u.first_name, u.patronymic;	

CREATE VIEW v_Elders (sn, fn, pt, email, paswd, home_address, cell_phone, grp, type_user) as
	SELECT u.second_name, u.first_name, u.patronymic, u.email, u.password, s.home_address, s.cell_phone, g.description, u.id_type_user
	FROM `users` u 
		INNER JOIN `students` s ON u.id_user=s.id_student
		INNER JOIN `groups` g ON s.grp=g.grp
	WHERE u.id_type_user=2
	ORDER BY u.second_name, u.first_name, u.patronymic;










CREATE VIEW v_Groups (id_grp, grp, spec, budget) as
	SELECT g.grp, g.description, s.description, g.is_budget 
	FROM `groups` g 
		INNER JOIN `specialty` s ON g.code_spec=s.id_spec
	ORDER BY g.description;

CREATE VIEW v_Specialtyes (id_spec, code_spec, descp, pdf) as
	SELECT `id_spec`, `code_spec`, `description`, `pdf_file`
	FROM `specialty`
	ORDER BY `description`;

CREATE VIEW v_Subjects (id_subject, descp) as
	SELECT `id_subject`, `description`
	FROM `subjects`
	ORDER BY `description`;
	
CREATE VIEW v_Relations (descp) as
	SELECT `description`
	FROM `relations`
	ORDER BY `description`;
	
CREATE VIEW v_News (id_news, caption, content, author, email, dp) as
	SELECT n.id_news, n.caption, n.content, CONCAT(u.second_name, ' ', LEFT(u.first_name, 1), '. ', LEFT(u.patronymic, 1), '.') as author, u.email, n.date_publication
	FROM `news` n
		INNER JOIN `users` u ON n.id_author=u.id_user
	ORDER BY n.date_publication, n.caption;








CREATE VIEW v_Traffic (fn, sn, pt, email, date_visit, count_passed_hours, count_all_hours) as
	SELECT u.second_name, u.first_name, u.patronymic, u.email, s_t.date_visit, s_t.count_passed_hours, s_t.count_all_hours
	FROM `student_traffic` s_t
		INNER JOIN `students` s ON s_t.id_student=s.id_student
		INNER JOIN `users` u ON s.id_student=u.id_user
	WHERE u.id_type_user=4
	ORDER BY u.second_name, u.first_name, u.patronymic;
	
CREATE VIEW v_Tests (id_test, author, test_caption, subject_id) as
  SELECT id_test, id_teacher, caption, id_subject FROM `tests`
  ORDER BY id_test
  