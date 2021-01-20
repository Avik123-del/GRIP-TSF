/*Created by:-Avik Tarafdar*/
create table customer(
    ID              integer         primary key,
    NAME            varchar(30)                ,
    EMAIL           varchar(30)                ,
    CURRENT_BALANCE integer
);
INSERT INTO customer(ID,NAME,EMAIL,CURRENT_BALANCE)VALUES
(1,'Avik Tarafdar','Some4144@gmail.com',20000),
(2,'Anupam Ghosh','Anu567@gmail.com',33000),
(3,'Pratik Haldar','pratik5431@gmail.com',70000),
(4,'Arpan Kumar','Kumar467@gmail.com',93000),
(5,'Aman Barabhuia','aman2001@gmail.com',83000);


create table Transfers(
    sender      integer,
    receiver    integer,
    amount      integer
);