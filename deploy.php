<?php
namespace Deployer;
require 'recipe/laravel.php';

$path = '/var/www/albasha';

// Configuration

set('ssh_type', 'native');
set('ssh_multiplexing', true);

set('repository', 'git@github.com:medis/albasha.git');

add('shared_files', ['webroot/.env']);
add('shared_dirs', [
    'webroot/storage/app',
    'webroot/storage/framework/cache',
    'webroot/storage/framework/sessions',
    'webroot/storage/framework/views',
    'webroot/storage/logs',
]);

add('writable_dirs', ['webroot/storage', 'webroot/vendor']);

// Servers

server('development', 'audrius.io')
    ->user('deployer')
    ->identityFile('~/.ssh/id_deployex.pub', '~/.ssh/id_deployex', '')
    ->set('deploy_path', $path)
    ->pty(true);


// Tasks

desc('Restart PHP-FPM service');
task('php-fpm:restart', function () {
    // The user must have rights for restart service
    // /etc/sudoers: username ALL=NOPASSWD:/bin/systemctl restart php-fpm.service
    run('sudo systemctl restart php-fpm.service');
});
//after('deploy:symlink', 'php-fpm:restart');

// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');

// Migrate database before symlink new release.

before('deploy:symlink', 'artisan:migrate');

/**
 * Run Laravel5 optimisation commands.
 * Reference: http://sentinelstand.com/article/laravel-5-optimization-commands.
 */
task('optimise', function() {
  cd('{{deploy_path}/release');
  run('php artisan optimize');
  run('php artisan config:cache');
  run('php artisan route:cache');
});
after('cleanup', 'optimise');