# API Laravel 10 - Circuito Mundial de Surf.

## Instalação

1. Clone o repositório
   ```bash
   git clone https://github.com/Agostinhoneto/circuito-mundial.git

 - cd circuito-mundial
 - composer install
 - cp .env.example .env
 - php artisan key:generate
 
2. **Configuração da Base de Dados:**
   - Instruções para configurar e migrar o banco de dados.

## 3 -Configuração da Base de Dados

1. Configure o arquivo `.env` com as informações do banco de dados.

 DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=circuitomundialsurf
DB_USERNAME=   
DB_PASSWORD=

- php artisan migrate

- php artisan db:seed - Para rodar os seeders de todas as tabelas : Surfistas,Baterias, Ondas e Notas.

### 4 - Endpoints

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






