create table project_1(
user_name varchar(50),
user_id varchar(50) primary key,
user_pw varchar(50),
user_email varchar(30),
user_phoneNumber varchar(20),
user_telephone varchar(20),
user_postcode varchar(30),
user_address varchar(100),
user_detailaddress varchar(100),
sms_receive varchar(5),
mail_receive varchar(5),
administer varchar(10)
)

create table project_1_admin(
no int auto_increment,
type varchar(20),
title varchar(100),
teacher varchar(30),
level varchar(10),
id varchar(30),
start_date varchar(20),
end_date varchar(30),
thumbnail varchar(300)
)

create table project_1_review(
no int auto_increment primary key,
user_id varchar(50,
lec_type varchar(20),
lec_title varchar(100),
lec_teacher varchar(30),
title text,
content text,
star int,
review_date datetime,,
hit int,
attach varchar(300)
)