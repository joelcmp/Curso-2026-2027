drop database if exists concert_manager;
create database concert_manager;
use concert_manager;

drop table if exists entrance;
drop table if exists concert;

create table concert(
	id_concert int auto_increment primary key,
    name_band varchar(64) not null,
    date_concert date not null,
    price decimal(6,2) not null
);

create table entrance (
	id_entrance int auto_increment primary key,
    adquisition_date date not null,
    id_concert int not null,
    foreign key (id_concert) references concert(id_concert)
);

drop procedure if exists Add_concert;

delimiter //
create procedure Add_concert(
	in _name_band varchar(64),
	in _date_concert date,
    in _price decimal(6,2),
    out _res int
)
begin
	IF (_name_band = "" or _name_band is null OR _date_concert is null or _price is null) THEN
        SET _res = -1;
    ELSEIF (_date_concert < curdate()) THEN
        SET _res = -2;
    ELSEIF (_price < 0) THEN
		set _res = -3;
    ELSE    
        insert into concert(name_band, date_concert, price)
        values(_name_band, _date_concert, _price);
        set _res = 0;
    END IF;
END//
DELIMITER ;

drop procedure if exists Register_entrance;

delimiter //
create procedure Register_entrance(
	in _adquisition_date date,
	in _id_concert int,
    out _res int
)
begin
	declare aux int;
	set aux = null;

	IF (_adquisition_date is null) THEN
        SET _res = -1;
    ELSEIF (_id_concert is null) THEN
		set _res = -1;
    ELSE 
		select id_concert into aux from concert where id_concert = _id_concert;
		if (aux is null) THEN
			set _res = -2;
		ELSE 
			insert into entrance(adquisition_date, id_concert)
			values(_adquisition_date, _id_concert);
			set _res = 0;
		END IF;
    END IF;
END//
DELIMITER ;

drop procedure if exists List_concert;

delimiter //
create procedure List_concert()
begin
	select * from concert order by id_concert;
END//
DELIMITER ;

drop procedure if exists List_entrance;

delimiter //
create procedure List_entrance()
begin
	select * from entrance order by id_entrance;
END//
DELIMITER ;

drop procedure if exists Get_concert;

delimiter //
create procedure Get_concert(
	in _id_concert int
)
begin
	select * from concert where id_concert = _id_concert;
END//
DELIMITER ;