<?php
function smarty_function_mtsetrandomnumvar($args, &$ctx) {
    $range = $args['range'];
    embed_vars_val($range, $ctx);
    preg_match("/^\"(\d+)\":\"(\d+)\"$/", $range, $matches);

    $min = $matches[1];
    $max = $matches[2];

    // See Also: mtdir/php/lib/function.mtsetvar.php
    $vars[$args['name']] = rand($min, $max);
    $ctx->__stash['vars'] =& $vars;
    return '';
}

function embed_vars_val(&$range, &$ctx) {
    $range = preg_replace_callback("/Array\.(.*?)(\:|$)/", function ($m) use ($ctx) {
        return '"' . $ctx->__stash['vars'][$m[1]] . '"' . $m[2];
    }, $range);
}
