<?php 

/**
 * Require a view.
 * 
 * @param  string $name 
 * @param  array  $data 
 */
function view($name, $data = [])
{
	extract($data);
    
    $parts = explode('.', $name);

    return require __DIR__ .    "/../app/views/{$parts[0]}/{$parts[1]}.view.php";    
}

/**
 * Redirect to a new page.
 * 
 * @param  string $path 
 */
function redirect($path)
{
	header("Location: /{$path}");
}