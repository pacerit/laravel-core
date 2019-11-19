# Upgrade guide
## From 2.0.x to 2.1.x and higher
Check uses of getCreatedAtDate() and getUpdatedAtDate() functions in implementations of CoreEntity class.

This functions return now Illuminate\Support\Carbon instance instead of string.

## From 1.x.x to 1.1.x and higher
These steps are only required if you use datatable() method in CoreRepository class implementation.
Otherwise, nothing will change.

    1. Install suggested "yajra/laravel-datatables-oracle" in version compatibile with your framework
    2. Add "WithDatatable" trait in CoreRepository implementation that you want to user this method