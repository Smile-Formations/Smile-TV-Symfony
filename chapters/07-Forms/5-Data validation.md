## About validation

- Data validation uses the Validator component
- No configuration is needed after install
- Validation Constraints are applied to the data, and are checked by the Validator
- Constraints are given in the FormTypes or written in your data class
- Constraints can be applied to single datas or at the class level
- Custom constraints can be created

## Validation

With attributes (recommended):

```php
use App\Repository\BookRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: BookRepository::class)]
#[UniqueEntity('isbn')]
class Book
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[Assert/NotBlank]
    #[Assert/Isbn(type: 'isbn13')]
    #[ORM\Column(length: 13)]
    private ?string $isbn = null;
    
    //...
}
```

With annotations: 

```php
use App\Repository\BookRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=BookRepository::class)
 * @UniqueEntity('isbn')
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
     * @Assert/NotBlank
     * @Assert/Isbn(type="isbn13")
     * @ORM\Column(length=13)
     */
    private ?string $isbn = null;
    
    //...
}
```

---

## Exercises

- Add constraints to your form data.
- Check the validation with the Symfony Profiler.

---

## Resources

- [https://symfony.com/doc/current/forms.html](https://symfony.com/doc/current/forms.html)
- [https://symfony.com/doc/current/reference/forms/types.html](https://symfony.com/doc/current/reference/forms/types.html)
- [https://symfony.com/doc/current/reference/constraints.html](https://symfony.com/doc/current/reference/constraints.html)


