BEGIN TRANSACTION;
CREATE TABLE `usuario` (
	`id_usuario`	INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
	`nome`	TEXT NOT NULL,
	`email`	TEXT NOT NULL,
	`senha`	TEXT NOT NULL,
	`funcao`	INTEGER NOT NULL
);
INSERT INTO `usuario` VALUES (1,'gerente','gerente@email.com','123',2);
INSERT INTO `usuario` VALUES (2,'cozinheiro','cozinheiro@email.com','123',1);
INSERT INTO `usuario` VALUES (3,'cesar','cesaraugustokg6@gmail.com','12345',1);
INSERT INTO `usuario` VALUES (4,'cesar','cesaraugustokg6@hotmail.com','1234',1);
CREATE TABLE "prato" (
	`id_prato`	INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
	`id_categoria`	INTEGER NOT NULL,
	`preco`	NUMERIC,
	`descricao`	TEXT NOT NULL
);
INSERT INTO `prato` VALUES (1,1,20,'macarrao');
INSERT INTO `prato` VALUES (2,3,40,'sushi');
INSERT INTO `prato` VALUES (3,2,10,'sorvete');
INSERT INTO `prato` VALUES (8,1,0,'Lasanha');
CREATE TABLE `categoria` (
	`id_categoria`	INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
	`categoria`	TEXT NOT NULL
);
INSERT INTO `categoria` VALUES (1,'Massas');
INSERT INTO `categoria` VALUES (2,'Sobremesas');
INSERT INTO `categoria` VALUES (3,'Japonesa');
COMMIT;
