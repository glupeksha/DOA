<?php

// This function will take $_SERVER['REQUEST_URI'] and build a breadcrumb based on the user's current path
function breadcrumbs($separator = ' &raquo; ', $home = 'Home') {
    // This gets the REQUEST_URI (/path/to/file.php), splits the string (using '/') into an array, and then filters out any empty values
    $path = array_filter(explode('/', parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)));

    // This will build our "base URL" ... Also accounts for HTTPS :)
    $base = ($_SERVER['HTTPS'] ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/';

    // Initialize a temporary array with our breadcrumbs. (starting with our home page, which I'm assuming will be the base URL)
    $breadcrumbs = Array("<a href=\"$base\">$home</a>");

    // Find out the index for the last value in our path array
    $last = end(array_keys($path));

    // Build the rest of the breadcrumbs
    foreach ($path AS $x => $crumb) {
        // Our "title" is the text that will be displayed (strip out .php and turn '_' into a space)
        $title = ucwords(str_replace(Array('.php', '_'), Array('', ' '), $crumb));

        // If we are not on the last index, then display an <a> tag
        if ($x != $last)
            $breadcrumbs[] = "<a href=\"$base$crumb\">$title</a>";
        // Otherwise, just display the title (minus)
        else
            $breadcrumbs[] = $title;
    }

    // Build our temporary array (pieces of bread) into one big string :)
    return implode($separator, $breadcrumbs);
}

?>
<div
      class="container-fluid header-bg py-5 mb-5 wow fadeIn"
      data-wow-delay="0.1s"
    >
      <div class="container py-5">
        <h1 class="display-4 text-white mb-3 animated slideInDown">
          <?php echo $title;?>
        </h1>
        <?php echo breadcrumbs(); ?>
        <!-- <nav aria-label="breadcrumb animated slideInDown">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item">
              <a class="text-white" href="/">Home</a>
            </li>
            <li class="breadcrumb-item">
              <a class="text-white" href="/"><?php if($menu) echo $menu; else echo "Pages" ?></a>
            </li>
            <li class="breadcrumb-item text-primary active" aria-current="page">
              404 Error
            </li>
          </ol>
        </nav> -->
      </div>
    </div>