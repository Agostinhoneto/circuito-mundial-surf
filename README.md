# API Laravel 10 - Circuito Mundial de Surf.

## Instalação

1. Clone o repositório
   ```bash
   git clone https://github.com/Agostinhoneto/circuito-mundial.git

 1.1 - cd circuito-mundial
 1.2 -  composer install
 1.3 - cp .env.example .env
 1.4 - php artisan key:generate

2. **Configuração da Base de Dados:**
   - Instruções para configurar e migrar o banco de dados.

## Configuração da Base de Dados

2.1 - Configure o arquivo `.env` com as informações do banco de dados nesse caso usei o Mysql.

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=circuitomundialsurf
DB_USERNAME=
DB_PASSWORD=

2.3 - php artisan migrate.
2.4  - php artisan db:seed - Para rodar os seeders de todas as tabelas : Surfistas,Baterias, Ondas e Notas.
2.5 - php artisan serve - Para rodar a aplicação.

### 4 - Endpoints
- para rodar os Endpoints eu utilizei a ferramenta Postman.

### `http://localhost:8000/api/surfistas`

- **GET** :  `http://localhost:8000/api/surfistas/index` - Obter a lista de todos os Surfistas.
- **POST**:  `http://localhost:8000/api/surfistas/store` -  Inserir surfistas.

### `http://localhost:8000/api/bateria`

Baterias.
- **POST**: `http://localhost:8000/api/bateria/store` - Cadastrar novas ondas em uma bateria.
- **GET** : `http://localhost:8000/api/bateria/vencedor/{bateriaId}` - Obter o vencedor de uma bateria.

### `http://localhost:8000/api/ondas`

- **POST**: `http://localhost:8000/api/ondas/store` - Criar uma nova onda

### `http://localhost:8000/api/notas`

- **POST**: `http://localhost:8000/api/notas/store` - Criar um nova nota .
