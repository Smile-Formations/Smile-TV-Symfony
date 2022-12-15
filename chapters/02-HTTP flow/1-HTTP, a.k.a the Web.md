## Concept

HTTP is a protocol to communicate over the Internet. Its basic workings are simple:
- A Client makes a Request to read/write resources
- A Server receives a request and send back a Response

![2.1.1](../assets/02-HTTP%20flow/1-HTTP,%20a.k.a%20the%20Web/2.1.1.png)

---

## HTTP Request

Anatomy of the request:
- first line: method + resource + protocol
- headers: key-value pairs
- a body may follow an empty line (post payload)

```bash
GET /some-page HTTP/2
HOST: example.org

Some optional body
```

---

## HTTP Response

Anatomy of the response
- first line: protocol + status code + status text
- headers: key-value pairs
- a body may follow an empty line (resource content)

```bash
HTTP/2 200 OK
Content-Type: text/plain
Content-Length: 12345

Some optional body
```


