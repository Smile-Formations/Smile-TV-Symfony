## Update our rendering

```yaml
# config/packages/twig.yaml

twig:
  default_path: '%kernel.project_dir%/templates'

  # Make Symfony write convenient html output for Bootstrap
  form_themes:
    - bootstrap_5_horizontal_layout.html.twig
  
# Now, don(t forget to require Bootstrap in your stylesheets
```

## Update our type

```php
public function buildForm(FormBuilderInterface $builder, array $options)
{
    $builder
        ->add('isbn', TextType::class, [
            'label' => 'ISBN',
        ])
        ->add('title', TextType::class, [
            'label' => 'Title',
        ])
        ->add('datePublished', DateType::class, [
            'label' => 'Publication date',
            'widget' => 'single_text',
            'input' => 'datetime_immutable',
        ])
}
```

## Dynamic scan of your types

```bash
# Dump know types
$ symfony console debug:form

# Dump options of a given type
$ symfony console debug:form 'App\Form\BookType'

# Have a look!
```

---

## Exercises

Create a new form for the contact page.
- Create a new type
- Display the form
