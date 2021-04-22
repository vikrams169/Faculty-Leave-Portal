CREATE TABLE Faculty(facultyID VARCHAR(4) NOT NULL PRIMARY KEY,
			name VARCHAR(20) NOT NULL,
			password VARCHAR(20) NOT NULL,
			dept VARCHAR(3) NOT NULL,
			designation VARCHAR(8) NOT NULL,
			total_leaves INTEGER NOT NULL,
			left_leaves INTEGER) ;
			
			

CREATE TABLE Leave_App(leaveID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
			facultyID VARCHAR(3) NOT NULL,
			from_date date NOT NULL,
			to_date date NOT NULL,
			purpose VARCHAR(30) NOT NULL,
			description VARCHAR(100),
			status VARCHAR(8) NOT NULL DEFAULT 'on hold',
			date_appl date NOT NULL DEFAULT CURRENT_DATE,
			retrospective_leave INT NOT NULL DEFAULT 0,
			FOREIGN KEY(facultyID) REFERENCES Faculty(facultyID)) ;
			
			

CREATE TABLE Hod_cse(leaveID INTEGER NOT NULL PRIMARY KEY) ;
CREATE TABLE Hod_ee(leaveID INTEGER NOT NULL PRIMARY KEY) ;
CREATE TABLE Hod_me(leaveID INTEGER NOT NULL PRIMARY KEY) ;
CREATE TABLE Dean_FA(leaveID INTEGER NOT NULL PRIMARY KEY) ;
CREATE TABLE Director(leaveID INTEGER NOT NULL PRIMARY KEY) ;



CREATE TABLE act_log(logID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
			type_of_act VARCHAR(50) NOT NULL,
			change_from VARCHAR(10) NOT NULL,
			change_to VARCHAR(10) NOT NULL,
			leaveID INTEGER,
			facultyID VARCHAR(3),
			made_on timestamp DEFAULT CURRENT_TIMESTAMP) ;
			
			

INSERT INTO Faculty(facultyID, name, password, dept, designation, total_leaves, left_leaves) VALUES('CS1', 'Nitin Auluck', 'nitincse', 'CSE', 'HOD', 20, 20) ;
INSERT INTO Faculty(facultyID, name, password, dept, designation, total_leaves, left_leaves) VALUES('CS2', 'Viswanath Gunturi', 'viswanathcse', 'CSE', 'Fac', 20, 20) ;
INSERT INTO Faculty(facultyID, name, password, dept, designation, total_leaves, left_leaves) VALUES('CS3', 'Apurva Mudgal', 'apurvacse', 'CSE', 'Fac', 20, 20) ;
INSERT INTO Faculty(facultyID, name, password, dept, designation, total_leaves, left_leaves) VALUES('CS4', 'Neeraj Goel', 'neerajcse', 'CSE', 'Fac', 20, 20) ;
INSERT INTO Faculty(facultyID, name, password, dept, designation, total_leaves, left_leaves) VALUES('CS5', 'Sujata Pal', 'sujatacse', 'CSE', 'Fac', 20, 20) ;
INSERT INTO Faculty(facultyID, name, password, dept, designation, total_leaves, left_leaves) VALUES('EE1', 'Ravibabu M', 'raviee', 'EE', 'HOD', 20, 20) ;
INSERT INTO Faculty(facultyID, name, password, dept, designation, total_leaves, left_leaves) VALUES('EE2', 'Rohit Sharma', 'rohitee', 'EE', 'Fac', 20, 20) ;
INSERT INTO Faculty(facultyID, name, password, dept, designation, total_leaves, left_leaves) VALUES('EE3', 'Sanjay Roy', 'sanjayee', 'EE', 'Fac', 20, 20) ;
INSERT INTO Faculty(facultyID, name, password, dept, designation, total_leaves, left_leaves) VALUES('EE4', 'Sam Darshi', 'samee', 'EE', 'Fac', 20, 20) ;
INSERT INTO Faculty(facultyID, name, password, dept, designation, total_leaves, left_leaves) VALUES('EE5', 'Devarshi Das', 'devarshiee', 'EE', 'Fac', 20, 20) ;
INSERT INTO Faculty(facultyID, name, password, dept, designation, total_leaves, left_leaves) VALUES('ME1', 'Ekta Singla', 'ektame', 'ME', 'HOD', 20, 20) ;
INSERT INTO Faculty(facultyID, name, password, dept, designation, total_leaves, left_leaves) VALUES('ME2', 'Ramjee Repaka', 'ramjeeme', 'ME', 'Fac', 20, 20) ;
INSERT INTO Faculty(facultyID, name, password, dept, designation, total_leaves, left_leaves) VALUES('ME3', 'Sachin Kumar', 'sachinme', 'ME', 'Fac', 20, 20) ;
INSERT INTO Faculty(facultyID, name, password, dept, designation, total_leaves, left_leaves) VALUES('ME4', 'Dhiraj Mahajan', 'dhirajme', 'ME', 'Fac', 20, 20) ;
INSERT INTO Faculty(facultyID, name, password, dept, designation, total_leaves, left_leaves) VALUES('ME5', 'Harpreet Singh', 'harpreetme', 'ME', 'Fac', 20, 20) ;
INSERT INTO Faculty(facultyID, name, password, dept, designation, total_leaves, left_leaves) VALUES('DE1', 'Ramesh Garg', 'rameshfaa', 'CRO', 'DEANFA', 20, 20) ;
INSERT INTO Faculty(facultyID, name, password, dept, designation, total_leaves, left_leaves) VALUES('DE2', 'RP Chhabra', 'chhabraaa', 'CRO', 'DEANAA', 20, 20) ;
INSERT INTO Faculty(facultyID, name, password, dept, designation, total_leaves, left_leaves) VALUES('DE3', 'CC Reddy', 'reddysa', 'CRO', 'DEANSA', 20, 20) ;
INSERT INTO Faculty(facultyID, name, password, dept, designation, total_leaves, left_leaves) VALUES('DR1', 'Rajeev Ahuja', 'rajeevdir', 'CRO', 'DIR', 20, 20) ;



DELIMITER $$
CREATE PROCEDURE edit_leave_application(
leave_id_num INT,
person text,
remark text,
action_made text
)
BEGIN
	DECLARE new_table_name text DEFAULT ' ' ;
	DECLARE dynamic_text text DEFAULT ' ' ;
	DECLARE department VARCHAR(3) DEFAULT ' ' ;
	DECLARE retro_leave INT DEFAULT 0 ;
	SET new_table_name = CONCAT('application_table_', CAST(leave_id_num AS CHAR)) ;
	SELECT DISTINCT Faculty.dept INTO department from Faculty, Leave_App where Faculty.facultyID = Leave_App.facultyID and Leave_App.LeaveID = leave_id_num ;
	SET dynamic_text = CONCAT('INSERT INTO ', new_table_name , '(person, remark, action) VALUES(','?',',','?',',','?',') ;') ;
	PREPARE stmt from dynamic_text ;
	EXECUTE stmt USING person, remark, action_made ;
	DEALLOCATE PREPARE stmt ;
	IF person = 'HOD' THEN
		IF action_made = 'rejected' THEN
			IF department = 'CSE' THEN
				DELETE from HOD_cse where leaveID = leave_id_num ;
			ELSEIF department = 'EE' THEN
				DELETE from HOD_ee where leaveID = leave_id_num ;
			ELSEIF department = 'ME' THEN
				DELETE from HOD_me where leaveID = leave_id_num ;
			END IF ;
			UPDATE Leave_App SET status = 'rejected' where leaveID = leave_id_num ;
			INSERT INTO act_log(type_of_act, change_from, change_to, leaveID) VALUES('Application Update', 'on hold', 'rejected', leave_id_num) ;
		ELSEIF action_made = 'approved' THEN
			IF department = 'CSE' THEN
				DELETE from HOD_cse where leaveID = leave_id_num ;
			ELSEIF department = 'EE' THEN
				DELETE from HOD_ee where leaveID = leave_id_num ;
			ELSEIF department = 'ME' THEN
				DELETE from HOD_me where leaveID = leave_id_num ;
			END IF ;
			INSERT INTO Dean_FA(leaveID) VALUES(leave_id_num) ;
		END IF ;
	ELSEIF person = 'DEANFA' THEN
		IF action_made = 'rejected' THEN
			DELETE from Dean_FA where leaveID = leave_id_num ;
			UPDATE Leave_App SET status = 'rejected' where leaveID = leave_id_num ;
			INSERT INTO act_log(type_of_act, change_from, change_to, leaveID) VALUES('Application Update', 'on hold', 'rejected', leave_id_num) ;
		ELSEIF action_made = 'approved' THEN
			DELETE from Dean_FA where leaveID = leave_id_num ;
			SELECT retrospective_leave INTO retro_leave from Leave_App where leaveID = leave_id_num ;
			IF retro_leave = 1 THEN
				INSERT INTO Director(leaveID) VALUES(leave_id_num) ;
			ELSE
				UPDATE Leave_App SET status = 'approved' where leaveID = leave_id_num ;
				INSERT INTO act_log(type_of_act, change_from, change_to, leaveID) VALUES('Application Update', 'on hold', 'approved', leave_id_num) ;
			END IF ;
		END IF ;
	ELSEIF person = 'DIR' THEN
		IF action_made = 'rejected' THEN
			DELETE from Director where leaveID = leave_id_num ;
			UPDATE Leave_App SET status = 'rejected' where leaveID = leave_id_num ;
			INSERT INTO act_log(type_of_act, change_from, change_to, leaveID) VALUES('Application Update', 'on hold', 'rejected', leave_id_num) ;
		ELSEIF action_made = 'approved' THEN
			DELETE from Director where leaveID = leave_id_num ;
			UPDATE Leave_App SET status = 'approved' where leaveID = leave_id_num ;
			INSERT INTO act_log(type_of_act, change_from, change_to, leaveID) VALUES('Application Update', 'on hold', 'approved', leave_id_num) ;
		END IF ;
	END IF ;
END $$
DELIMITER ;





DELIMITER $$
CREATE PROCEDURE change_designation(
faculty_id VARCHAR(3),
new_designation VARCHAR(8)
)
BEGIN
	DECLARE old_designation VARCHAR(8) DEFAULT ' ' ;
	SELECT designation into old_designation from Faculty where facultyID = faculty_id ;
	UPDATE Faculty SET designation = new_designation where facultyID = faculty_id ;
	INSERT INTO act_log(type_of_act, change_from, change_to, facultyID) VALUES('change_designation', old_designation, new_designation, faculty_id) ;
END $$
DELIMITER ;





DELIMITER $$
CREATE PROCEDURE new_leave_application(
faculty_id VARCHAR(3),
from_date_ VARCHAR(20),
to_date_ VARCHAR(20),
purpose_ VARCHAR(100),
description_ text
)
main_label : BEGIN
	DECLARE designation_ varchar(100) DEFAULT ' ' ;
	DECLARE department varchar(3) DEFAULT ' ' ;
	DECLARE new_table_name text DEFAULT ' ' ;
	DECLARE num_days_leave INT DEFAULT 0 ;
	DECLARE left_leave_days INT DEFAULT 0 ;
	DECLARE ongoing_leave_applications INT DEFAULT 0 ;
	DECLARE dynamic_text text DEFAULT ' ' ;
	DECLARE leave_id INT DEFAULT 0 ;
	INSERT INTO Leave_App(facultyID, from_date, to_date, purpose, description) VALUES(faculty_id, STR_TO_DATE(from_date_,'%Y-%m-%d'), STR_TO_DATE(to_date_,'%Y-%m-%d'), purpose_, description_) ;
	SELECT max(leaveID) INTO leave_id from Leave_App ;
	SET new_table_name = CONCAT('application_table_', CAST(leave_id AS CHAR)) ;
	SET dynamic_text = CONCAT('CREATE TABLE ',new_table_name,'(action_number INT NOT NULL AUTO_INCREMENT PRIMARY KEY, person VARCHAR(8), remark VARCHAR(100), action VARCHAR(8), timestamp_record timestamp DEFAULT CURRENT_TIMESTAMP) ;') ;
	PREPARE stmt from dynamic_text ;
	EXECUTE stmt ;
	DEALLOCATE PREPARE stmt ;
	SET num_days_leave = DATEDIFF(to_date_, from_date_) ;
	SELECT designation INTO designation_ from Faculty where facultyID = faculty_id ;
	SELECT count(*) INTO ongoing_leave_applications from Faculty INNER JOIN Leave_App where Faculty.facultyID = faculty_id and Leave_App.facultyID = faculty_id and Leave_App.status = 'on hold' ;
	IF ongoing_leave_applications > 1 THEN 
		UPDATE Leave_App SET status = 'rejected' where leaveID = leave_id ;
		INSERT INTO act_log(type_of_act, change_from, change_to, leaveID) VALUES('Application Update', 'on hold', 'rejected', leave_id) ;
		LEAVE main_label ;
	END IF ;
	SELECT dept INTO department from Faculty where facultyID = faculty_id ;
	select left_leaves INTO left_leave_days from Faculty where facultyID = faculty_id ;
	IF DATEDIFF(CAST(CURRENT_DATE AS CHAR), to_date_) > 0 OR (DATEDIFF(CAST(CURRENT_DATE AS CHAR), to_date_) < 0 AND DATEDIFF(CAST(CURRENT_DATE AS CHAR), from_date_) > 0) THEN
		UPDATE Leave_App SET retrospective_leave = 1 where leaveID = leave_id ;
	END IF ;
	IF left_leave_days <= 0 THEN
		UPDATE Leave_App SET status = 'rejected' where leaveID = leave_id ;
		INSERT INTO act_log(type_of_act, change_from, change_to, leaveID) VALUES('Application Update', 'on hold', 'rejected', leave_id) ;
		LEAVE main_label ;
	ELSEIF left_leave_days < num_days_leave THEN
		SET to_date_ = ADDDATE(from_date_, left_leave_days) ;
		UPDATE Leave_App SET to_date = to_date_ where leaveID = leave_id ;
	END IF ;
	IF designation_ = 'Fac' THEN
		IF department = 'CSE' THEN
			INSERT INTO HOD_cse(leaveID) VALUES(leave_id) ;
		ELSEIF department = 'EE' THEN
			INSERT INTO HOD_ee(leaveID) VALUES(leave_id) ;
		ELSEIF department = 'ME' THEN
			INSERT INTO HOD_me(leaveID) VALUES(leave_id) ;
		END IF ;
	ELSEIF designation_ = 'HOD' THEN
		INSERT INTO Director(leaveID) VALUES(leave_id) ;
	ELSEIF designation_ LIKE 'DEAN%' THEN
		INSERT INTO Director(leaveID) VALUES(leave_id) ;
	END IF ;
END $$
DELIMITER ;





DELIMITER $$
CREATE TRIGGER deduct_accepted_leave
AFTER UPDATE ON LEAVE_APP FOR EACH ROW
BEGIN
	DECLARE num_days_leave INT ;
    DECLARE left_leave_days INT ;
	IF NEW.status = 'approved' THEN
		SET num_days_leave = DATEDIFF(NEW.to_date, NEW.from_date) ;
		SELECT left_leaves INTO left_leave_days from Faculty where facultyID = NEW.facultyID ;
		IF left_leave_days > num_days_leave THEN 
			SET left_leave_days = left_leave_days - num_days_leave ; 
		ELSE
			SET left_leave_days = 0 ;
		END IF ;
		UPDATE Faculty SET left_leaves = left_leave_days where FacultyID = NEW.FacultyID ;
	END IF ;
END $$
DELIMITER ;




