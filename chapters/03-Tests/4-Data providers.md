## What are data providers?

- Functions (usually arrays or generators for large sets) providing data sets representing different test cases.
- They allow PHPUnit to run a single test several times with each set

## Test with data providers

```php
class RoutingTest extends WebTestCase
{
    public function provideUrisWithStatusCodes(): \Generator
    {
        yield ['/', 200];
        yield ['/login', 200];
        yield ['/logout', 302];
    }
    
    /**
     * @dataProvider provideUrisWithStatusCodes
     */
    public function testApplicationRoutes(string $uri, int $expectedStatusCode): void
    {
        $client = static::createClient();
        $client->request('GET', $uri);
        
        $this->assertResponseStatusCodeSame($expectedStatusCode);
    }
}
```

---

## Prepare your tests

PHPUnit provides hooks to prepare and optimize your tests:
- The protected methods `setUp` and `tearDown`, executed before and after each test
- The protected static methods `setUpBeforeClass` and `tearDownAfterClass` called before and after each test class

```php
class DefaultControllerTest extends WebTestCase
{
    /** @var KernelBrowser */
    public static $webclient;
    
    public static function setUpBeforeClass(): :void
    {
        // Do something before the test of this class
        // For example:
        self::$webclient = static::createClient();
    }
    
    /**
     * @dataProvider provideUrisWithStatusCodes
     */
    protected function testApplicationRoutes(): void
    {
        // Do something before each test
    }
    
    // ...
}
```

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
