# Changelog
## v.4.0.0
    - update dependencies for Laravel and Lumen 8.x.x compatibility
## v.3.0.1
    - ramsey/uuid is now suggested package instead of required
## v.3.0.0
    - update dependencies for Laravel and Lumen 7.x.x compatibility
## v.2.2.1
    - add ramsey/uuid package as required
## v.2.2.0
### See upgrade guide!
    - from now Repository feature is delivered by pacerit/laravel-repository package
## v.2.1.2
    - fix misspell in first() function in WithCache trait
## v.2.1.1
    - fix first() function in WithCache trait
## v.2.1.0
### See upgrade guide!

    - getCreatedAtDate() and getUpdatedAtDate() in CoreEntity class, return now 
    Illuminate\Support\Carbon instance instead of string - this fix timestamp casting issue
    - add count() function in CoreRepository class
## v.2.0.4
    - fix first() function in CoreRepository
## v.2.0.3
    - update create cache key - now is namespace of repository class insted of name. This
    prevent overwrite if you have multiple repositories with this same class name.
## v.2.0.2
    - fix problem with flushing cache in Repository - now is flushed separatly for
    each repository class
## v.2.0.1
    - add Chunk() function into CoreRepository class
## v.2.0.0
    - add compatibility for Laravel and Lumen version 6.0.x
## v.1.1.5
    - add getEntity() function into CoreRepository class
## v.1.1.4
    - add OffsetCriteria
## v.1.1.3
    - dependency update
    - improve code style format - StyleCI
    - add first tests
    - integration with TravisCI
    - fix CoreExceptionInterface namespace
    - fix isRegistered() function in ScenarioTrait class

## v.1.1.2
    - fix CoreRepositoryCriteriaInterface implementation
    - update error codes for CoreRepository exceptions
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