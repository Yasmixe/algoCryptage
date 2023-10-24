<?php 
//dechiffrement miroir
function miroir($text) {
    return strrev($text);
}

function Cesar($text, $cle_cesar) {
    $resultat = "";
    $longueur = strlen($text);
    for ($i = 0; $i < $longueur; $i++) {
        $caractere = $text[$i];
        if (ctype_alpha($caractere)) {
            $decalage = $cle_cesar;
            $minuscule = (ctype_lower($caractere));

            $ascii_de_base = ($minuscule) ? ord('a') : ord('A');
            $nouveau_caractere = chr((ord($caractere) - $ascii_de_base + $decalage) % 26 + $ascii_de_base);
            $resultat .= $nouveau_caractere;
        } else {
            $resultat .= $caractere;
        }
    }
    return $resultat;
}

// dechiffrement cesar 
function Dechiffrement($phrase, $cle_cesar) {
    $mots = explode(" ", $phrase);
    $resultat = [];
    foreach ($mots as $mot) {
        if (strpos($mot, "C") === 0) {
            $mot = substr($mot, 1);  // Supprimer le préfixe "C"
            $resultat[] = Cesar($mot, -$cle_cesar);
        } else {
            $resultat[] = miroir($mot);
        }
    }
    return implode(" ", $resultat);
}

?>