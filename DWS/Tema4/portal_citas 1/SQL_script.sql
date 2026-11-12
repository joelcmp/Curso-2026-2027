drop database if exists clinic_manager;
create database clinic_manager;
use clinic_manager;

drop table if exists appointment;
drop table if exists doctor;

create table doctor (
    id_doctor int auto_increment primary key,
    name_doctor varchar(50) not null,
    surname_doctor varchar(50) not null
);

create table appointment (
    id_appointment int auto_increment primary key,
    patient_name varchar(50) not null,
    specialty enum('Medicina General', 'Pediatría', 'Traumatología', 'Dermatología') not null,
    date_appointment datetime not null,
    id_doctor int not null,
    foreign key (id_doctor) references doctor(id_doctor)
);

-- PROCEDURES

drop procedure if exists Add_doctor;
delimiter //
create procedure Add_doctor(
    in _name_doctor varchar(50),
    in _surname_doctor varchar(50),
    out _res int
)
begin
    IF (_name_doctor = "" OR _name_doctor IS NULL) THEN
        SET _res = -1;
    ELSEIF (_surname_doctor = "" OR _surname_doctor IS NULL) THEN
        SET _res = -2;
    ELSE
        insert into doctor(name_doctor, surname_doctor) values(_name_doctor, _surname_doctor);
        set _res = 0;
    END IF;
END//
DELIMITER ;

drop procedure if exists Add_appointment;
delimiter //
create procedure Add_appointment(
    in _patient_name varchar(50),
    in _specialty varchar(50),
    in _date_appointment datetime,
    in _id_doctor int,
    out _res int
)
begin
    IF (_patient_name = "" OR _patient_name IS NULL) THEN
        SET _res = -1;
    ELSEIF (_specialty = "" OR _specialty IS NULL) THEN
        SET _res = -2;
    ELSEIF (_date_appointment IS NULL) THEN
        SET _res = -3;
    ELSEIF (_date_appointment <= NOW()) THEN
        SET _res = -4;
    ELSE
        insert into appointment(patient_name, specialty, date_appointment, id_doctor) 
        values(_patient_name, _specialty, _date_appointment, _id_doctor);
        set _res = 0;
    END IF;
END//
DELIMITER ;

drop procedure if exists Modify_appointment;
delimiter //
create procedure Modify_appointment(
    in _id_appointment int,
    in _patient_name varchar(50),
    in _specialty varchar(50),
    in _date_appointment datetime,
    in _id_doctor int,
    out _res int
)
begin
    IF (_patient_name = "" OR _patient_name IS NULL) THEN
        SET _res = -1;
    ELSEIF (_specialty = "" OR _specialty IS NULL) THEN
        SET _res = -2;
    ELSEIF (_date_appointment IS NULL) THEN
        SET _res = -3;
    ELSEIF (_date_appointment <= NOW()) THEN
        SET _res = -4;
    ELSE
        update appointment 
        set patient_name = _patient_name, specialty = _specialty, date_appointment = _date_appointment, id_doctor = _id_doctor
        where id_appointment = _id_appointment;
        set _res = 0;
    END IF;
END//
DELIMITER ;

drop procedure if exists List_doctors;
delimiter //
create procedure List_doctors()
begin
    select * from doctor order by id_doctor;
END//
DELIMITER ;

drop procedure if exists Get_doctor;
delimiter //
create procedure Get_doctor(in _id_doctor int)
begin
    select * from doctor where id_doctor = _id_doctor;
END//
DELIMITER ;

drop procedure if exists List_appointments;
delimiter //
create procedure List_appointments()
begin
    select * from appointment order by id_appointment;
END//
DELIMITER ;