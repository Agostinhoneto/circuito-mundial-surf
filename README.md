# API Laravel 10 - Circuito Mundial de Surf.

## Instalação

 1. Configuração de ambiente.

 - Sistema Operacional deve ter instalado o PHP na versão ^8.1.

2. Clone o repositório
   ```bash
   git clone https://github.com/Agostinhoneto/circuito-mundial-surf.git

 2.1 - execute o comando na pasta que clonou o projeto :  cd circuito-mundial

 2.2 -  execute o comando: composer install

 2.3 -  execute o comando para alterar o arquivo : cp .env.example .env renomear para .env

 2.4 -  execute o comando : php artisan key:generate

3. **Configuração da Base de Dados:**
   - Instruções para configurar e migrar o banco de dados.

## Configuração da Base de Dados

3.1 - Configure o arquivo `.env` com as informações do banco de dados nesse caso usei o Mysql.

 - DB_CONNECTION=mysql
 -  DB_HOST=127.0.0.1
 - DB_PORT=3306
 - DB_DATABASE=circuitomundialsurf
 - DB_USERNAME=
 - DB_PASSWORD=

3.2 - execute o comando :  php artisan migrate.

3.3 - Para rodar os seeders de todas as tabelas : Surfistas,Baterias, Ondas e Notas.
 php artisan db:seed

3.4 - Para rodar a aplicação exceute :  php artisan serve

### 5 - Endpoints
- para rodar os Endpoints eu utilizei a ferramenta Postman.

### `http://localhost:8000/api/` - para retornar que API está funcionando.

### `http://localhost:8000/api/surfistas`

- **GET** :  `http://localhost:8000/api/surfistas/index` - Obter a lista de todos os Surfistas.
- **POST**:  `http://localhost:8000/api/surfistas/store` -  Inserir surfistas.

### `http://localhost:8000/api/bateria`

Baterias.
- **GET**: `http://localhost:8000/api/bateria/index` - listar baterias .
- **POST**: `http://localhost:8000/api/bateria/store` - Cadastrar novas ondas em uma bateria.
- **GET** : `http://localhost:8000/api/bateria/vencedor/{bateriaId}` - Obter o vencedor de uma bateria.

### `http://localhost:8000/api/ondas`
- **GET**: `http://localhost:8000/api/ondas/index` - listar ondas .

- **POST**: `http://localhost:8000/api/ondas/store` - Criar uma nova onda

### `http://localhost:8000/api/notas`
- **GET**: `http://localhost:8000/api/notas/index` - listar notas .

- **POST**: `http://localhost:8000/api/notas/store` - Criar um nova nota .
