drop database fyps;

create database fyps;


create table fyps_user
(
	fyps_user_id   	varchar(12) not NULL,
	fyps_user_name	varchar(50),
	fyps_user_role	varchar(50),
	fyps_password	varchar(10)
);

ALTER TABLE fyps_user ADD PRIMARY KEY (fyps_user_id);


CREATE TABLE fyps_faculty
(
	fyps_faculty_id		VARCHAR (12) not NULL,
	fyps_faculty_name	 	VARCHAR (50),
	fyps_faculty_address		VARCHAR (100),
	fyps_faculty_contact		INT (15),
	fyps_faculty_emailid		VARCHAR (50),
	fyps_faculty_department		VARCHAR (50)
 );
	
ALTER TABLE fyps_faculty ADD PRIMARY KEY (fyps_faculty_id);

CREATE TABLE fyps_student
(
	fyps_student_id		VARCHAR(12) not NULL,
	fyps_student_name	varchar(50),
	fyps_student_address	varchar(100),
	fyps_student_contact	int(15),
	fyps_student_emailid	varchar(50)
);

ALTER TABLE fyps_student ADD PRIMARY KEY (fyps_student_id);

CREATE TABLE fyps_project
(
	fyps_project_id		VARCHAR(12) not NULL,
	fyps_project_title	VARCHAR(100),
	fyps_project_domain	VARCHAR(50),
	fyps_project_department	VARCHAR(50)
);

ALTER TABLE fyps_project ADD PRIMARY KEY (fyps_project_id);

CREATE TABLE fyps_faculty_project
(
	fyps_rel_faculty_id	varchar(12) not NULL,
	fyps_rel_project_id	varchar(12) not NULL
);

ALTER TABLE fyps_faculty_project 
ADD PRIMARY KEY (fyps_rel_faculty_id,fyps_rel_project_id);

CREATE TABLE fyps_project_student
(
	fyps_rel_student_id	varchar(12) NOT NULL,
	fyps_rel_project_id	varchar(12) NOT NULL
);
	
ALTER TABLE fyps_project_student
ADD PRIMARY KEY (fyps_rel_student_id, fyps_rel_project_id);
