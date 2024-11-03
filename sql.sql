create table admin
(
user varchar(15) primary key not null,
psw varchar(20) not null
);
insert into admin(user,psw) values('root1','111111');
insert into admin(user,psw) values('root2','111111');
insert into admin(user,psw) values('root3','111111');