# Upgrade guide
## From 2.2.x and higher to 4.0.1 and higher
1. Remove usage of ArrayHelper class - switch to Illuminate\Support\Arr class
## From 2.1.x to 2.2.x and higher
1. Namespace change - Check all implementation of your repositories, and change namespaces:

    PacerIT\LaravelCore\Repositories\* -> PacerIT\LaravelRepository\Repositories\*
    
2. Delete firstOrNull() function - check usage of this functions. We recommed to replace
it to firstOrNew().
3. Configuration file - rename laravel-core.php config file to laravel-repository.php

This affects to Repositories, Criteria and Exceptions. Other than mentioned repository
functions are not changed.

## From 2.0.x to 2.1.x and higher
Check uses of getCreatedAtDate() and getUpdatedAtDate() functions in implementations of CoreEntity class.

This functions return now Illuminate\Support\Carbon instance instead of string.

## From 1.x.x to 1.1.x and higher
These steps are only required if you use datatable() method in CoreRepository class implementation.
Otherwise, nothing will change.

    1. Install suggested "yajra/laravel-datatables-oracle" in version compatibile with your framework
    2. Add "WithDatatable" trait in CoreRepository implementation that you want to user this method