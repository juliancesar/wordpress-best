# Estudos Docker + Wordpress

Estudos utilizando Docker + Wordpress.

> https://mermaidjs.github.io/mermaid-live-editor/

## Files

* Download last version of Wordpress in https://br.wordpress.org/
* Put uncompressed files in `/wordpress`

## Docker Compose

Para que os limites de memória e cpu funcionem é necessário rodar o comando `docker-compose` com parâmetros diferentes.

```yml
deploy:
  resources:
    limits:
        cpus: "0.10"
        memory: "30M"
```

```sh
docker-compose --compatibility up
```

Para saber quanto cada container tem alocado use o comando `docker stats`.

> https://nickjanetakis.com/blog/docker-tip-78-using-compatibility-mode-to-set-memory-and-cpu-limits
> https://medium.com/worldsensing-techblog/10-docker-tips-and-tricks-8ebc6202e44c

## Alteração de `/etc/hosts`

```
127.0.0.1       wordpress.localhost
```

> É importante instalar o WP já no domínio final (wordpress.localhost).

# Geração do Certificado

```sh
# Métodos antigos, não funcionaram bem no Chrome, ficaram inválidos
# openssl req -subj '/CN=localhost' -x509 -newkey rsa:4096 -nodes -keyout key.pem -out cert.pem -days 365
# openssl req -subj '/CN=wordpress.localhost' -x509 -newkey rsa:4096 -nodes -keyout key_wordpress.pem -out cert_wordpress.pem -days 365

# Novo método
./self-signed/self-signer-tls.sh -c=BR --state=PR --common-name=wordpress.localhost --path=./nginx/ssl/ -l=Curitiba -o=Desenvolvedor -u=Diretoria -e=user@gmail.com 
```

## SSL + Chrome + Localhost

O chrome não deixa ter certificados auto assinados para localhost, a não ser que desabilite a segurança OU adicione nas chaves.

* **chrome://flags/#allow-insecure-localhost** OU
* (RECOMENDADO) https://medium.com/@mannycodes/configure-self-signed-ssl-for-nginx-docker-from-a-scratch-7c2bcd5478c6

## Plugins Instalados

* W3 total Cache

## Configurações

* Configuração do MemCached

> **Atenção:** o HTTPs não foi configurado nos testes

## Cenário Escolhido

* MariaDB
* NginX
* PHP-FPM
* MemCached

## Execução dos Testes

```sh
ab -n 10000 -r -c 100 -s 5 https://wordpress.localhost/
```

## Testes

### Selenium Grid

* https://techblog.dotdash.com/setting-up-a-selenium-grid-with-docker-containers-for-running-automation-tests-c43aceccd5d9

> https://www.realvnc.com/pt/connect/download/viewer/macos/ - Senha de acesso ao VNC: **secret**

### Testes

* https://codeception.com/quickstart
* https://stackoverflow.com/questions/58290566/install-ext-zip-for-mac/58300437#58300437
* https://hub.docker.com/r/codeception/codeception/