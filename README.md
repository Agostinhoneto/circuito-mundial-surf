# Minha API Laravel 10 - Circuito Mundial de Surf.

API para interação com [descrição breve da funcionalidade].

## Instalação

1. Clone o repositório
   ```bash
   git clone https://github.com/Agostinhoneto/circuito-mundial.git

 - cd seu-repositorio
 - composer install
 - cp .env.example .env
 - php artisan key:generate
 
3. **Configuração da Base de Dados:**
   - Instruções para configurar e migrar o banco de dados.

## 4 -Configuração da Base de Dados

1. Configure o arquivo `.env` com as informações do banco de dados.

 DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=circuitomundial
DB_USERNAME=   
DB_PASSWORD=

- php artisan migrate

- php artisan db:seed - Para rodar os seeders de todas as tabelas : Surfistas,Baterias, Ondas e Notas.

### 5 - Endpoints

### `http://localhost:8000/api/surfistas` 

- **GET** : Obter a lista de todos os Surfistas : `http://localhost:8000/api/surfistas/index`
- **POST**: Inserir surfistas : `http://localhost:8000/api/surfistas/store`

### `http://localhost:8000/api/bateria`

- **GET** : Obter a lista de todos os Surfistas: `http://localhost:8000/api/surfistas/index`
- **POST**: Criar um novo surfista : `http://localhost:8000/api/surfistas/store`
- **GET** : Obter o vencedor de uma bateria : `http://localhost:8000/api/bateria/vencedor/{bateriaId}`

### `http://localhost:8000/api/ondas`

- **GET** : Obter a lista de todos os Surfistas: `http://localhost:8000/api/ondas/index`
- **POST**: Criar um novo surfista : `http://localhost:8000/api/ondas/store`






