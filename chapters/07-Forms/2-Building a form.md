## Create a form type

A form type is an object implementing the FormTypeInterface, made to hold one or more field definitions.
Two types of FormTypes are usually built in a Symfony application:
- FormTypes based on a data class or entity, to create a whole form
- FormTypes made to create and render a very specific form field

You can create a FormType skeleton with the MakerBundle `make:form` command. It optionally takes an entity name bo be used as base for the form type.

```bash
$ symfony console make:form BookType Book
```

---

## Default skeleton

```php
class BookType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('foo')
            ->add('bar')
            //...
            // One add() call for one property from your entity
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Book::class
        ]);
    }
}
```

---

## Create a form

- One the FormType defined, the form has to be instanced and rendered in a template.
- In a class extending the AbstractController, you can use the $this->createForm shortcut. It will return a FormInterface instance based on your FormType.
- You can then return a Response with the $this->renderForm (since Symfony 5.4) shortcut and pass your form in the parameters.
- Inside a template, the form function can display your form entirely.

```php
#[Route('/book', name: 'book_')]
class BookController extends AbstractController
{
    #[Route('/create', name: 'create')]
    public function create(): Response
    {
        $form = $this->createForm(BookType::class);
        
        return $this->renderForm('book/create.html.twig', [
            'book_form' => $form,
        ]);
    }
}
```

```php
{{ form_start(book_form) }}
    {{ form_widget(book_form) }}
    <button type="submit" class="btn">Submit</button>
{{ form_end(book_form) }}
```

_Note: To improve reusability, your buttons should be written in pure HTML and not defined in the FormTypes._