
## Laravel application with Token api authentication



## usage

First step using the command [git clone https://github.com/dibazi/Cart.git] get the project into you system.
Now that you have clone the project you can run it on, your machine via you [command line] by going to your reseach bar.
But before doing that please make sure you have [composer](https://getcomposer.org) and [node](https://nodejs.org) installed
or you can run in your terminal(command line) [composer], [node -v] and [npm -v] you to need to get a response from each command 
then you are good to go.

Now from the command line you need to able to navigate (using key word [navigate through cmd] with google) get into the laravel 
project you just clone once you in run the command [php artisan serve] once you get the response. the project has start on your 
localhost go to your browser type [localhost:8000] you will be redirect to a welcome page at the top of the page you will find 
two links login and register. you will have to register to acces the services the application has to offer.

## Technology use

laravel responsable of the frontend and the backend of the application, the application is using token authentification to allow 
sensitive fonctionality to be executed.
laravel @if as been used to hide sensible action like delete and update to created cart to only allow the personne who created the cart and token 
to authenticate the request and making sure route are protected.
