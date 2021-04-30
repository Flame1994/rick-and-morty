# Rick And Morty
Using the API: https://rickandmortyapi.com/ we show specific information regarding the characters, locations and more.

## Deployment
This app has been deployed to **Heroku**. You can view the demo [here](https://rhaarhoff-rickandmorty.herokuapp.com/).

## Requirements
There are a few things needed in order to setup this project.
- PHP
- Apache / Nginx
- **[Composer](https://getcomposer.org/)**
- **[Laravel](https://laravel.com/docs/8.x/installation)**

## Installation
First, clone this repository and navigate to the directory where it has been downloaded. Follow the instructions below:

- Run the Composer installation
```jshelllanguage
$ composer install
```
- Create a `.env` file
```jshelllanguage
$ cp .env.example .env 
```
- Update the `.env` file with all needed information. A `OMDBAPI` key is required in order to access
an api. Make sure to visit **[here](https://www.omdbapi.com/)** to get a key.

## Implementation

### Summary
**Laravel**, which is a MVC (Model View Controller) framework is used in this implementation, alongside a **Service** and **Repository** design pattern. 

Communication through the API happens over a simple JSON based protocol over HTTP.

The implementation is comunicating with two external API's:

- **[RickAndMortyApi](https://rickandmortyapi.com/)** for information related to characters, episodes and locations.
- **[OMDBAPI](https://www.omdbapi.com/)** For information about the series, episode ratings, etc.

### Models
Custom Models were created that map to resources being called on the rick and morty API. These
models use the api's in order to get their information.

### Controllers
Controllers are responsible for controlling the flow of the application over the HTTP requests. 
A request will link to a function within a specified controller, which will then be passed along to a **Service**.

### Services
Incoming requests input and responses are all handled by a Service.
The services are written in such a way that the Eloquent ORM is never used, making it available for other resources to 
work with, such as API's. Thus, we use a Repository to retrieve the information.

### Repositories
A Repository is an abstraction of the data layer and a centralised way of handling our models. 
The idea with this pattern is to have a generic abstract way for the app to work with the data 
layer without being bothered with if the implementation is towards a local database or towards an online API. In this case
we have no local database using Eloquent models, but external API's.

## API
These are the current API routes that are available. You can view them in the `api.php` file in the `routes` folder.

To access these routes, simply use the `/api/` prefix on the url. Some examples:
```jshelllanguage
https://rhaarhoff-rickandmorty.herokuapp.com/api/locations
https://rhaarhoff-rickandmorty.herokuapp.com/api/locations?page=2
https://rhaarhoff-rickandmorty.herokuapp.com/api/locations?dimension=C-137
https://rhaarhoff-rickandmorty.herokuapp.com/api/characters
https://rhaarhoff-rickandmorty.herokuapp.com/api/episodes
``` 
```
 +--------+----------+---------------------+------+-----------------------------------------------+------------+
 | Domain | Method   | URI                 | Name | Action                                        | Middleware |
 +--------+----------+---------------------+------+-----------------------------------------------+------------+
 |        | GET|HEAD | /                   |      | Closure                                       | web        |
 |        | GET|HEAD | api/characters      |      | App\Http\Controllers\CharacterController@all  | api        |
 |        | GET|HEAD | api/characters/{id} |      | App\Http\Controllers\CharacterController@show | api        |
 |        | GET|HEAD | api/episodes        |      | App\Http\Controllers\EpisodeController@all    | api        |
 |        | GET|HEAD | api/episodes/{id}   |      | App\Http\Controllers\EpisodeController@show   | api        |
 |        | GET|HEAD | api/locations       |      | App\Http\Controllers\LocationController@all   | api        |
 |        | GET|HEAD | api/locations/{id}  |      | App\Http\Controllers\LocationController@show  | api        |
 +--------+----------+---------------------+------+-----------------------------------------------+------------+
```
