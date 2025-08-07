<?php
/**
 * Taoti specific settings.
 */

/*
 * Prevent inane warnings about no database in some cases when running
 * migrations.
 */
if (isset($databases['default']['default'])) {
  $databases['migrate']['default'] = $databases['default']['default'];
}

/*
 * Enable local and dev config splits on local sites if they are present.
 */
if (isset($_ENV['LANDO'])) {
  $config['config_split.config_split.local']['status'] = TRUE;
  $config['config_split.config_split.dev']['status'] = TRUE;
  $config['config_split.config_split.prod']['status'] = FALSE;
}
if (isset($_ENV['HOSTING_ENVIRONMENT']) && $_ENV['HOSTING_ENVIRONMENT'] !== 'live') {
  $config['config_split.config_split.prod']['status'] = FALSE;
  $config['config_split.config_split.dev']['status'] = TRUE;
}

/**
 * Place the config directory outside of the Drupal root.
 */
$settings['config_sync_directory'] = dirname(DRUPAL_ROOT) . '/config/sync';
