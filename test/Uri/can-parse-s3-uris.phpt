--TEST--
Domain51_Service_Amazon_S3_Uri takes a single string at instantiation
and parses it into its bucket and object names.  Those values are
then accessible via the bucket and object properties.  The following
URIs are acceptable:

* s3://bucket/object
* bucket/object
* /bucket/object
* /bucket/

If no object is present, the object property will be false.
--FILE--
<?php

require_once dirname(__FILE__) . '/../_setup.inc';

$bucket = 'bucket' . rand(10, 20);
$object_name = 'object_name' . rand(10, 20);
$uri = new Domain51_Service_Amazon_S3_Uri("s3://{$bucket}/{$object_name}");
assert('$uri->bucket == $bucket');
assert('$uri->object == $object_name');

$uri = new Domain51_Service_Amazon_S3_Uri("/{$bucket}/{$object_name}");
assert('$uri->bucket == $bucket');
assert('$uri->object == $object_name');

$uri = new Domain51_Service_Amazon_S3_Uri("{$bucket}/{$object_name}");
assert('$uri->bucket == $bucket');
assert('$uri->object == $object_name');

$uri = new Domain51_Service_Amazon_S3_Uri("/{$bucket}/");
assert('$uri->bucket == $bucket');
assert('$uri->object === false');

$uri = new Domain51_Service_Amazon_S3_Uri("/{$bucket}");
assert('$uri->bucket == $bucket');
assert('$uri->object === false');

?>
===DONE===
--EXPECT--
===DONE===