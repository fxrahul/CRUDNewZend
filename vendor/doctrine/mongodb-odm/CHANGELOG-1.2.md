CHANGELOG for 1.2.x
===================

This changelog references the relevant changes done in 1.2 patch versions.

1.2.5 (2018-07-20)
------------------

All issues and pull requests in this release may be found under the

[1.2.4 milestone](https://github.com/doctrine/mongodb-odm/issues?q=milestone%3A1.2.5).

* [#1828](https://github.com/doctrine/mongodb-odm/pull/1828) improves text index comparison during schema creation.

1.2.4 (2018-05-18)
------------------

All issues and pull requests in this release may be found under the
[1.2.4 milestone](https://github.com/doctrine/mongodb-odm/issues?q=milestone%3A1.2.4).

* [#1793](https://github.com/doctrine/mongodb-odm/pull/1793) fixes field name translation when querying complex reference structures.
* [#1792](https://github.com/doctrine/mongodb-odm/pull/1792) ensures removal of documents cascades to references with `orphanRemoval` enabled.
* [#1784](https://github.com/doctrine/mongodb-odm/pull/1784) fixes hydration of proxy objects with lazy properties.

1.2.3 (2018-04-01)
------------------

Re-tag since 1.2.2 was inadvertedly tagged from master.

1.2.2 (2018-03-31)
------------------

All issues and pull requests in this release may be found under the
[1.2.2 milestone](https://github.com/doctrine/mongodb-odm/issues?q=milestone%3A1.2.2).

* [#1764](https://github.com/doctrine/mongodb-odm/pull/1764) fixes upserting documents with nullable fields.
* [#1748](https://github.com/doctrine/mongodb-odm/pull/1748) fixes the usage of references as shard keys.
* [#1732](https://github.com/doctrine/mongodb-odm/pull/1732) adds missing `cascade-detach` to the XML mapping schema.
* [#1731](https://github.com/doctrine/mongodb-odm/pull/1731) fixes some errors in the XML mapping schema. 

1.2.1 (2017-12-08)
------------------

All issues and pull requests in this release may be found under the
[1.2.1 milestone](https://github.com/doctrine/mongodb-odm/issues?q=milestone%3A1.2.1).

* [#1681](https://github.com/doctrine/mongodb-odm/pull/1681) hardens checks for storage strategy when mapping relationships
* [#1687](https://github.com/doctrine/mongodb-odm/pull/1687) fixes query preparation when using a reference as shard key
* [#1688](https://github.com/doctrine/mongodb-odm/pull/1688) fixes the `pushAll` collection strategy when running on MongoDB 3.6

1.2.0 (2017-10-24)
------------------

All issues and pull requests in this release may be found under the
[1.2 milestone](https://github.com/doctrine/mongodb-odm/issues?q=milestone%3A1.2).

* [#1448](https://github.com/doctrine/mongodb-odm/pull/1448) adds a builder for aggregation pipeline queries, similar to the query builder.
* [#1513](https://github.com/doctrine/mongodb-odm/pull/1513) adds a trait to avoid re-implementing `closureToPhp` in custom type classes.
* [#1518](https://github.com/doctrine/mongodb-odm/pull/1518) adds `updateOne` and `updateMany` methods to the query builder. 
* [#1519](https://github.com/doctrine/mongodb-odm/pull/1519) adds a command to validate mapping.
* [#1577](https://github.com/doctrine/mongodb-odm/pull/1577) allows priming fields in inverse references without specifying a repositoryMethod.
* [#1600](https://github.com/doctrine/mongodb-odm/pull/1600) adds an `AbstractRepositoryFactory` as base class when creating an own repository factory.
* [#1612](https://github.com/doctrine/mongodb-odm/pull/1612) adds support for immutable documents via the `readOnly` mapping option.
* [#1620](https://github.com/doctrine/mongodb-odm/pull/1620) adds support for specifying `readPreference` on a document level, replacing `slaveOkay`.
* [#1623](https://github.com/doctrine/mongodb-odm/pull/1623) adds a generic reference object as successor to `dbRef`.
* [#1654](https://github.com/doctrine/mongodb-odm/pull/1654) adds support for aggregation pipeline stages added in MongoDB 3.4.
* [#1661](https://github.com/doctrine/mongodb-odm/pull/1661) allows specifying a custom starting ID for `IncrementGenerator`.
