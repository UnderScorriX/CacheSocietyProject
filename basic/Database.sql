use yii2basic_roberto;

create table Logopedista (
    mail varchar (50) primary key,
    nome varchar (50) not null,
    cognome varchar (50) not null,
    dataNascita date,
    password char(20) not null
);

create table Utente (
    mail varchar (50) primary key,
    nome varchar (50) not null,
    cognome varchar (50) not null,
    dataNascita date,
    password char(20) not null
);

create table Caregiver (
    mail varchar (50) primary key,
    nome varchar (50) not null,
    cognome varchar (50) not null,
    dataNascita date,
    utenteAss varchar (50),
    password char(20) not null,
    foreign key (utenteAss) references Utente (mail)
);