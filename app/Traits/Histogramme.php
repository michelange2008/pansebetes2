<?php
namespace App\Traits;

/**
 * Fournit un histogramme à partir d'un tableau de valeurs
 * et d'un tableau associatif avec les valeurs thresholds inférieurs et leur significations
 */
trait Histogramme
{

    /**
     * Renvoie un tableau avec des slices et le nombre d’occurrences dans ces slices
     *
     * @param Array $values: tableau simple avec les valeurs (int)
     * @param Array $slices: tableau associatif avec les valeurs inférieures en clef (int)
     * et la signification des slices en valeur (string)
     * @return Array $histogramme: tableau associatif avec les slices (string) comme clefs
     * et la somme des occurrences pour chaque slice
     **/
    public function histogramme_absolu(Array $values, Array $thresholds) : array
    {
        $histogramme = [];
        
        for ($i = 0; $i < count($values); $i++) {
            foreach ($thresholds as $threshold => $slice) {
                if ($values[$i] > $threshold) {
                    $values[$i] = $threshold;
                    break;
                }
            }
        }
        $values = array_count_values($values);
        ksort($values);
        foreach ($values as $key => $value) {
            foreach ($thresholds as $threshold => $slice) {
                if ($key == $threshold) {
                    $histogramme[$slice] = $value;
                }
            }
        }

        return $histogramme;
    }
    
}
