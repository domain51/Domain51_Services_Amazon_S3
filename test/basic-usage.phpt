--TEST--
This test outlines the basic usage expected for Domain51_Service_Amazon_S3
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

assert('$s3->bucket($bucket)->has("TEST") == false');

// create a new object using fluent API
$result = $s3->create("/{$bucket}/TEST")
             ->setFile(dirname(__FILE__) . '/TEST')
             ->put();

assert('$result == true');
assert('$s3->bucket($bucket)->has("TEST") == true');

$file = $s3->get("/{$bucket}/TEST");
assert('$file->contents === dirname(__FILE__) . "/TEST"');
assert('$file == $s3->bucket($bucket)->get("TEST")');

$result = $s3->delete("/{$bucket}/TEST");
assert('$result == false');

assert('$s3->bucket($bucket)->has("TEST")');

?>
===DONE===
--EXPECT--
===DONE===