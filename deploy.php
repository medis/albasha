<?php
namespace Deployer;

require 'recipe/laravel.php';

// Configuration

$path = '/var/www/albasha';

$live_path = '~/laravel';

set('repository', 'git@github.com:medis/albasha.git');
set('git_tty', true); // [Optional] Allocate tty for git on first deployment
add('shared_files', []);
add('shared_dirs', ['public/storage']);
add('writable_dirs', ['storage', 'vendor', 'public/storage']);
set('allow_anonymous_stats', false);

// Hosts

// host('project.com')
//     ->stage('production')
//     ->set('deploy_path', '/var/www/project.com');

// host('beta.project.com')
//     ->stage('beta')
//     ->set('deploy_path', '/var/www/project.com');

host('audrius.io')
    ->stage('development')
    ->user('deployer')
    ->identityFile('~/.ssh/id_deployex')
    ->set('deploy_path', $path);

host('160.153.162.24')
    ->stage('production')
    ->user('basra123456')
    ->identityFile('~/.ssh/id_albasha')
    ->set('deploy_path', $live_path)
    ->set('writable_use_sudo', false)
    ->set('writable_mode', 'chmod')
    ->set('http_user', 'basra123456');

// Tasks

// desc('Restart PHP-FPM service');
// task('php-fpm:restart', function () {
//     // The user must have rights for restart service
//     // /etc/sudoers: username ALL=NOPASSWD:/bin/systemctl restart php-fpm.service
//     run('sudo systemctl restart php7.1-fpm.service');
// });
// after('deploy:symlink', 'php-fpm:restart');

// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');

// Migrate database before symlink new release.

before('deploy:symlink', 'artisan:migrate');
