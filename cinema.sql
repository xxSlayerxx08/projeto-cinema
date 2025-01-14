CREATE TABLE `cinema`.`filmes` (`id` INT NOT NULL AUTO_INCREMENT , `titulo` VARCHAR(150) NOT NULL , `classificacaoEtaria` INT NOT NULL , `nota` INT NOT NULL , `genero` VARCHAR(100) NOT NULL , `descricao` TEXT NOT NULL , `foto` TEXT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;

CREATE TABLE `cinema`.`pipocas` (`id` INT NOT NULL AUTO_INCREMENT , `nome` VARCHAR(300) NOT NULL , `tamanho` VARCHAR(150) NOT NULL , `preco` INT NOT NULL , `foto` TEXT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;

CREATE TABLE `cinema`.`usuarios` (`id` INT NOT NULL AUTO_INCREMENT , `nome` VARCHAR(300) NOT NULL , `usuario` VARCHAR(300) NOT NULL , `senha` VARCHAR(300) NOT NULL , `nivelAcesso` INT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;

CREATE TABLE `cinema`.`contatos` (`id` INT NOT NULL AUTO_INCREMENT , `rua` VARCHAR(500) NOT NULL , `numero` INT NOT NULL , `bairro` VARCHAR(500) NOT NULL , `cidade` VARCHAR(500) NOT NULL , `telefone` INT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;