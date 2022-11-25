CREATE DATABASE almoxarifado;
USE almoxarifado;

--
-- Banco de dados: `almoxarifado`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `dataitems`
--

DROP TABLE IF EXISTS `dataitems`;
CREATE TABLE IF NOT EXISTS `dataitems` (
  `idItem` int(11) NOT NULL AUTO_INCREMENT,
  `itemName` varchar(60) NOT NULL,
  `itemQuantity` int(11) NOT NULL,
  `itemType` varchar(15) NOT NULL,
  `itemLocation` varchar(15) NOT NULL,
  `itemShelf` varchar(20) NOT NULL,
  `itemUser` varchar(60) NOT NULL,
  `is_deleted` int(1) NOT NULL DEFAULT '0',
  `deleted_by` varchar(30) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`idItem`)
);

-- --------------------------------------------------------

--
-- Estrutura da tabela `datauser`
--

DROP TABLE IF EXISTS `datauser`;
CREATE TABLE IF NOT EXISTS `datauser` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `email` varchar(60) NOT NULL,
  `senha` varchar(60) NOT NULL,
  `adm` int(1) DEFAULT '0',
  `is_active` int(11) NOT NULL,
  PRIMARY KEY (`idUser`)
) ;

--
-- Extraindo dados da tabela `datauser`
--

INSERT INTO `datauser` (`idUser`, `username`, `email`, `senha`, `adm`, `is_active`) VALUES
(26, 'rafael', 'duarterafael02@gmail.com', '$2y$10$637ykUjxD2WcQRDULRA2fuBkiDJ8rb93zuc.TFAAZAY4TP4qhnndW', 1, 1),
COMMIT;

-- OBS: A senha transcrita é: "Rafael123"

