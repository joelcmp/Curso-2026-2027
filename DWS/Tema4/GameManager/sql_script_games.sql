drop database if exists game_manager;
create database game_manager;
use game_manager;

drop table if exists play;
drop table if exists game;

create table game (
    id_game int auto_increment primary key,
    title varchar(50) not null
);

create table play (
    id_play int auto_increment primary key,
    player varchar(50) not null,
    id_game int not null,
    foreign key (id_game) references game(id_game)
);

-- ALTA JUEGO
drop procedure if exists Add_game;
delimiter //
create procedure Add_game(in _title varchar(50), out _res int)
begin
    IF (_title = "" OR _title IS NULL) THEN SET _res = -1;
    ELSE
        insert into game(title) values(_title);
        set _res = 0;
    END IF;
END//
DELIMITER ;

-- MODIFICAR JUEGO (¡Ojo al WHERE!)
drop procedure if exists Modify_game;
delimiter //
create procedure Modify_game(in _id_game int, in _title varchar(50), out _res int)
begin
    IF (_title = "" OR _title IS NULL) THEN SET _res = -1;
    ELSE
        update game set title = _title where id_game = _id_game;
        set _res = 0;
    END IF;
END//
DELIMITER ;

-- BORRAR JUEGO (Opcional, pero lo añadimos para completar)
drop procedure if exists Delete_game;
delimiter //
create procedure Delete_game(in _id_game int, out _res int)
begin
    delete from game where id_game = _id_game;
    set _res = 0;
END//
DELIMITER ;

-- LISTAR JUEGOS
drop procedure if exists List_games;
delimiter //
create procedure List_games()
begin
    select * from game order by id_game;
END//
DELIMITER ;

-- OBTENER UN JUEGO (Para validar)
drop procedure if exists Get_game;
delimiter //
create procedure Get_game(in _id_game int)
begin
    select * from game where id_game = _id_game;
END//
DELIMITER ;

-- ALTA PARTIDA
drop procedure if exists Add_play;
delimiter //
create procedure Add_play(in _player varchar(50), in _id_game int, out _res int)
begin
    IF (_player = "" OR _player IS NULL) THEN SET _res = -1;
    ELSE
        insert into play(player, id_game) values(_player, _id_game);
        set _res = 0;
    END IF;
END//
DELIMITER ;

-- MODIFICAR PARTIDA
drop procedure if exists Modify_play;
delimiter //
create procedure Modify_play(in _id_play int, in _player varchar(50), in _id_game int, out _res int)
begin
    IF (_player = "" OR _player IS NULL) THEN SET _res = -1;
    ELSE
        update play set player = _player, id_game = _id_game where id_play = _id_play;
        set _res = 0;
    END IF;
END//
DELIMITER ;

-- LISTAR PARTIDAS CON JOIN (Muestra el título del juego)
drop procedure if exists List_plays;
delimiter //
create procedure List_plays()
begin
    select p.id_play, p.player, p.id_game, g.title as game_title
    from play p
    inner join game g on p.id_game = g.id_game
    order by p.id_play;
END//
DELIMITER ;