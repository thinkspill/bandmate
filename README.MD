# OI! B&M8!

Cread, Read, Update, and Delete All Your Favorite Bands, with BandMate!

## Getting Started

This app is built with Laravel 5.3 and includes a Docker environment to run in. Otherwise, run it in any Laravel-compatible environment.

### Docker

To load the app with Docker, first be sure you have [Docker and Docker Compose Installed](https://docs.docker.com/engine/installation/):

```bash
$ docker-compose version
docker-compose version 1.9.0, build 2585387
docker-py version: 1.10.6
CPython version: 2.7.12
OpenSSL version: OpenSSL 1.0.2j  26 Sep 2016
```

Next, `git clone` or download and unzip a copy of this code to somewhere convenient on your development machine.
The following will clone the repository to `~/code/bandmate`:

```bash
$ mkdir ~/code2; cd ~/code2; git clone https://github.com/thinkspill/bandmate.git && cd bandmate
```

If all goes well, you should be at `~/code/bandmate` with all the code cloned. Start the app with `docker-compose`:

```bash
$ docker-compose up
```

Docker will start up everything needed, and (hopefully) after a few minutes the app will be available at [http://localhost:8089/](http://localhost:8089/).

## Tests

Assuming the app is up and running in its container, run the tests by running command `docker exec bandmate-web vendor/bin/phpunit`.

## Built With

* [Laravel 5.3](http://laravel.com/) - Web framework
* [Bootstrap 3](http://getbootstrap.com/) - UI framework
* [Kyslik/column-sortable](https://github.com/Kyslik/column-sortable) - Sortable model columns
* [laravelcollective/html](https://laravelcollective.com/docs/5.3/html) - HTML Forms handler
* [nubs/random-name-generator](https://github.com/thinkspill/random-name-generator) - Random name generator (forked)

## Original task spec:

Programming Task:

Using Laravel(4.2 or higher), create an application to keep track of your favorite bands and albums. You should create both "Band" and "Album" database tables and models. All database tables should be created via Laravel migrations. All database tables should be populated with example data via Laravel seed classes. Your application should consist of the following pages:

- Band list page - List all bands (HOMEPAGE)
- Album list page - List all albums. Include a "HTML select" field that contains all bands and can be used to filter the current list of Albums by Band.
- On both list pages, each item listed should contain edit and delete links.
- On both list pages, you should be able to sort the columns that are displaying by clicking on the column name.
- If you click the delete button on an album, the application should delete the album.
- If you click the delete button on a band, the application should delete all albums that belong to that band and then it should delete the band.
- If you click the edit link for any list item you should be taken to an edit page for that item. There you should be able to edit any of the fields on the item.
- Use Laravel relationships to tie the band model to the album model and the album model to the band model.
- Use Laravel relationships to display the band name on album detail/edit page.
- Use Laravel relationships to display the album names for a band on the band detail/edit page.
- For the band create/edit page, “name” should be required.
- For the album create/edit page, you should have to select a band via a select box which should be required. The “name” field should also be required.

- Band table should have the following fields:
- name
- start_date
- website
- still_active

- Album
- band_id
- name
- recorded_date
- release_date
- number_of_tracks
- label
- producer
- genre
