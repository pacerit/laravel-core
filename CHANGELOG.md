# Changelog
## v.1.1.1
    - add WithCache trait that handle repository cache
    - update LICENSE.md file
    - update README.md file
## v.1.1.0
See upgrade guide!

    - package is now compatibile with Lumen framework!
    - move datatable() function from CoreRepository class into WithDatatable trait
    - remove "yajra/laravel-datatables-oracle" package, and move it to suggest
## v.1.0.5
    - extend CoreRepository
        * add first() function
        * add findWhere() function
        * add findWhereIn() function
        * add findWhereNotIn() function
## v.1.0.4
    - extend CoreRepository
        * add transactionBegin(), transactionCommit(), 
        transactionRollback() methods
## v.1.0.3
    - extend CoreRepository
        * add updateOrCreate() function
        * add with() function
## v.1.0.2
    - update documentation
    - extend CoreRepository
        * add datatable() function, producing datatable response
        * add orderBy() function
        * fix getEntity() function
    - add Criteria
        * DateCriteria
        * FindWhereCriteria
        * FindWhereInCriteria
        * LimitCriteria
        * OrWhereCriteria
        * Select2Criteria
## v.1.0.1
    - update documentation
    - add NumberTrait class
    - add XMLTrait class
    - update StringTrait class
    - add LICENSE file
    - update WithUUID Trait for Services
## v.1.0.0
    - initial release 