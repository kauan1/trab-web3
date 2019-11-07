<?php

class Init{

    private  $DB = "tetris";
    private  $ENDERECO =  "localhost";
    private  $USER = "root";
    private  $PASS = "";

    public function criarDb(){

        $conexao = new PDO("mysql:host=".$this->ENDERECO.";", 
        $this->USER, 
        $this->PASS);

        $bd = "
        CREATE SCHEMA IF NOT EXISTS `".$this->DB."` DEFAULT CHARACTER SET utf8 ;
        USE `".$this->DB."` ;

        -- -----------------------------------------------------
        -- Table `usuario`
        -- -----------------------------------------------------
        CREATE TABLE IF NOT EXISTS `usuario` (
        `usuario` VARCHAR(200) NOT NULL,
        `cpf` CHAR(20) NOT NULL,
        `nome` CHAR(60) NULL,
        `nascimento` DATE NULL,
        `telefone` VARCHAR(45) NULL,
        `email` CHAR(45) NULL,
        `senha` VARCHAR(45) NULL,
        PRIMARY KEY (`usuario`),
        UNIQUE INDEX `cpf_UNIQUE` (`cpf` ASC))
        ENGINE = InnoDB;


        -- -----------------------------------------------------
        -- Table `rank`
        -- -----------------------------------------------------
        CREATE TABLE IF NOT EXISTS `rank` (
        `id` INT NOT NULL AUTO_INCREMENT,
        `usuario` VARCHAR(200) NOT NULL,
        `pontuacao` INT NULL,
        `nivel` INT NULL,
        `linhas` INT NULL,
        `tempo` INT NULL,
        `data` DATETIME NULL,
        PRIMARY KEY (`id`),
        INDEX `fk_rank_usuario_idx` (`usuario` ASC),
        CONSTRAINT `fk_rank_usuario`
            FOREIGN KEY (`usuario`)
            REFERENCES `usuario` (`usuario`)
            ON DELETE NO ACTION
            ON UPDATE NO ACTION)
        ENGINE = InnoDB;


        SET SQL_MODE=@OLD_SQL_MODE;
        SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
        SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

        
        
        ";

        $array = explode(';',$bd);

        foreach($array as $sql){
            $conexao->query($sql);
        }
        


        return true;

    }


}