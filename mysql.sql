create database AlatechMachines collate=utf8mb4_unicode_ci;
use AlatechMachines;
create table marcas(
	id int primary key auto_increment,
    nome varchar(255)
);
create table placas_mae (
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
    foreign key (marcaId) references marcas(id)
);
create table processadores(
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
    foreign key (marcaId) references marcas(id)
);
create table memorias_ram(
	id int primary key auto_increment,
	nome varchar(255),
    URLImagem varchar(255), 
    marcaId int, 
	qtdMemoria varchar(255),
    tipo varchar(4),
    freq varchar(100),
    foreign key (marcaId) references marcas(id)
);
create table  Armazenamentos(
	id int primary key auto_increment,
	nome varchar(255),
    URLImagem varchar(255), 
    marcaId int,
    tipo varchar(3),
    qtdMemoria varchar(255),
    tipoEntrada varchar(4),
    foreign key (marcaId) references marcas(id)
);
create table  PlacasVideo(
	id int primary key auto_increment,
	nome varchar(255),
    URLImagem varchar(255), 
    marcaId int, 
    qtdMemoria varchar(255),
    tipoMemoria varchar(5),
    potMin int,
	SLICrossfire tinyint,
    foreign key (marcaId) references marcas(id)
);
create table fontes(
	id int primary key auto_increment,
	nome varchar(255),
    URLImagem varchar(255), 
    marcaId int, 
    potencia int,
    classificacao varchar(100),
    foreign key (marcaId) references marcas(id)
);
create table maquinas (
	id int primary key auto_increment,
    nome varchar(255),
    URLImagem varchar(255), 
    qtdMemoria int,
    RamId int,
    placaMaeId int,
    processadorId int,
    qtdArmazenamento int,
    placaVideoId int, 
    fonteId int,
    
    foreign key (RamId) references memorias_ram(id),
	foreign key (placaMaeId) references placas_mae(id),
    foreign key (processadorId) references processadores(id),
    foreign key (placaVideoId) references Placasvideo(id),
    foreign key (fonteId) references fontes(id)
);
create table usuario(
	id int primary key auto_increment,
    username varchar(255),
    password varchar(255)
)

