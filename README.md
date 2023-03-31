<p align="center">
<img width="auto" height="75" src="public/easyshortenerlogo.png" alt="easyshortener logo">
</a></p>


<p align="center">
<img alt="GitHub Workflow Status" src="https://img.shields.io/github/actions/workflow/status/easypanel-community/easyshortener/packages.yml">
<img alt="GitHub release (latest SemVer)" src="https://img.shields.io/github/v/release/easypanel-community/easyshortener?label=version">
<img alt="GitHub contributors" src="https://img.shields.io/github/contributors/easypanel-community/easyshortener">
<img alt="GitHub" src="https://img.shields.io/github/license/easypanel-community/easyshortner">
</p>

<br/><br/>
## :busts_in_silhouette: Multi user
Easyshortener can have multiple users \
Manage all of them from the built-in administration panel

## :lock: Two Factor Authentication
Have piece of mind with built in two factor authentication

## :sparkles: Easy to use
Crafted with love and care to provide the best experience possible

## :whale2: Built for docker
Deploy Easyshortener easier with your favorite container engine

---

<!-- easy deployment -->
<!--[![Deploy on Railway](https://railway.app/button.svg)](https://railway.app/template/EClQYM?referralCode=A0Qtm6)-->


## Installation

- `composer install` - Installs dependencies to last updated version
- `php artisan migrate` - Migrates the database
- Set `EASYSHORTENER_ALLOW_REGISTRATION` to `true` to create your account - run `php artisan config:cache` once done
- `npm run build` - Builds assets

## Docker
<!-- easypanel one click -->
<!--[![Deploy on Easypanel](https://easypanel.io/img/deploy-on-easypanel-40.svg)](https://easypanel.io/docs/templates/easyshortener)-->
<!-- docker compose -->
[Compose file](https://github.com/Easypanel-Community/easyshortener/blob/main/docker/docker-compose.yml)
```
docker run --name easyshortener -v /etc/easyshortener:/var/www/html -e APP_DEBUG=false -e EASYSHORTENER_ENABLE_REGISTRATION=true -e EASYSHORTENER_INSTALLATION_ENV=docker -e DB_CONNECTION=sqlite -e DB_DATABASE=/database/sqlite/easyshortener.db ghcr.io/easypanel-community/easyshortener
```
Need to access your container? Use `docker exec -it imageid /bin/sh` 


## Testing

- `php artisan test` - Running this will refresh the entire database
- `php artisan db:seed` - This creates a user called `User` with the credentials `user@test.com:password`

## Commands

| Command                 | Description    | Arguments |
| ----------------------- | -------------- | --------- |
| php artisan view:link   | View all the links currently available on your Easyshortener instances connected database | None |
| php artisan delete:link | Delete a link from your Easyshortener instance  | ID |

 ## Environment Variables

| Variable                         | Description        | Arguments                |
| -------------------------------- | ------------------ | ------------------------ |
| EASYSHORTENER_ALLOW_REGISTRATION | Allows registration for your Easyshortener instance | true/false |
| EASYSHORTENER_INSTALLATION_ENV   | Sets the install platform of your Easyshortener instance   | easypanel/docker/webhost |
| EASYSHORTENER_ALLOW_ANALYTICS    | Disable redirect tracking for all links on your Easyshortener instance | true/false |
| FORCE_HTTPS                      | Force HTTPS connection for your Easyshortener instance | true/false |

## License

Easyshortener is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
