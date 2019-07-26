# Lravel Core

Package of core classes that provide standardization in usage of Services, Repositories etc. for Laravel framework.

## Classes included

### Basic classes
    CoreEntity::class - base class models
    CoreRepository::class - base class of repositories
    CoreService::class - base class of services
    CoreFormatter::class - base class of formatter
    CoreException::class - base class of exceptions
    
    #### In progress
    CoreWebContoller::class - base class of web controller
    CoreAPIContoller::class - base class of API controller
    CoreJob::class - base class of jobs
    CoreCommand::class - base class of commands
    CoreViewComposer::class - base class of view composer
    
### Traits
    ScenatioTrait::class
    StringTrait::class
    
    #### In progress
    CurrencyTrait::class
    LanguageTrait::class
    
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
    $this->app->bind(EExampleRepositoryInterfaceclass, ExampleRepository::class);
}
```

### Using UUID's in Entity
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
    