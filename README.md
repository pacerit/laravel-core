# Laravel Core
![GitHub tag (latest by date)](https://img.shields.io/github/tag-date/pacerit/laravel-core?label=Version)
![GitHub](https://img.shields.io/github/license/pacerit/laravel-core?label=License)
![Packagist](https://img.shields.io/packagist/dt/pacerit/laravel-core?label=Downloads)
![PHP from Packagist](https://img.shields.io/packagist/php-v/pacerit/laravel-core?label=PHP)

Package of core classes that provide standardization in usage of Services, Repositories etc. for Laravel framework.

## Installation
    composer require pacerit/laravel-core
### Version compatibility
#### Laravel
Framework | Package
:---------|:--------
5.8.x     | ^1.x.x
#### Lumen
Framework | Package
:---------|:--------
5.8.x     | ^1.1.x

## Classes included

### Basic classes
    CoreEntity::class - base class models
    CoreRepository::class - base class of repositories
    CoreService::class - base class of services
    CoreFormatter::class - base class of formatter
    CoreException::class - base class of exceptions
        
### Traits
    ScenatioTrait::class
    StringTrait::class
    NumberTrait::class
    XMLTrait::class
    
## Implementation

### Entities implementation
In order to use Service, Repositories or Formatter classes, first you must prepare your entities. Every entity
in you application must:
- Extend CoreEntity class
- Implements interface that extend CoreEntityInterface

For example, this is implementation of Example entity:

Example class:
```
class Example extends CoreEntity implements ExampleInterface
{}
```

ExampleInterface:
```
interface ExampleInterface extends CoreEntityInterface
{}
```
Interface and entity class must be bind in you app ServiceProvider:
```
/**
 * Register any application services.
 *
 * @return void
 */
public function register()
{
    $this->app->bind(ExampleInterface::class, Example::class);
}
```

#### Using UUID's in Entity
This package provides possibility to use UUID's in Entities as secondary key, for external use (i.e. in routes). 
It still requires to use integer type ID's as Primary keys in your database.

To use UUID's in your Entity, it must:
- Implements UUIDInterface
- Use UsesUUID trait

In your migration create field with "uuid" key using uuid() method.
```
$table->uuid(UsesUUID::UUID);
```
UUID's will bu automatically generated when new entity is created.
If you use Services, you can add WithUUID trait to your implementation of CoreService class to add methods that 
are helpful when using UUID's.
```
class MyEntityService extends CoreService implements MyEntityServiceInterface
    use WithUUID;
    (...)
```

### Repositories implementation
To use Repositories, create repository class that:
- Extend CoreRepository class
- Implements interface that extend CoreRepositoryInterface

For example, this is implementation of repository for Example entity:

ExampleRepositoryInterface:
```
interface ExampleRepositoryInterface extends CoreRepositoryInterface
{}
```

ExampleRepository class. This class has to implement entity() method, that return namespace of entity
that will be used by repository.
```
class ExampleRepository extends CoreRepository implements ExampleRepositoryInterface
{
    /**
     * Model entity class that will be use in repository
     *
     * @return CoreRepositoryInterface
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     * @since 2019-07-05
     */
    public function entity(): string
    {
        return ExampleInterface::class;
    }

}
```

Interface and repository class must be bind in you app ServiceProvider:
```
/**
 * Register any application services.
 *
 * @return void
 */
public function register()
{
    $this->app->bind(ExampleRepositoryInterfaceclass, ExampleRepository::class);
}
```
#### Using repositories
To use Repository in controller or other class you can use dependency injection or Container. Below is sample code of
using service in controller.
```
class ExampleController extends Controller {

    /**
     * @var ExampleRepositoryInterface $exampleRepository
     */
    protected $exampleRepository;

    public function __construct(ExampleRepositorynterface $exampleRepository){
        $this->exampleRepository = $exampleRepository;
    }

    ....
}
```
If you already using CoreService implementation, you can use getRepository() method to get instance of CoreRepository
for Entity that Service belong.
##### Available methods
* makeEntity() - make new entity instance
* getEntity() - return previously set entity instance
* pushCriteria() - push new criteria to use in query (passed class must be implementation of CoreRepositoryCriteria)
* popCriteria() - delete given criteria from use (if exist)
* getCriteria() - return collection of actualy set criteria
* applyCriteria() - apply criteria to use in query
* skipCriteria() - skip criteria in query
* clearCriteria() - clear criteria colleciton - delete all pushed criterias
* all(array $columns) - get all records
* get(array $columns) - get records (with criteria)
* first(array $columns) - get first record (with criteria)
* create(array $parameters) - create new entity record
* updateOrCreate(array $where, array $values) - update existing record, or create new
* update(int $id, array $parameters) - update entity by ID
* delete(int $id) - delete entity record by ID
* firstOrNew(array $where) - return first entity record if found, otherwise return new entity
* firstOrNull(array $where) - return first entity record if found, otherwise return null
* orderBy(string $column, string $direction) - order records by column
* with($relations) - add relations sub-query
* transactionBegin() - begin database transaction
* transactionCommit() - commit transaction
* transactionRollback() - rollback transaction
* findWhere(array $where, array $columns) - return all records that match where array
* findWhereIn(string $column, array $where, array $columns)
* findWhereNotIn(string $column, array $where, array $columns)

##### Additional methods (Laravel only)
* datatable() - return EloquentDataTable instance for records. In order to user with method,
you must install suggested "yajra/laravel-datatables-oracle" package, and add "WithDatatable"
trait in your repository of choice.
### Services implementation
To use Service, create service class that:
- Extend CoreService class
- Implements interface that extend CoreServiceInterface

For example, this is implementation of service for Example entity:

ExampleServiceInterface:
```
interface ExampleServiceInterface extends CoreRepositoryInterface
{}
```
ExampleService class. In __construct() function of class, provide class of repository for entity, and set it by
setRepository() function. Optionally you can pass formatter for entity and set if by setFormattter() function
to provide formatting functionality.
Provided classes must be implementation of CoreRepository/CoreFormatter.
```
class ExampleService extends CoreService implements ExampleServiceInterface
{
    /**
     * ExampleService constructor.
     *
     * @param ExampleRepositoryInterface $exampleRepository
     * @param ExampleFormatterInterface $exampleFormatter
     */
    public function __construct(
        ExampleRepositoryInterface $exampleRepository,
        ExampleFormatterInterface $exampleFormatter
    ) {
        $this->setRepository($exampleRepository)
            ->setFormatter($exampleFormatter);
    }

}
```
#### Using services
To use Service in controller or other class you can use dependency injection or Container. Below is sample code of
using service in controller.
```
class ExampleController extends Controller {

    /**
     * @var ExampleServiceInterface $exampleService
     */
    protected $exampleService;

    public function __construct(ExampleServiceInterface $exampleService){
        $this->exampleService = $exampleService;
    }

    ....
}
```
##### Available methods
* setRepository() - set repository to use in service. Passing object must be implementation of CoreRepositoryInterface
* getRepository() - return previously set repository class instance
* setFormatter() - set formatter class to use in service. Passing object must be implementation of 
CoreFormatterInterface
* getFormatter() - return previously set formatter class instance
* setModel() - set model you want to work on i.e. if you already have instance
* setModelByID() - set model by given id (integer). If model with given ID exist, it will be set, otherwise exception
will by thrown
* setModelByKey() - set model by given key (column in table) and given value. Helpful when looking for record by column
other than ID (i.e foreign key)
* setNewMode() - set new model class instance
* getModel() - get previously set model class instance
* format() - get previously set model class instance and pass it to formatter class. CoreFormatterInterface instance
will be return. Example of use.
```
// Return Example entity record with ID 1 as an array.
return $this->exampleService->setModelByID(1)->format()->toArray();
```
* create() - create new entity record based on actually set model, of given parameters. Example:
```
For this example, we we assume that Example entity class have setFirstValue() and setSecondValue() functions(setters)
and const. Both of this example, create the same records in database.

// Create based on previously set entity.
$this->exampleService
    ->setNewModel()
    ->getModel()
    ->setFirstValue(1)
    ->setSecondValue(2);

$this->exampleService->create();

// Create model based on parameters.
$this-exampleService->create(
    [
        ExampleInterface::FIRST_VALUE => 1,
        ExampleInterface::SECOND_VALUE => 2,
    ]
);

```
* update() - update model. Like in create method it base on previously set model or parameters, but we must set existing
model record before. Otherwise exception will be thrown. Example:
```
// Update based on previously set entity.
$this->exampleService
    ->setModelByID(1)
    ->getModel()
    ->setFirstValue(2);

$this->exampleService->update();

// Update model based on parameters.
$this-exampleService->update(
    1,
    [
        ExampleInterface::FIRST_VALUE => 2,
    ]
);
```
* delete() - delete model. Like in update() method, this also required to set existing model before.
```
$this->exampleService->setModelByID(1)->delete();
```
    