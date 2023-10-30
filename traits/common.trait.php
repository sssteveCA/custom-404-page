<?php

namespace CustomErrorPage\Traits;

/**
 * This trait contains common methods used by various classes
 */
trait CommonTrait{

    /**
     * Check the rows found in the custom 404 page table
     * @param array $results the result set of the SELECT statement
     * @return array the array that indicates the founded rows
     */
    private function foundArray(array $results): array{
        $found = [
            'enable_custom_404_page' => false,
            'use_image' => false,
            'image_path' => false,
            'use_text' => false,
            'custom_404_page_text' => false,
            'show_articles' => false,
        ];
        array_walk($results,function($value,$key) use($found){
            if($value['name'] == 'enable_custom_404_page') $found['enable_custom_404_page'] = true;
            if($value['name'] == 'use_image') $found['use_image'] = true;
            if($value['name'] == 'image_path') $found['image_path'] = true;
            if($value['name'] == 'use_text') $found['use_text'] = true;
            if($value['name'] == 'custom_404_page_text') $found['custom_404_page_text'] = true;
            if($value['name'] == 'show_articles') $found['show_articles'] = true;
        });
        return $found;
    }
}