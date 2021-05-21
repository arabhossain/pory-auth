# Auth Library

## Installation:
Add the code snippets to the application root `composer.json` file and run `composer udpate`

    "repositories": {
        "pory-auth": {
            "type": "path",
            "url" : "arabhossain/pory-auth",
            "options": {
                "symlink": true
            }
        }
    }

place it and update to the `.env` file

    #Auth Library
    AUTH_DB_CONNECTION=mysql
    AUTH_DB_HOST=127.0.0.1
    AUTH_DB_PORT=3306
    AUTH_DB_DATABASE=pory_auth
    AUTH_DB_USERNAME=root
    AUTH_DB_PASSWORD=arabrmc148
