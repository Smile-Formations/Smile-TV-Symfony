## ORM

The ORM project serves as a link between your data classes and your database storage.

By means of system-agnostic entities, Doctrine will translate your data mapping to the storage and back again.

![6.2.1](../assets/06-Doctrine/2-Entities%20&%20mapping-/6.2.1.png)

## Entities

An Entity is the mapping configuration related to a PHP class:
This configuration is available in multiple formats:
- Attributes or annotations (recommended)
- Yaml
- XML
- PHP

With attributes (recommended):

```php
namespace App\Entity;

use App\Repository\BookRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BookRepository::class)]
class Book
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(precision: 5, scale: 2)]
    private ?float $price = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }
    
    //...
}
```

With annotations:

```php
namespace App\Entity;

use App\Repository\BookRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BookRepository::class)
 */
class Book
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column
     */
    private ?int $id = null;

    /**
     * @ORM\Column(length=255)
     */
    private ?string $title = null;

    /**
     * @ORM\Column(precision=5, scale=2)
     */
    private ?float $price = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }
    
    //...
}
```

---

## New entity

You can create a new entity by adding manually some mapping to a PHP class, or you can use the MakerBundle’s `make:entity` command to create both at the same time.

```bash
$ symfony console make:entity Book
```