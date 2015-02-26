-- add by wujiabo 2015-01-28

CREATE TABLE task(
	id BIGINT NOT NULL AUTO_INCREMENT,
	name VARCHAR(255) DEFAULT '',
	note MEDIUMTEXT,
	date VARCHAR(255) DEFAULT '',
	create_time datetime,
	update_time datetime,
	execute int(10) default '0',   --Ö´ÐÐÇé¿ö
	PRIMARY KEY(id)
);