--TEST--
This test outlines the basic usage expected for Domain51_Service_Amazon_S3
--ENSURE--
--FILE--
<?php

require_once dirname(__FILE__) . '/_setup.inc';
require_once dirname(__FILE__) . '/_credentials.inc';

if (!isset($GLOBALS['access_key'])) {
    trigger_error('access_key must be set');
}
if (!isset($GLOBALS['secret_key'])) {
    trigger_error('secret_key must be set');
}

$access_key = $GLOBALS['access_key'];
$secret_key = $GLOBALS['secret_key'];
$bucket = 'tswicegood-test';

$s3 = new Domain51_Service_Amazon_S3($access_key, $secret_key);

ensure($s3->bucket($bucket)->has("TEST"))->is(false);

// create a new object using fluent API
$result = $s3->create("/{$bucket}/TEST")
             ->attachFile(dirname(__FILE__) . '/TEST')
             ->setACL(new Domain51_Service_Amazon_S3_ACL('public-read'))
             ->put();

ensure($result)->equals(true);
ensure($s3->bucket($bucket)->has("TEST"))
    ->equals(true);

$file = $s3->get("/{$bucket}/TEST");
ensure($file->contents)
    ->is(trim(file_get_contents(dirname(__FILE__) . "/TEST")));
ensure($file)
    ->equals($s3->bucket($bucket)->get("TEST"));

$result = $s3->delete("/{$bucket}/TEST");
ensure($result)->equals(true);

ensure($s3->bucket($bucket)->has("TEST"))->is(false);

?>
===DONE===
--EXPECT--
===DONE===
