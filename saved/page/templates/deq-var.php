<?php
    // This is a deqvar example
    // We use <@ by default as a variable operator
    // These get replaced by whatever you put set when calling the include

    echo "<@test;"; // when calling this template make sure to do it like this: <+deq-var(test="value");

?>
