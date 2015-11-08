# Challenge 002 - Patterns of Dependency Injection

This challenge assumes that you have read the second chapter from Matthias Noback's ["A Year With Symfony"](https://leanpub.com/a-year-with-symfony), _Patterns of Dependency Injection_.

The goal of the challenge is to practice defining services in multiple ways, building compiler passes, extending bundles and creating configuration trees.

* Start off with a fresh Symfony 2 project inside of this directory.
* Create a new bundle and call it `PlaygroundBundle` - avoid using the automated generation methods for it and instead write your own. Add a Controller that prints out a message to know that your bundle is correctly set up.
	* Extension class
	* Routing entries
* Abstract Service:
	* Create an abstract service called `AbstractCountingService` that forces children to implement `getCountingFactor()` and `getNext($item)`. Make sure to register it in the service container.
	* Crate a `DoubleCoutingService` that has a counting factor of 2 and that when calling getNext() on 4 will return 6. Make sure to register it in the service container and that it extends the `AbstractCountingService` also from a DI pov.
	* Crate a `TripleCoutingService` that has a counting factor of 3 and that when calling getNext() on 5 will return 8. Make sure to register it in the service container and that it extends the `AbstractCountingService` also from a DI pov.
* Inheritance inside the container:
	* Create two Doctrine entities, Table and Chair. Add some properties to colour your domain.
	* Create a `BaseEntityManager` service that has a dependency on the entity manager service in Symfony. Make sure that the service cannot be retrieved directly.
	* Create a `TableManager` service and make sure it extends the `BaseEntityManager`. Implement the `getById($id)` method for retrieving a table (furniture item) from a repository. Also make sure that it logs the message "Table {$id} retrieved from backend". In the service definition make sure to get the entity manager from the base service, and the logger as a separate argument only for the `TableManager`.
	* Same as above, but for the `ChairManager`.
* Array of services as argument
	* Create a new service that returns the class names of some provided services. Define your new service and make sure to provide both the services above as a parameter.
* Compiler Pass
	* Create two new interfaces: `StorageInterface` with the `addValue($value)` method and `RendererInterface` with the `render($value)` method. Build a `StdoutRenderer` that prints a value. Build an IntegerStorage and a StringStorage service that holds integers and strings. Make sure to add the `simple_storage` tag to both the storage services.
	* Build a compiler pass that gets all of the `simple_storage` services and provides to them the `StdoutRenderer` as an argument.
	* Build an interface to show that it all works.
* Factories
	* Extend the StdoutRenderer with a RendererFactory - also build a FileRenderer that prints a value to a file.
* Manually create service
	* Create a new service in an Extension class that defines the FloatStorage service, that holds floats. Build an interface to display how this works.
* Configuration
	* Use all of the topics that you've learned during this chapter to set a value for the renderer that you want to use - in the end by calling `simple_renderer` as a service you should retrieve the configured one. Make sure the configuration option needs to be set in order for the bundle to work.
	* Build an interface to show this off.
	* Set the root configuration element for the bundle to be `custom_bundle`.
* Multiple configuration files
	* Define the Table service as XML, YML and PHP.
	* Build some examples to make sure they work.
