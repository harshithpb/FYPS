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

insert into fyps.fyps_user
(fyps_user_id,fyps_user_name,fyps_user_role,fyps_password)
values
("ADMIN","admin","admin","Admin123$");


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

CREATE TABLE fyps.fyps_project
(
	fyps_project_id		VARCHAR(12) not NULL,
	fyps_project_title	VARCHAR(100),
	fyps_project_domain	VARCHAR(50),
	fyps_project_department	VARCHAR(50),
	fyps_project_grade		VARCHAR(50)
);

ALTER TABLE fyps.fyps_project ADD PRIMARY KEY (fyps_project_id);


CREATE TABLE fyps.fyps_faculty_project
(
	faculty_id	varchar(12) not NULL,
	project_id	varchar(12) not NULL,
	project_name	VARCHAR(12)
);

ALTER TABLE fyps.fyps_faculty_project 
ADD PRIMARY KEY (faculty_id,project_id);

CREATE TABLE fyps.fyps_project_student
(
	student_id	varchar(12) NOT NULL,
	project_id	varchar(12) NOT NULL,
	project_name	VARCHAR(12)
	
);
	
ALTER TABLE fyps.fyps_project_student
ADD PRIMARY KEY (student_id, project_id);