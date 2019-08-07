# Upgrade guide
## From 1.x.x to 1.1.x and higher
These steps are only required if you use datatable() method in CoreRepository class implementation.
Otherwise, nothing will change.

    1. Install suggested "yajra/laravel-datatables-oracle" in version compatibile with your framework
    2. Add "WithDatatable" trait in CoreRepository implementation that you want to user this method