use yii2basic;

create table Logopedista (
    mail varchar (50) primary key,
    nome varchar (50) not null,
    cognome varchar (50) not null,
    dataNascita date  
);

create table Utente (
    mail varchar (50) primary key,
    nome varchar (50) not null,
    cognome varchar (50) not null,
    dataNascita date
);

create table Caregiver (
    mail varchar (50) primary key,
    nome varchar (50) not null,
    cognome varchar (50) not null,
    dataNascita date,
    utenteAss varchar (50),
    foreign key (utenteAss) references Utente (mail)
);