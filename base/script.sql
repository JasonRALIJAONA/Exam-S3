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
   typeTrans VARCHAR(10)  NOT NULL,
   prix DECIMAL(15,2)   NOT NULL,
   qte INT NOT NULL,
   idDevise INT,
   PRIMARY KEY(idTrans),
   FOREIGN KEY(idDevise) REFERENCES devise(idDevise)
);

CREATE OR REPLACE VIEW v_trans_devise AS SELECT trans.*,devise.nom FROM devise LEFT JOIN trans ON devise.idDevise=trans.idTrans;