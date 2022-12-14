## Handle Submitted Data

The `FormInterface::handleRequest` method simply takes a Request object as its only argument and hydrates the Form fields from it.
You can then check if the form was properly submitted and inf its data is valid.

## Controller updates

```php
#[Route('/create', name: 'book_create', methods: ['GET'])]
public function create(Request $request)
{
    $form = $this->createForm(BookType::class);
    $form->handleRequest($request)
    
    if ($form->isSubmitted() && $form->isValid()) {
        dump($form->getData());
    }
    
    return $this->renderForm('book/create.html.twig', [
        'book_form' => $form,
    ]);
}
```