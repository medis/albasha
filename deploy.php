<?php
namespace Deployer;
require 'recipe/laravel.php';

$path = '/var/www/albasha';

// Configuration

set('ssh_type', 'native');
set('ssh_multiplexing', true);

set('repository', 'git@github.com:medis/albasha.git');

add('shared_files', ['.env']);
add('shared_dirs', [
    'storage/app',
    'storage/framework/cache',
    'storage/framework/sessions',
    'storage/framework/views',
    'storage/logs',
    'public/storage'
]);

add('writable_dirs', ['storage', 'vendor', 'public/storage']);

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
