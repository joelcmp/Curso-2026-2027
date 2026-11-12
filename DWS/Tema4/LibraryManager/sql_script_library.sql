drop database if exists library_manager;
create database library_manager;
use library_manager;

drop table if exists loan;
drop table if exists book;

create table book (
    id_book int auto_increment primary key,
    title varchar(100) not null,
    author varchar(50) not null
);

create table loan (
    id_loan int auto_increment primary key,
    borrower varchar(50) not null,
    loan_date date not null,
    id_book int not null,
    foreign key (id_book) references book(id_book)
);

-- ALTA
drop procedure if exists Add_book;
delimiter //
create procedure Add_book(in _title varchar(100), in _author varchar(50), out _res int)
begin
    IF (_title = "" OR _title IS NULL) THEN SET _res = -1;
    ELSEIF (_author = "" OR _author IS NULL) THEN SET _res = -2;
    ELSE
        insert into book(title, author) values(_title, _author);
        set _res = 0;
    END IF;
END//
DELIMITER ;

-- MODIFICAR (UPDATE)
drop procedure if exists Modify_book;
delimiter //
create procedure Modify_book(in _id_book int, in _title varchar(100), in _author varchar(50), out _res int)
begin
    IF (_title = "" OR _title IS NULL) THEN SET _res = -1;
    ELSEIF (_author = "" OR _author IS NULL) THEN SET _res = -2;
    ELSE
        update book set title = _title, author = _author where id_book = _id_book;
        set _res = 0;
    END IF;
END//
DELIMITER ;

-- BORRAR (DELETE)
drop procedure if exists Delete_book;
delimiter //
create procedure Delete_book(in _id_book int, out _res int)
begin
    delete from book where id_book = _id_book;
    set _res = 0;
END//
DELIMITER ;

-- LISTAR LIBROS
drop procedure if exists List_books;
delimiter //
create procedure List_books()
begin
    select * from book order by id_book;
END//
DELIMITER ;

-- OBTENER UN LIBRO (Para validar)
drop procedure if exists Get_book;
delimiter //
create procedure Get_book(in _id_book int)
begin
    select * from book where id_book = _id_book;
END//
DELIMITER ;

-- ALTA PRÉSTAMO
drop procedure if exists Add_loan;
delimiter //
create procedure Add_loan(in _borrower varchar(50), in _loan_date date, in _id_book int, out _res int)
begin
    IF (_borrower = "" OR _borrower IS NULL) THEN SET _res = -1;
    ELSEIF (_loan_date IS NULL) THEN SET _res = -2;
    ELSE
        insert into loan(borrower, loan_date, id_book) values(_borrower, _loan_date, _id_book);
        set _res = 0;
    END IF;
END//
DELIMITER ;

-- LISTAR PRÉSTAMOS CON JOIN (¡Novedad!)
drop procedure if exists List_loans;
delimiter //
create procedure List_loans()
begin
    select l.id_loan, l.borrower, l.loan_date, l.id_book, b.title as book_title
    from loan l
    inner join book b on l.id_book = b.id_book
    order by l.id_loan;
END//
DELIMITER ;