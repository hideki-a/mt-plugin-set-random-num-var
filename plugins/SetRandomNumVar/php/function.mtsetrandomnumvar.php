<?php
function smarty_function_mtsetrandomnumvar($args, &$ctx) {
    $range = $args['range'];
    preg_match("/^\"(\d+)\":\"(\d+)\"$/", $range, $matches);
    $min = $matches[1];
    $max = $matches[2];

    // See Also: mtdir/php/lib/function.mtsetvar.php
    $vars[$args['name']] = rand($min, $max);
    $ctx->__stash['vars'] =& $vars;
    return '';
}
