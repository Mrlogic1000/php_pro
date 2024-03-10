<?php
defined('ROOTPATH') or exit("Access Denied");

check_extension();

function check_extension()
{
    $required_extension = [
        "gd",
        "bz2",
        "curl",
        "gettext",
        "exif",
        "mysqli",
        "pdo_mysql",
        "pdo_sqlite",

    ];
    $not_loaded = [];
    foreach ($required_extension as $extension) {
        if (!extension_loaded($extension)) {
            $not_loaded[] = $extension;
        }
    }
    if (!empty($not_loaded)) {
        die("Please load the following extension in your php.ini file. <br/>" . implode("<br/>", $not_loaded));
    }
}
function user(string $key = ''){
    $ses = new \Core\Session();
    $row = $ses->user();
    if(!empty($row->$key)){
        return $row->$key;
    }
    return $row;

}
function redirect($url)
{
    header("Location: " . ROOT . "/" . $url);
    die;
}


// load image if exist

function get_image(mixed $file = '', string $type = 'post'): string
{
    $file = $file ?? '';
    if (file_exists($file)) {
        return ROOT . "/" . $file;
    }
    if ($type == 'user') {
        return ROOT . "/assets/images/user.webp";

    } else {
        return ROOT . "/assets/images/no_image.png";
    }
}

// pagenation
function get_pagenation_vars(): array
{
    $vars = [];
    $vars['page'] = $_GET['page'] ?? 1;
    $vars['page'] = (int) $vars['page'];
    $vars['prev_page'] = $vars['patg'] <= 1 ? 1 : $vars['page'] - 1;
    $vars['next_page'] = $vars['page'] + 1;
    return $vars;
}
// Save or check message to the user

function message($msg = null, bool $clear = false): string
{
    $ses = new \Core\Session();
    if (!empty($msg)) {
        $ses->set('message', $msg);
    } else {
        if (!empty($ses->get('message'))) {
            $ses->get('message');
            if ($clear) {
                $ses->pop('message');
            }
            return $msg;
        }
        return false;
    }
}

function URL($key):mixed
{
    $url = $_GET['url'] ?: 'home';
    $url = explode("/", trim($url,"/"));
    switch ($key) {
        case 'page':
        case 0:
            return $url[0] ?? null;
            break;
        case 'section':
        case 'slug':
        case 1:
            return $url[1] ?? null;
            break;
        case 'action':
        case 2:
            return $url[2] ?? null;
            break;
        case 'id':
        case 3:
            return $url[3] ?? null;
            break;
        default:
        return null;
        break;

    }
}
function old_checked(string $key, string $value, string $default = ''): bool
{
    if (isset($_POST[$key])) {
        if ($_POST[$key] == $value) {
            return " checked ";
        } else {
            if ($_SERVER['REQUEST_METHOD'] == 'GET' && $default == $value) {
                return ' checked ';
            }
        }
    }
}

function old_value(string $key, mixed $default = null, string $mode = 'post'): mixed
{
    $POST = ($mode == 'post') ? $_POST : $_GET;
    if (isset($POST[$key])) {
        return $POST[$key];
    }
    return $default;

}
function old_selected(string $key, mixed $value, mixed $default = null, string $mode = 'post'): mixed
{

    if (isset($_POST[$key])) {
        if ($_POST[$key] == $value) {
            return " selected ";
        } else {
            if ($default == $value) {
                return ' selected ';
            }
            return "";
        }
    }

}
function get_date($date)
{
    return date("Y-m-d", strtotime($date));

}
function add_root_to_images($contents)
{
    preg_match_all('/<img[^>]+>/', $contents, $matches);
    if (is_array($matches) && count($matches) > 0) {
        foreach ($matches as $match) {
            preg_match('/src="[^"]+>/', $match, $matches2);
            if (!strstr($matches2, 'http')) {
                $contents = str_replace($matches[0], 'src="' . ROOT . '/' . str_replace('src="', "", $matches2[0]), $contents);
            }
        }
    }
    return $contents;
}

function remove_image_from_contente($content, $folder = "uploads/")
{
    if (!file_exists($folder)) {
        mkdir($folder, 0777, true);
        file_put_contents($folder . "index.php", "");
    }
    // remove images from content
    preg_match_all('/<img[^>]+>/', $content, $matches);
    $new_content = $content;

    if (is_array($matches) && count($matches) > 0) {
        // $image_class = new \Core\Image();
        foreach ($matches[0] as $match) {
            if (strstr($match, 'http')) {
                // ignore images with links already
                continue;
            }
            // get the src
            preg_match('/src="[^"]+/', $match, $matches2);

            // get the filename
            preg_match('/data-filename="[^\"]+/', $match, $matches3);
            if (strstr($matches2[0], 'data')) {
                $parts = explode(',', $matches2[0]);
                $basename = $matches3[0] ?? 'basename.jpg';
                $basename = str_replace('data-filename"', '', $basename);

                $filename = $folder . "img_" . sha1(rand(0, 9999999999)) . $basename;
                $new_content = str_replace($parts[0] . "," . $parts[1], 'src"' . $filename, $new_content);
                file_put_contents($filename, base64_decode($parts[1]));

                //  resize image
                // $image_class->resize($filename, 1000);

            }



        }
    }
    return $new_content;
}

function delete_images_from_content(string $content, string $content_new = ''): voide
{
    // delete images from content
    if (empty($content_new)) {

        preg_match_all('/<img[^>]+>/', $content, $matches);

        if (is_array($matches) && count($matches) > 0) {
            foreach ($matches[0] as $match) {

                preg_match('/src="[^"]+/', $match, $matches2);
                $matches2[0] = str_replace('src"', "", $matches2[0]);

                if (file_exists($matches2[0])) {
                    unlink($matches2[0]);
                }

            }
        } else {
            // compare old to new and delete from old what inst in the new
            preg_match_all('/<img[^>]+>/', $content, $matches);
            preg_match_all('/<img[^>]+>/', $content, $matches2);

            $old_images = [];
            $new_images = [];
            // collect old images 
            if (is_array($matches2[0]) && count($matches) > 0) {

                foreach ($matches[0] as $match) {
                }
                preg_match('/src="[^"]+/', $match, $matches2);
                $matches[0] = str_replace('srch="', "", $matches2[0]);
                if (file_exists($matches2[0])) {
                    $old_images[] = $matches2[0];
                }
            }
        }
        // compare and delete all that dont appear in the new array
        foreach ($old_images as $img) {
            if (!in_array($img, $new_images)) {
                if (file_exists($img)) {
                    unlink($img);
                }
            }
        }
    }
}