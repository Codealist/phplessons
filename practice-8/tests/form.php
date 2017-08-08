<?php
/**
 * @author Dmytro Samchuk <codealist@gmail.com>
 */

$in = "ajsdhfoasd aosДЕБИЛфщвыащывгащфМУДАК!";
$rest = [
    "дебил",
    "идиот",
    "мудак"
];

include_once __DIR__."/../lib/formutils.php";

var_dump(form\censor($in, $rest));


$in2 = "<script>ksjdfjk</script>";
var_dump(form\escapeTags($in2));