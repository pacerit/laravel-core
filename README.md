# Butterfly Core

Package of core classes that provide standardization in usage of Services, Repositories etc. for Laravel framework.

## Classes included

### Basic classes
    CoreEntity::class - base class models
    CoreContoller::class - base class of controller
    CoreService::class - base class of services
    CoreRepository::class - base class of repositories
    CoreFormatter::class - base class of formatter
    CoreException::class - base class of exceptions
    CoreJob::class - base class of jobs
    CoreCommand::class - base class of commands
    CoreHelper::class - base class of helpers
    CoreViewComposer::class - base class of view composer
    
### Services
    CoreSettingsService::class - Service for storing global setitings values for modules
    
### Traits
    CurrencyTrait::class
    LanguageTrait::class
    
### Facades
    LogFacade::class - extension to default Laravel facede. Add generate of backtract of error based on default 
    log function. To user it, overwrite Log facede in config/app.php