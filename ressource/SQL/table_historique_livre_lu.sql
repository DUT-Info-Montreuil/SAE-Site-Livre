DROP TABLE if exists historique_livre_lu;

CREATE TABLE historique_livre_lu
(
    liaison_livre_utilisateur bigint(20) UNSIGNED NOT NULL,
    id_utilisateur bigint(11) UNSIGNED NOT NULL,
    id_livre_lu bigint(11) UNSIGNED NOT NULL,
    date_heure_lecture datetime NOT NULL,
    dernier_chapitre_lu bigint(20) NOT NULL,
    PRIMARY KEY (liaison_livre_utilisateur),
    FOREIGN KEY (id_utilisateur) REFERENCES utilisateur (id),
    FOREIGN KEY (id_livre_lu) REFERENCES livre (id)
)
