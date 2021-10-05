## Documentation
---

## Todo API

### Add Todo
- Method : ```POST```
- Endpoint : ```todoAPI.php?fun=insertTodo```
- Body : 

```json
{
  "title" : "string",
  "catatan" : "string",
  "tanggal" : "string",
  "status" : "string"
}
```

- Response : 

```json
{
  "status" : "integer",
  "message" : "string"
}
```

### Delete Todo
- Method : ```DELETE```
- Endpoint : ```todoAPI.php?fun=deleteTodoById```
- Body : 

```json
{
  "id" : "string"
}
```

- Response : 

```json
{
  "status" : "integer",
  "message" : "string"
}
```

### Get All Todo
- Method : ```GET```
- Endpoint : ```todoAPI.php?fun=getAllTodo```
- Body : -
- Response : 

```json
{
  "status" : "integer",
  "message" : "string",
  "data" : [
  {
    "id" : "string",
    "title" : "string",
    "catatan" : "string",
    "tanggal" : "string",
    "status" : "string"
  }]
}
```

### Get Todo by Id
- Method : ```POST```
- Endpoint : ```todoAPI.php?fun=getTodoById```
- Body : 

```json
{
  "id" : "string"
}
```

- Response : 

```json
{
  "status" : "integer",
  "message" : "string",
  "data" : [
  {
    "id" : "string",
    "title" : "string",
    "catatan" : "string",
    "tanggal" : "string",
    "status" : "string"
  }]
}
```

### Update Todo by Id
- Method : ```POST```
- Endpoint : ```todoAPI.php?fun=updateTodoById```
- Body : 

```json
{
  "id" : "string"
}
```

- Response : 

```json
{
  "status" : "integer",
  "message" : "string",
  "data" :
  {
    "id" : "string",
    "title" : "string",
    "catatan" : "string",
    "tanggal" : "string",
    "status": "string"
  }
}
```
---

## Pengguna API

### Add Pengguna
- Method : ```POST```
- Endpoint : ```todoAPI.php?fun=insert_pengguna```
- Body : 

```json
{
  "nama" : "string",
  "alamat" : "string",
  "email" : "string",
  "image" : "string",
  "password" : "string",
}
```

- Response : 

```json
{
  "status" : "integer",
  "message" : "string"
}
```

### Add Image
- Method : ```POST```
- Endpoint : ```todoAPI.php?fun=insert_image```
- Body : 

```json
{
  "image" : "MultipartBody.Part"
}
```

- Response : 

```json
{
  "status" : "integer",
  "message" : "string"
}
```

### Delete Pengguna
- Method : ```DELETE```
- Endpoint : ```todoAPI.php?fun=delete_pengguna```
- Body : 

```json
{
  "id" : "string"
}
```

- Response : 

```json
{
  "status" : "integer",
  "message" : "string"
}
```

### Update Pengguna
- Method : ```POST```
- Endpoint : ```todoAPI.php?fun=update_pengguna```
- Body : 

```json
{
  "id" : "string",
  "nama" : "string",
  "alamat" : "string",
  "email" : "string",
  "image" : "string",
  "password" : "string"
}
```

- Response : 

```json
{
  "status" : "integer",
  "message" : "string"
}
```

### Get All Pengguna
- Method : ```GET```
- Endpoint : ```todoAPI.php?fun=get_all_pengguna```
- Body : -
- Response : 

```json
{
  "status" : "integer",
  "message" : "string",
  "data" : [
  {
   "id" : "string",
   "nama" : "string",
   "alamat" : "string",
   "email" : "string",
   "image" : "string",
   "password" : "string"
  }]
}
```

### Get Pengguna by Id
- Method : ```GET```
- Endpoint : ```todoAPI.php?fun=get_pengguna_by_id```
- Body : 

```json
{
  "id" : "string"
}
```

- Response : 

```json
{
  "status" : "integer",
  "message" : "string",
  "data" :
  {
    "id" : "string",
    "nama" : "string",
    "alamat" : "string",
    "email" : "string",
    "image" : "string",
    "password" : "string"
  }
}
```

### Login
- Method : ```POST```
- Endpoint : ```todoAPI.php?fun=login```
- Body : 

```json
{
  "email" : "string",
  "password" : "string"
}
```

- Response : 

```json
{
  "status" : "integer",
  "message" : "string",
  "data" :
  {
    "id" : "string",
    "nama" : "string",
    "alamat" : "string",
    "email" : "string",
    "image" : "string",
    "password" : "string"
  }
}
```

### Send Notification (Firebase Cloud Message)
- Method : ```POST```
- Endpoint : ```todoAPI.php?fun=send_notif```
- Body : 

```json
{
  "title" : "string",
  "message" : "string"
}
```

- Response : 

```json
{
  "status" : "integer",
  "message" : "string"
}
```

## Screnshot hasil program

<table align="center">
  <tr>
    <td><img src="https://user-images.githubusercontent.com/76394274/134543431-b6eee0b7-126d-413f-a9a2-8733dcff1e4d.png" alt="HTML5 Icon" width="300" height="400"></td>
    <td><img src="https://user-images.githubusercontent.com/76394274/134543679-1ff4e443-c742-4774-9900-fb49b75a4b10.png" alt="HTML5 Icon" width="300" height="350"></td>
  </tr>
  <tr align="center">
    <td>response get all todo</td>
    <td>response todo by id</td>
  </tr>
   <tr>
    <td><img src="https://user-images.githubusercontent.com/76394274/134543766-a0aed353-5d1f-401c-8dd2-0fdaab2a01dc.png" alt="HTML5 Icon" width="300" height="100"></td>
    <td><img src="https://user-images.githubusercontent.com/76394274/134544090-9a674cc0-6409-404f-b7cd-a8529157bec6.png" alt="HTML5 Icon" width="300" height="100"></td>
  </tr>
  <tr align="center">
    <td>response menghapus todo</td>
    <td>response menambah todo</td>
  </tr>
    <tr>
    <td><img src="https://user-images.githubusercontent.com/76394274/134544387-b8cb4433-5577-4499-bde2-77c24e1cf61a.png" alt="HTML5 Icon" width="300" height="100"></td>
  </tr>
  <tr align="center">
    <td>response edit todo</td>
  </tr>
</table>
