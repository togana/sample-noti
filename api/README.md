# Laravel Project Boilerplate

## Requirement
- PHP >= 7.x
- Docker
- Docker Compose 

## Setup

envファイルのコピー

```shell
$ cp .env.example .env
$ cp ./src.env.example ./src/.env
```
※ FIREBASE_CREDENTIALS=./secret.json のファイルはfirebaseのコンソールからサービスアカウントの秘密鍵を取得して配置すること

初期化

```shell
$ make up
$ make app-init
$ make app-db-fresh
```

# Documents 
## OpenAPI
Access to `http://localhost:8080`.

## DBDoc
Open the database document.
```sh
$ open ./document/dbdoc/README.md
```

Update database document.
```sh
$ make doc-db-update
```
