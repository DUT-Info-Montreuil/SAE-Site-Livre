DROP table if exists abonnement;

CREATE TABLE abonnement (
    liaison_abonnement bigint(20) UNSIGNED NOT NULL ,
    id_utilisateur_suivi bigint(11) UNSIGNED NOT NULL,
    id_abonné bigint(11) UNSIGNED NOT NULL,
    PRIMARY KEY (liaison_abonnement),
    FOREIGN KEY (id_utilisateur_suivi) REFERENCES bdsaelivre.utilisateur(id),
    FOREIGN KEY (id_abonné) REFERENCES bdsaelivre.utilisateur(id));
