<?php

namespace CustomErrorPage\Traits;

/**
 * This trait contains common methods used by various classes
 */
trait CommonTrait{

    /**
     * Change the results array in a monodimensional key value pair array
     * @param array $results the result set of the SELECT statement
     * @return array the monodimensional key value pair array
     */
    private function changeResultsArray(array $results): array{
        $results_kv = [
            'enable_custom_404_page' => "false",
            'use_image' => "false",
            'image_path' => "",
            'use_text' => "false",
            'custom_404_page_text' => "",
            'show_articles' => "false",
        ];
        array_walk($results,function($value,$key) use($results_kv){
            $results_kv[$value['name']] = $value['value'];
        });
        return $results_kv;
    }

    /**
     * Check the rows founded in the custom 404 page table
     * @param array $results the result set of the SELECT statement
     * @return array an array with the founded rows
     */
    private function foundResultsRows(array $results): array{
        $found = [
            'enable_custom_404_page' => false,
            'use_image' => false,
            'image_path' => false,
            'use_text' => false,
            'custom_404_page_text' => false,
            'show_articles' => false,
        ];
        array_walk($results,function($value,$key){
            $found[$value['name']] = true;
        });
        return $found;
    }
}