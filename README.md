# Deployment

### Server requirements [link](https://laravel.com/docs/10.x/deployment#server-requirements)

### Nginx [link](https://laravel.com/docs/10.x/deployment#nginx)

### Clone repository 

```bash
git clone https://github.com/firdavsibodullaev/reka-test.git
```

### Rename `.env` to `.env.example`

### Create application key:

```bash
php artisan key:generate
```


### DB configuration:

```dotenv
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=reka_test
DB_USERNAME=root
DB_PASSWORD=
```

### Run migrations:

```bash
php artisan migrate
```

## Frontend

### Install npm

```bash
npm install
```

### Run vite

```bash
vite build
```

### Storage

```bash
php artisan storage:link
```
