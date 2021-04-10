# Musée Maritime La Rochelle

Application mobile utilisant Angular en front et Symfony en back permetant de consulter les informations concernant le musée maritime de La Rochelle.

Lien du site d'origine du musée maritime de La Rochelle: 

https://museemaritime.larochelle.fr/

## Configuration Docker nécessaire

- Vérifier que vous avez bien la configuration du registry de l'IUT suivante. Merci de faire attention au **port 80** !!!! 
 
- Aussi, vous pouvez avoir d'autres registries dans cette config. 

```docker 
{
  "insecure-registries": [
    "registry.univ-lr.fr:80"
  ]
}
```

# Installation

## Récupérer les sources du projet
```
git clone https://github.com/dgoncalv/Projet-AppModule.git
```

## Pré-requis

* PHP 7.4
* Composer
* Symfony CLI
* NodeJS
* Docker & Docker-compose

Vous pouvez vérifier les pré-requis (sauf Docker et Docker-compose) avec la commande suivante (de la CLI Symfony) :

```
symfony check:requirements
```
## Récuperer le projet

Vous pouvez récuperer le projet à l'aide de la commande:
```
git clone https://github.com/dgoncalv/Projet-MuseeMaritime.git
```

## Installer les dépendances

Dans un premier temps, positionnez vous dans le dossier du projet :
```
cd "Nom_du_Projet"
```

### Lancer l'environnement de développement
**Pré-requis :** lancez l'application Docker si ce n'est pas déjà le cas.


Construisez et démarrez les conteneurs du projet :
```
docker-composer up --build
```

**En cas D'erreur !** 
<br>
Si Vous rencontrez des erreurs lors de la mise en place du docker,

Vous pouvez corrigez les erreurs liés à Symfony, Mysql ou NodeJs (Angular ici) à l'aide des commandes:
```bash
docker pull registry.univ-lr.fr:80/iutlr-info/iutlr-info-apache2-php7.4-symfony5:latest
docker pull registry.univ-lr.fr:80/iutlr-info/iutlr-info-mysql5.7:latest
docker pull registry.univ-lr.fr:80/iutlr-info/iutlr-info-nodejs14-15-5:latest
```

Si le conteneur NodeJs (Angular) pose toujours problème (ce qui peut arriver dù aux dernières mise à jour de Docker) vous pouvez régler cela en hébergeant localement dans le dossier APP après avoir mis à jour les modules en lançant les scripts suivants dans l'ordre:
```
./dependances.sh (une seule fois)
puis
./host.sh (pour héberger)
```


## Installer les bundles Symfony

Démarrez un terminal dans le conteneur associé à notre service symfony.
Normalement, le bash s'ouvre dans le dossier `/var/html/www`.

Dans ce terminal associé à notre service symfony, positionnez-vous dans le répertoire api :
```
cd api
```

Mettez à jour le vendor :
```
composer install
```

## Mettre en place la connexion à la base de donnée

Vous allez maintenant configurer le `.env` pour accéder à la base de données de notre projet.


Dans le ficher "docker-compose.yml", nous avons mis la configuration suivante :
```
mysql:
   environment:
     MYSQL_DATABASE: db-project
     MYSQL_USER: dbuser
     MYSQL_PASSWORD: dbpassword
     MYSQL_ROOT_PASSWORD: dbroot
```

Dans ce cas, l'URL JDBC pour se connecter à cette base de données à partir du projet Symfony (fichier `.env` situé dans le dossier `api`) est :
```
DATABASE_URL="mysql://dbuser:dbpassword@iutlr-info-mysql5.7:3306/dbproject?serverVersion=5.7"
```

## Initialiser la base de données

**Pré-requis :** votre bash est ouvert dans le dossier `/var/html/www/`. Si ce n'est pas le cas, exécutez votre conteneur Symfony puis exécutez la commande:
```
cd api
```
Création de la base de données ou re-création si elle existe déjà:
```
php bin/console doctrine:database:drop --if-exists -f
php bin/console doctrine:database:create
```

Mettre en place le schéma de la base de données :
```
php bin/console doctrine:schema:update --force
```

Ajouter des données factices à la base de données :
```
php bin/console doctrine:fixtures:load -n
```

## Accéder à l'application

Si votre Symfony, votre base de donnée MySQL et votre NodeJS sont oppérationnels, vous devriez pouvoir accéder à la page d'accueil du site à l'aide de l'url: 

Vous pouvez maintenant accéder à l'application : [http://localhost:4200/](http://localhost:4200/)

L'affichage de la page d'accueil sous format mobile devrait ressembler à ceci:

![image](./ressources/MuseeMaritime.png)

## Traitement des erreurs
### L'erreur survient au démarrage de la stack docker
```
docker-compose up --build
```
Si la commande ci-dessus affiche des erreurs, lire les instructions suivantes attentivement.

#### Vérifiez si vous êtes bien situé dans le répertoire de ce projet
Dans le terminal, exécuter cette commande :
```
pwd
```
Si le nom du répertoire portant le nom du projet n'est pas mentionné tout au bout de la chaîne, se replacer DANS le bon répertoire.

Une fois bien replacé, effectuez le démarrage de la stack.
```
docker-compose up --build
```

Si une erreur persiste, continuer la lecture.

#### Vérifiez qu'il n'y a pas de conteneurs docker démarrés

Pour voir les processus docker qui tournent :
```
docker ps -a
```

Pour arrêter les conteneurs démarrés :
```
docker stop $(docker ps -a -q)
```

Pour supprimer tous les conteneurs, pour éviter des conflits de nommage :
```
docker rm $(docker ps -a -q)
```
Attention: ces deux commandes peuvent envoyer une erreur argument manquant s'il n'y a pas de conteneurs qui tournent. C'est normal car **docker ps -a -q** ne renvoit rien.

Réeffectuez le démarrage de la stack :
```
docker-compose up --build
```

Si une erreur persiste, continuer la lecture.

#### L'erreur peut venir du répertoire `mysql`

Le processus de mysql n'a pas été lancé correctement.

Pour voir les processus docker qui tournent :
```
docker ps -a
```

Si le processus `iutlr-info2-dw-mysql` a un statut `exited`, supprimez le répertoire `mysql` depuis la racine du projet:
```
rm -Rf mysql
```

Réeffectuez le démarrage de la stack :
```
docker-compose up --build
```

