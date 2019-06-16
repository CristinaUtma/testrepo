
Create table Players (

Memberid nvarchar(20) primary key,
FName nvarchar(30),
LName Nvarchar(30),
Email Nvarchar(30),
Phone Nvarchar(30)
)

go

Create table BoardGame
(
  Memberid nvarchar(20),
  Boardgame nvarchar(30),
  Position nvarchar(30),
  Notes Nvarchar(30),
  Dates Nvarchar(30),
  Eventt Nvarchar(30)
  FOREIGN KEY (Memberid) REFERENCES Players(Memberid)  on  DELETE CASCADE
)

GO


Insert into Players values (1,'Dave', 'Muller', 'Ddm@gmail.com', '111111')
go
Insert into Players values (2,'Pete', 'Davidson', 'ptd@gmail.com', '222222')
go
Insert into Players values (3,'Mark', 'Lopez', 'MkLop@hotmail.com.com', '333333')
go
Insert into Players values (4,'Jane', 'Lopez', 'JaneLop@hotmail.com.com', '44444')
go
Insert into Players values (5,'Sam', 'Nair', 'SamN@hotmail.com.com', '55555')
go
Insert into BoardGame values(1, 'Chess', '1','Expert Player','23/3/2018','Main event')
go
Insert into BoardGame values(2, 'BackGamon', '1','Expert Player','23/3/2018','Main event')
go
Insert into BoardGame values(3, 'Checkers', '3','New Player','23/3/2018','Main event')

go 
Insert into BoardGame values(5, 'chess ', '3','New Player','23/3/2018','Main event')
go
Create table Schedule
(  id int identity  primary key,
   Days nvarchar(15),
   Times nvarchar(15),
   Venue nvarchar(20),
  
)
go
insert into Schedule values ('Monday', '5:00 pm', 'Room 3');
go
insert into Schedule values ('Tuesday', '5:00pm', 'Room 2');
go
insert into Schedule values ('Wednesday', 'No game', 'No game');
go
insert into Schedule values ('Thursday', '6:00 pm', 'Room 3');
go
insert into Schedule values ('Friday', 'No Game', 'No Game');

go
Create table Score
(  Memberid nvarchar(20),
   Boardgame nvarchar(30),
    Dates Nvarchar(30),
    Eventt Nvarchar(30),
	Score nvarchar(30)
  FOREIGN KEY (Memberid) REFERENCES Players(Memberid)  on  DELETE CASCADE
)
go
insert into Score values('2','Checkers', getdate()-1,'Main event', '100')
go






 



