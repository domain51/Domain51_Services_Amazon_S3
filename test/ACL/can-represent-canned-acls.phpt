--TEST--
In its most basic form, an ACL object is instaniated with any of the
three canned access policies:

* private
* public-read
* public-read-write

Attempting to instaniate with an unknown canned policy will result
in an exception being triggered.
--ENSURE--
--FILE--
<?php

require_once dirname(__FILE__) . '/../_setup.inc';

$regular = new Domain51_Service_Amazon_S3_ACL();
ensure($regular->isCanned())->isNot(true);

$private = new Domain51_Service_Amazon_S3_ACL('private');
ensure($private->isCanned())->is(true);
ensure((string)$private)->is("private");

$public_read = new Domain51_Service_Amazon_S3_ACL('public-read');
ensure($public_read->isCanned())->is(true);
ensure((string)$public_read)->is("public-read");

$public_read_write = new Domain51_Service_Amazon_S3_ACL('public-read-write');
ensure($public_read_write->isCanned())->is(true);
ensure((string)$public_read_write)->is("public-read-write");

try {
    $policy = "policy: " . rand(10, 20);
    new Domain51_Service_Amazon_S3_ACL($policy);
    trigger_error('exception not caught');
} catch (Domain51_Service_Amazon_S3_ACL_UnknownCannedPolicyException $e) {
    ensure($e->getMessage())->is($policy);
}
?>
===DONE===
--EXPECT--
===DONE===
