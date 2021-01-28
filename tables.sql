-- User Table
create table `user` (
	email varchar(100),
	name varchar(100) not null,
	phoneNumber varchar(10),
	password varchar(255) not null,
	verified int(1) not null,
	vkey varchar(255),
	primary key(email)
);


-- Category Table
create table category (
	categoryName varchar(100),
	description varchar(200) not null,
	primary key(categoryName)
);

-- Category Table Sample Data
insert into category(categoryName, description) values('RealEstate', 'Civil, Construction, Land Disputes, Residential Complex');
insert into category(categoryName, description) values('IT', 'Software, Hardware, Training');
insert into category(categoryName, description) values('Health and Fitness', 'Physical Health, Mental Health, Therapies');
insert into category(categoryName, description) values('Entrepreneurship', 'Company laws, Legal matters, Mentorship');
insert into category(categoryName, description) values('Others', 'Psychology, art, sports');


-- UserQuestion Table
create table userquestion (
	questionid int auto_increment,
	category varchar(100),
	topic text not null,
	question text not null,
	email varchar(100),
	primary key(questionid),
	foreign key (category) references category(categoryName)
);

-- UserQuestion Table Sample Data
insert into userquestion(category, topic, question) values('IT', 'Web hosting', 'I need to know the best mode of web hosting');
