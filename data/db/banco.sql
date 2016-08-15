BEGIN TRANSACTION;
CREATE TABLE `usuario` (
	`id_usuario`	INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
	`nome`	TEXT NOT NULL,
	`email`	TEXT NOT NULL,
	`senha`	TEXT NOT NULL,
	`funcao`	INTEGER NOT NULL
);
INSERT INTO `usuario` VALUES (1,'cesar','emailcesar','123',1);
INSERT INTO `usuario` VALUES (2,'cesar2','emailcesar2','123',2);
CREATE TABLE `prato` (
	`id_prato`	INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
	`id_categoria`	INTEGER NOT NULL,
	`preco`	NUMERIC NOT NULL,
	`descricao`	TEXT NOT NULL,
	`imagem`	TEXT
);
INSERT INTO `prato` VALUES (1,1,20,'macarrao',NULL);
CREATE TABLE `categoria` (
	`id_categoria`	INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
	`categoria`	TEXT NOT NULL
);
INSERT INTO `categoria` VALUES (1,'massas');
COMMIT;
