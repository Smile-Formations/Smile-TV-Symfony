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

```bash
$ symfony console make:test

 Which test type would you like?:
  [TestCase       ] basic PHPUnit tests
  [KernelTestCase ] basic tests that have access to Symfony services
  [WebTestCase    ] to run browser-like scenarios, but that don\'t execute JavaScript code
  [ApiTestCase    ] to run API-oriented scenarios
  [PantherTestCase] to run e2e scenarios, using a real-browser or HTTP client and a real web server
 > WebTestCase


Choose a class name for your test, like:
 * UtilTest (to create tests/UtilTest.php)
 * Service\UtilTest (to create tests/Service/UtilTest.php)
 * \App\Tests\Service\UtilTest (to create tests/Service/UtilTest.php)

 The name of the test class (e.g. BlogPostTest):
 > Controller\DefaultControllerTest

 created: tests/Controller/DefaultControllerTest.php

           
  Success! 
           

 Next: Open your new test class and start customizing it.
 Find the documentation at https://symfony.com/doc/current/testing.html#functional-tests

```

```php
<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testSomething(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');

        $this->assertResponseIsSuccessful();
        // Remove this line
        $this->assertSelectorTextContains('h1', 'Hello World');
    }
}

```

---

## Execute tests with PHPUnitBridge

To execute the tests, call the special version of PHPUnit included in your bin folder

```bash
$ ./bin/phpunit

PHPUnit 9.5.27 by Sebastian Bergmann and contributors.

Testing
.                                                                   1 / 1 (100%)

Time: 00:00.130, Memory: 26.00 MB

OK (1 test, 1 assertion)
```

## Output when a test fails

If you change the test condition:

```bash
$ ./bin/phpunit

PHPUnit 9.5.27 by Sebastian Bergmann and contributors.

Testing
F                                                                   1 / 1 (100%)

Time: 00:00.128, Memory: 26.00 MB

The was 1 failure:

1) App\Tests\Controller\DefaultControllerTest::testHomepage
Failed asserting that the Response status code is 201.
#....
FAILURES!
Tests: 1, Assertions: 1, Failures: 1.
```