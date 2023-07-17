drop database bilheteria;
create database bilheteria;

use bilheteria;

create table administrador(
    id_administrador int auto_increment primary key,
    nome varchar(50) not null,
    login varchar(50) not null,
    email varchar(50) not null,
    senha varchar(30) not null
);

insert into administrador values ('','Jose','adm','adm@adm.com','123');

create table espectador(
    id_espectador int auto_increment primary key,
    nome varchar(50) not null,
    endereco varchar(50) not null,
    email varchar(50) not null,
    cpf varchar(30) not null,
    rg varchar(30) not null,
    login varchar(50) not null,
    senha varchar(30) not null
);

insert into espectador values ('','Maria','São Paulo 1-23','maria@hotmail.com',
                        '123.321.432-10','543','espectador','123');

create table agenciador(
    id_agenciador int auto_increment primary key,
    nome varchar(50) not null,
    endereco varchar(50) not null,
    email varchar(50) not null,
    cpf varchar(30) not null,
    rg varchar(30) not null,
    telefone varchar(30) not null,
    login varchar(50) not null,
    senha varchar(50) not null,
    ativo boolean default '0'
);

insert into agenciador values ('','Rodrigo','Pernambuco 14-72','rodrigo@bol.com.br',
                        '555.333.222-44','6543','(18)7070-7070','agenciador','123','1');

create table clientebilheteria(
    login varchar(50),
    senha varchar(50),
    email varchar(50),
    nome varchar(50),
    endereco varchar(50),
    id_agenciador int not null,
    id_clientebilheteria int auto_increment primary key,
    ativo boolean default '0',
    FOREIGN KEY (id_agenciador) REFERENCES agenciador(id_agenciador)
);

insert into clientebilheteria values ('cb','123','eb@hotmail.com','EB presentes',
                                'Presidente Vargas 15-66','1','','1');

create table caixabilheteria(
    valorinicial double,
    valorfinal double,
    datainicio date,
    datatermino date,
    horarioinicio time ,
    horariotermino time,
    id_clientebilheteria int,
    id_caixabilheteria int auto_increment primary key,
    FOREIGN KEY (id_clientebilheteria) REFERENCES clientebilheteria(id_clientebilheteria)
);

create table evento(
    nome varchar(50) not null,
    dataevento varchar(12) not null,
    horarioInicio time not null,
    duracao  time not null,
    preco_ingresso double not null,
    tipoEvento varchar (20) not null,
    endereco varchar(50) not null,
    idadeMinimaPermitida int not null,
    descricao varchar(250) not null,
    lugaresnumerados boolean not null,
    capacidade int not null,
    id_agenciador int not null,
    vendidos int default '0',
    id_evento int auto_increment primary key,
    cancelado boolean default '0',
    diretorio varchar(500),
    FOREIGN KEY (id_agenciador) REFERENCES agenciador(id_agenciador)
);

create table venda(
    tipocomprador varchar(50),
    logincomprador varchar(50),
    datavenda date not null,
    meia boolean not null,
    cadeira int not null,
    id_evento int not null,
    tipopagamento varchar(50) not null,
    id_venda int auto_increment primary key,
    FOREIGN KEY (id_evento) REFERENCES evento (id_evento)
);

create table ingresso(
    id_ingresso int auto_increment primary key,
    id_venda int not null,
    FOREIGN KEY (id_venda) REFERENCES venda (id_venda)
);

create table reembolso(
    dataReembolso date not null,
    id_ingresso int not null,
    id_clientebilheteria int not null,
    FOREIGN KEY (id_clientebilheteria) REFERENCES clientebilheteria(id_clientebilheteria),
    FOREIGN KEY (id_ingresso) REFERENCES ingresso (id_ingresso)
);

create table boleto(
    id_boleto int auto_increment primary key,
    id_venda int,
    datavenc date,
    pago boolean default '0',
    FOREIGN KEY (id_venda) REFERENCES venda(id_venda)
);

create table cartao(
    nome_titular varchar(50) not null,
    data_nascimento varchar(10) not null,
    cpf varchar(50) not null,
    numero_cartao int not null,
    data_vencimento varchar(10) not null,
    id_espectador int,
    id_cartao int auto_increment primary key,
    foreign key (id_espectador) references espectador(id_espectador)
);

create table voucher(
 
id_ingresso int,
    id_voucher int primary key,
    foreign key (id_ingresso) references ingresso(id_ingresso)
);
