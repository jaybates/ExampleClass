<?php


class ExampleClass {

    public function aboveBelow($array, $search) {

        // Add search number to end of array
        $array[] = $search;

        $sorted = $this->sort($array);

        $below = count(array_splice($sorted['array'], 0, $sorted['pivot'])); 


        $above = count(array_splice($sorted['array'], ($sorted['pivot'] - (count($sorted['array']) - 1)), (count($sorted['array']) - 1)));

        return json_encode(array(
            'above' => $above,
            'below' => $below
        ));
        
    }

    private function sort($array) {

        //pivot
        $pivot = count($array) - 1;

        // Set left and right indexes
        $i= 0;
        $j= count($array) - 2;


        // Sort
        while($i <= $j) {

            while($array[$i] < $array[$pivot]) {
                $i++;
            }

            while($array[$j] > $array[$pivot]) {
                $j--;
            }

            if ($i < $j ) {

                $array = $this->swap($array, $i, $j);
                $i++;
                $j--;
            }

            if($i == $j) {
                $index = $j;
                $array = $this->swap($array, $pivot, $j);
            }
        }

        $info = array(
            'array' => $array,
            'pivot' => $index
        );

        return $info;
    }
    
    private function swap($array, $index1, $index2) {

        $temp = $array[$index1];
        
        $array[$index1] = $array[$index2];
        $array[$index2] = $temp;

        return $array;
    }

    public function stringRotation($string, $offset) {
        
        return substr($s, (-1 * $offset)) . substr($s, 0, (strlen($s) - $offset));

    }
}