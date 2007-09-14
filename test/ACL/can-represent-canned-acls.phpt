--TEST--
In its most basic form, an ACL object is instaniated with any of the
three canned access policies:

* private
* public-read
* public-read-write

Attempting to instaniate with an unknown canned policy will result
in an exception being triggered.
--FILE--
<?php

require_once dirname(__FILE__) . '/../_setup.inc';

$regular = new Domain51_Service_Amazon_S3_ACL();
assert('!$regular->isCanned()');

$private = new Domain51_Service_Amazon_S3_ACL('private');
assert('$private->isCanned()');
assert('(string)$private == "private"');

$public_read = new Domain51_Service_Amazon_S3_ACL('public-read');
assert('$public_read->isCanned()');
assert('(string)$public_read == "public-read"');

$public_read_write = new Domain51_Service_Amazon_S3_ACL('public-read-write');
assert('$public_read_write->isCanned()');
assert('(string)$public_read_write == "public-read-write"');

try {
    $policy = "policy: " . rand(10, 20);
    new Domain51_Service_Amazon_S3_ACL($policy);
    trigger_error('exception not caught');
} catch (Domain51_Service_Amazon_S3_ACL_UnknownCannedPolicyException $e) {
    assert('$e->getMessage() == $policy');
}
?>
===DONE===
--EXPECT--
===DONE===