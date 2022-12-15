## MakerBundle

The MakerBundle is a utilitary bundle created to help you generate quickly skeletons for most symfony related files you may need.

You can see a list of all the things it can help you with by typing the following command:

```bash
$ symfony console list make
```

---

## First page – easy way

```bash
$ symfony console make:controller

Choose a name for your controller class (e.g. AgreeablePizzaController):
 > BookController

 created: src/Controller/BookController.php
 created: templates/book/index.html.twig

           
  Success! 
           

Next: Open your new controller class and add some pages!
# Open your browser on https://localhost:8000/book
```