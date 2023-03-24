create database AlatechMachines collate=utf8mb4_unicode_ci;
use AlatechMachines;
create table brands(
	id int primary key auto_increment,
    nome varchar(255)
);
create table motherboards (
	id int primary key auto_increment,
    nome varchar(255),
    URLImagem varchar(255), 
    marcaId int, 
    soquete varchar(10),
    tipoRam varchar(4),
    slotsRam int,
    TDPMax int,
    slotsSata int,
	slotsM2 int, 
    slotsPCI int,
    foreign key (marcaId) references brands(id)
);
create table processors(
	id int primary key auto_increment,
	nome varchar(255),
    URLImagem varchar(255), 
    marcaId int, 
    soquete varchar(10), 
    quantNucleos int,
	freqBase varchar(100), 
    freqMax varchar(100),
    Qtdcache varchar(100), 
    TDP int,
    foreign key (marcaId) references brands(id)
);
create table `ram-memories`(
	id int primary key auto_increment,
	nome varchar(255),
    URLImagem varchar(255), 
    marcaId int, 
	qtdMemoria varchar(255),
    tipo varchar(4),
    freq varchar(100),
    foreign key (marcaId) references brands(id)
);
create table  `storage-devices`(
	id int primary key auto_increment,
	nome varchar(255),
    URLImagem varchar(255), 
    marcaId int,
    tipo varchar(3),
    qtdMemoria varchar(255),
    tipoEntrada varchar(4),
    foreign key (marcaId) references brands(id)
);
create table  `graphic-cards`(
	id int primary key auto_increment,
	nome varchar(255),
    URLImagem varchar(255), 
    marcaId int, 
    qtdMemoria varchar(255),
    tipoMemoria varchar(5),
    potMin int,
	SLICrossfire tinyint,
    foreign key (marcaId) references brands(id)
);
create table `power-supplies`(
	id int primary key auto_increment,
	nome varchar(255),
    URLImagem varchar(255), 
    marcaId int, 
    potencia int,
    classificacao varchar(100),
    foreign key (marcaId) references brands(id)
);
create table machines (
	id int primary key auto_increment,
    URLImagem varchar(255), 
    qtdMemoria int,
    RamId int,
    placaMaeId int,
    processadorId int,
    armazenamentoId int,
    qtdArmazenamento int,
    placaVideoId int, 
    fonteId int,
    qtdPlacasVideo int,
    
    foreign key (RamId) references `ram-memories`(id),
	foreign key (placaMaeId) references motherboards(id),
    foreign key (processadorId) references processors(id),
    foreign key (placaVideoId) references `graphic-cards`(id),
    foreign key (fonteId) references `power-supplies`(id),
    foreign key (armazenamentoId) references `storage-devices`(id)
);
create table usuario(
	id int primary key auto_increment,
    username varchar(255),
    password varchar(255)
)

