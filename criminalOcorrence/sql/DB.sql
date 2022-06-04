create database criminal_ocorrence
default character set utf8
default collate utf8_general_ci;
use criminal_ocorrence;

create table usuarios(
	`id_usuario` int (5) auto_increment null,
    `nome_usuario` varchar (30) not null,
    `email_usuario` varchar (30) not null unique,
    `senha_usuario` varchar (9) not null,
    `adm` int (1) not null,
    `setor_usuario` varchar (30) not null,
	primary key(id_usuario)
)default charset = utf8;

create table tb_ocorrencias(
	`id_ocorrencia` int (5) auto_increment null,
    `titulo_ocorrencia` varchar (30) not null,
    `prestador_ocorrencia` varchar (30) not null,
    `idade_prestador` int (5) not null,
    `BI_prestador` varchar (30) not null,
    `morada_prestador` varchar (30) not null,
    `local_ocorrencia` varchar (30) not null,
    `categoria_ocorrencia` varchar (30) not null,
    `descricao_ocorrencia` varchar (100) not null,
    primary key(id_ocorrencia)
)default charset = utf8;

