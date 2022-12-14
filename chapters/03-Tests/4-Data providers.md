## What are data providers?

- Functions (usually arrays or generators for large sets) providing data sets representing different test cases.
- They allow PHPUnit to run a single test several times with each set

## Test with data providers

![3.4.1](../assets/03-Tests/4-Data%20providers/3.4.1.png)

---

## Prepare your tests

PHPUnit provides hooks to prepare and optimize your tests:
- The protected methods `setUp` and `tearDown`, executed before and after each test
- The protected static methods `setUpBeforeClass` and `tearDownAfterClass` called before and after each test class

![3.4.2](../assets/03-Tests/4-Data%20providers/3.4.2.png)

## Test tips

- You can group tests using “@group”, and run test only of that group with “--group” option
- If your test suite is taking a very long time, you can use “--stop-on-failure” and/or “--stop-on-error” options to stop execution at the first failure/error
- You can run only one test with “--filter” option

---

## Exercises

All along the training, write smoke tests to cover your app.

---

## Resources

- [https://symfony.com/doc/current/testing.html](https://symfony.com/doc/current/testing.html)
- [https://phpunit.readthedocs.io/fr/latest](https://phpunit.readthedocs.io/fr/latest)
