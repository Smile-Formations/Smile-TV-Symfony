## What are Automated Tests ?

>Software testing is an investigation conducted to provide stakeholders with information about the quality of the software product or service under test. Software testing can also provide an objective, independent view of the software to allow the business to appreciate and understand the risks of software implementation. **Test techniques include the process of executing a program or application with the intent of finding failures**, and verifying that the software product is fit for use.


## Test Pyramid

- **Unit Tests**
  - These tests ensure that individual units of source code (e.g. a single class) behave as intended.
- **Integration Tests**
  - These tests test a combination of classes and commonly interact with Symfony’s service container. These tests do not yet cover the fully working application, those are called Application tests.
- **Application Tests**
  - Application tests test the behavior of a complete application. They make HTTP requests (both real and simulated ones) and test that the response is as expected.
- **Smoke Tests**
  - Smoke tests are the most broad and basic tests of an application. They only check the application turns on and sends back a response with the proper HTTP code for each endpoint.

Symfony docs : [https://symfony.com/doc/current/testing.html](https://symfony.com/doc/current/testing.html)

---

## Follow the F.I.R.S.T rule

**Tests must be:**
- **Fast** in their execution
- **Isolated** from each other
- **Repeatable** indefinitely
- **Self-explanatory**
- Must come **Timely**


