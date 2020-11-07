<?php declare(strict_types=1);
namespace Deployer;

require_once __DIR__ . '/../../../contrib/crontab.php';

host('provisioned.test')
    ->set('timeout', 300)
    ->setTag('e2e')
    ->setRemoteUser('root')
    ->setSshArguments([
       '-o UserKnownHostsFile=/dev/null',
       '-o StrictHostKeyChecking=no',
    ]);

set('crontab:jobs', [
    '* * * * * date >> cron.output',
]);

task('crontab-test:truncate', function() {
    run ("echo '' > /tmp/crontab_save");
    run ("{{bin/crontab}} /tmp/crontab_save");
});
