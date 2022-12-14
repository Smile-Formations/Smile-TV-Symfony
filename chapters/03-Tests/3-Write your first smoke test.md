## Install PHPUnit

```bash
# With Flex
$ symfony composer require test
```

## Controller class

A smoke test in its simplest form calls a URL and checks the status code is the expected one.

You should just have a URL to test in the form of a controller and route, and test that it returns a response 200 OK.

If not done in the previous exercise, use the MakerBundle to generate a `DefaultController` for the homepage.

## Test class

You can use the MakerBundle to generate the corresponding test class stub. The basic test included is the perfect smoke test base.

![3.3.1](../assets/03-Tests/3-Write%20your%20first%20smoke%20test/3.3.1.png)
![3.3.2](../assets/03-Tests/3-Write%20your%20first%20smoke%20test/3.3.2.png)

---

## Execute tests with PHPUnitBridge

To execute the tests, call the special version of PHPUnit included in your bin folder

![3.3.3](../assets/03-Tests/3-Write%20your%20first%20smoke%20test/3.3.3.png)

## Output when a test fails

If you change the test condition:

![3.3.4](../assets/03-Tests/3-Write%20your%20first%20smoke%20test/3.3.4.png)