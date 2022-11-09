<?php
/**
 * Taoti specific settings.
 */

/**
 * Hard block urls that shouldn't cause system load.
 * Don't bother even redirecting or giving a friendly error page. There is no
 * legitimate reason to be accessing these urls on a Pantheon/Amazee Drupal
 * install.
 */
if (isset($_SERVER['REQUEST_URI'])) {
  $banned_urls = [
    // General.
    'admin.php',
    'api.zip',
    'autodiscover.xml',
    '.aws',
    'backup.tar',
    'back.zip',
    'back.tar',
    'backup.zip',
    'backup.tar',
    'beez',
    'bkp',
    'build.xml',
    'CMSHelp',
    'CMSPages',
    'CMSTemplates',
    'db.php',
    'dbconfig.zip',
    'DesktopModule',
    '_dump',
    '.env',
    'installer.php',
    'item.php',
    'mailer.php',
    'manifestdb',
    'magento',
    'old/',
    'preview.php',
    '_profiler',
    'sitecore',
    'sitecorex',
    'sitedata',
    'site-tools',
    'Site-Tools',
    '.sql',
    '.well-known',
    'xleet',
    'xmlrpc.php',
    'var/',
    'vendor/',
    'wwwback',
    'wwwdata',
    'wwwroot',

    // Weird old ASPX requests.
    'AspxAutoDetectCookieSupport',
    '(X(1)S',

    // WP Paths.
    'wordpress',
    'wp-admin',
    'wp-back',
    'wp-config',
    'wp-cli',
    'wp-content',
    'wp-include',
    'wp-json',
    'wp-login',
    'wp-old',
    'wp-plain',
  ];
  foreach($banned_urls as $url) {
    if (stripos($_SERVER['REQUEST_URI'], $url) !== false) {
      header('HTTP/1.0 403');
      exit();
    }
  }
}
