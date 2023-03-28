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

---

<!-- easy deployment -->
[![Deploy on Railway](https://railway.app/button.svg)](https://railway.app/template/EClQYM?referralCode=A0Qtm6)


## Installation

- `composer install` - Installs dependencies to last updated version
- `php artisan migrate` - Migrates the database
- Set `EASYSHORTENER_ALLOW_REGISTRATION` to `true` to create your account - run `php artisan config:cache` once done
- `npm run build` - Builds assets

## Testing

- `php artisan test` - Running this will refresh the entire database
- `php artisan db:seed` - This creates a user called `User` with the credentials `user@test.com:password`

## Commands

| Command                 | Description    | Arguments |
| ----------------------- | -------------- | --------- |
| php artisan view:link   | View all the links currently available on your Easyshortener instances connected database | None      |
| php artisan delete:link | Delete a link from your Easyshortener instance  | ID        |

 ## Environment Variables

| Variable                         | Description        | Arguments                |
| -------------------------------- | ------------------ | ------------------------ |
| EASYSHORTENER_ALLOW_REGISTRATION | Allows registration for your Easyshortener instance | true/false               |
| EASYSHORTENER_INSTALLATION_ENV   | Sets the install platform of your Easyshortener instance   | easypanel/docker/webhost |
| FORCE_HTTPS                      | Force HTTPS connection for your Easyshortener instance | true/false |

## License

Easyshortener is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
