CREATE TABLE "Saiyan" (
  "id" int PRIMARY KEY,
  "nom" varchar NOT NULL,
  "prenom" varchar NOT NULL,
  "mail" varchar NOT NULL,
  "mdp" varchar NOT NULL,
  "adresse" json,
  "tel" varchar,
  "sexe" varchar NOT NULL,
  "admin" bool NOT NULL,
  "age" integer NOT NULL,
  "taille" integer NOT NULL,
  "poids" float NOT NULL,
  "reset_token" varchar,
  "reset_token_expiration" varchar
);

CREATE TABLE "Produit" (
  "id" integer PRIMARY KEY,
  "nom" varchar NOT NULL,
  "description" text,
  "prix" float NOT NULL,
  "duree" int NOT NULL,
  "photo" varchar,
  "entrainement" bool NOT NULL,
  "multimedia" bool NOT NULL,
  "alimentaire" bool NOT NULL,
  "bilan" bool NOT NULL,
  "whatsapp" bool NOT NULL
);

CREATE TABLE "Achat" (
  "idSaiyan" Saiyan NOT NULL,
  "idProduit" Produit NOT NULL,
  "date" date,
  "echeance" date,
);

CREATE TABLE "Temoignage" (
  "idSaiyan" Saiyan NOT NULL,
  "contenu" text,
  "note" integer,
  "date" date,
  "image" varchar,
  "affichage" boolean default false
);

CREATE TABLE "Article" (
  "id" integer PRIMARY KEY,
  "titre" varchar NOT NULL,
  "contenu" text,
  "auteur" Saiyan NOT NULL,
  "date_publi" date DEFAULT (CURRENT_TIMESTAMP),
  "image" varchar
);

CREATE TABLE "Media" (
  "id" integer PRIMARY KEY,
  "titre" varchar NOT NULL,
  "description" varchar,
  "media" varchar NOT NULL;
  "type" varchar NOT NULL
);

CREATE TABLE "Promotion" (
  "id" integer PRIMARY KEY,
  "date_deb" date NOT NULL,
  "date_fin" date NOT NULL,
  "reduction" integer NOT NULL,
  "code" varchar NOT NULL,
  "nb_utilisation" integer,
  "produit" Produit
);
