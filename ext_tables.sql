#
# Add SQL definition of database tables
#
CREATE TABLE pages (
    ku_course_about varchar(255) DEFAULT '' NOT NULL,
    ku_course_starttime date default NULL,
    ku_course_level varchar(100) DEFAULT '' NOT NULL,
);