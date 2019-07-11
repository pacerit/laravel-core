# Butterfly Core

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
    
    #### In progress
    CurrencyTrait::class
    LanguageTrait::class
    
## Implementation
### Using UUID's in Entity
This package provides possibility to use UUID's in Entities as secondary key, for external use (i.e. in routes). 
It still requires to use integer type ID's as Primary keys in your database.

To use UUDD's in your Entity, it must:
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
    