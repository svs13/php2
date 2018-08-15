<?php

function test()
{
    try {
        echo 2+2;
        return;
    } catch (Exception $e) {
        echo $e->getMessage();
    } finally {
        echo 'После return';
    }

}

echo 'До функции';
test();
echo 'После функции';