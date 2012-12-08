<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */



    /** spam checking functions * */
    function get_spam_check($store = TRUE) {
        $CI = &get_instance();
        $CI->load->helper('array');

        $op = random_element(array('add', 'sub', 'mult', 'div'));
        $ops = array(
            'add' => array('+', 'plus'),
            'sub' => array('-', 'minus'),
            'mult' => array('*', 'times'),
            'div' => array('/', 'divided by', '&divide;')
        );

        $operator = random_element($ops[$op]);

        if ($op == 'add') {
            $a = rand(0, 10);
            $b = rand(0, 10);
            $test = array("What is $a $operator $b?", ($a + $b));
        } elseif ($op == 'sub') {
            $a = rand(0, 10);
            $b = rand($a, 10 + $a);
            $test = array("What is $b $operator $a?", ($b - $a));
        } elseif ($op == 'mult') {
            $a = rand(0, 5);
            $b = rand(0, 5);
            $test = array("What is $a $operator $b?", ($a * $b));
        } elseif ($op == 'div') {
            $a = rand(1, 5);
            $b = rand(1, 5);
            $r = $a * $b;
            $test = array("What is $r $operator $a?", ($r / $a));
        }

        $CI = &get_instance();
        $CI->session->set_userdata('spam_check_answer', $test[1]);

        return $test;
    }

    function spam_check_answer($answer) {
        $CI = &get_instance();
        return ($answer == $CI->session->userdata('spam_check_answer'));
    }


?>
