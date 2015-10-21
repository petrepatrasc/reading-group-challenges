# Challenge 001: Symfony Kernel Events

This challenge assumes that you have read the first chapter from Matthias Noback's ["A Year With Symfony"](https://leanpub.com/a-year-with-symfony), _The journey from request to response_.

The goal of the challenge is to practice understanding the Symfony 2 framework event life-cycle, building event listeners and event subscribers, and managing sub requests.

1. Start off with a new Symfony 2 project.
2. Build an event listener for `kernel.request` that will automatically add the `X-READING-GROUP` header to the request and set it to a value of your choosing.
3. Write three controllers with the following methods, and make sure that they return an individual Response:
	1. RegularController::indexAction()
	2. CatchableController::indexAction()
	3. RewrittenController::capturedAction()
4. Build an event listener for `kernel.controller` that will replace any CatchableController calls to RewrittenController, in the `captured` action.
5. Add an additional Controller, with the following method and make sure it returns a simple array that also contains the value of the `X-READING-GROUP` header that you've previously attached to the Request:
	1. ApiController::getProduct()
6. Build an *event subscriber* for `kernel.view` event that will capture any output from the ApiController and return a JSON serialization of the array that the Controller returns.
7. Add a new Controller, with the following method that returns a Response with the string "I come from the controller":
	1. IgnoredOutputController::indexAction()
8. Build either an event listener or an event subscriber for the `kernel.response` event that will overwrite the Response with the string "Interception OK" every time the IgnoredOutputController is called.
9. Add an event listener or event subscriber for the `kernel.terminate` event that will run for 10 seconds and that will write into a file on the local storage a random integer every second. Analyze the output of the file after making a request to the Controller.

## Bonus Points

1. Add another Controller that throws an Exception with the message "I am the original Controller Exception".
2. Add an event listener or event subscriber for the `kernel.exception` event that will throw another Exception that has the message "I am the event Exception" and that has a link to the exception from the Controller.
3. Use any of the listeners above in combination with a sub-request from a Twig file in order to make a sub-request. Analyze the logs to see more information regarding the sub-requests and try to visualize how everything happened.
