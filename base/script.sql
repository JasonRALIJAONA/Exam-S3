CREATE DATABASE crypto;

use crypto;

CREATE TABLE devise(
   idDevise INT AUTO_INCREMENT,
   nom VARCHAR(50)  NOT NULL,
   prixInitial DECIMAL(15,2)   NOT NULL,
   PRIMARY KEY(idDevise)
);

CREATE TABLE trans(
   idTrans INT AUTO_INCREMENT,
   dateTrans DATE NOT NULL,
   typeTrans VARCHAR(10),
   prix DECIMAL(15,2)   NOT NULL,
   qte INT NOT NULL,
   idDevise INT,
   PRIMARY KEY(idTrans),
   FOREIGN KEY(idDevise) REFERENCES devise(idDevise)
);

CREATE OR REPLACE VIEW v_trans_devise AS SELECT devise.nom,trans.* FROM devise LEFT JOIN trans ON devise.idDevise=trans.idTrans;

INSERT INTO devise VALUES (NULL,'BTC',43000);
INSERT INTO devise VALUES (NULL,'BEP',39000);
INSERT INTO devise VALUES (NULL,'WRP',41000);

INSERT INTO trans VALUES (NULL,'2023-12-15','VENTE',44000,10,1);