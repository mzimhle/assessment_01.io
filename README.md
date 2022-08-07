# Assessment_01 Assessment
Assessment for senior developer position. Listed development tools and languages for the position are:
- Docker Compose 
- PHP, Symfony
- API Platform
- PHP Unit
- Mockery
- MockServer
- GitLab
- Heroku
- PostgreSQL, AWS, and growing

Used languages and tools
- Symfony 6.0.11
- PHP 8.1.7 (docker image)
- PHP 8.1.9 (my own PC)
- Docker Compose 2.0.0-rc.3
- GitLab
- Composer 2.1.9
## Structure and Environment Setup
We have the following structure of our folders:
```sh
/unvee.lio
    /docker     - All docker files located here
    /docs       - Exta docs, i.e. Instruction doc from the assessor
    /site       - All website files
    README.md   - Documentation of the entire assessment
```
###### PLEASE MAKE SURE
- Make sure that you make sure the docker/.env file has the correct root variables, my root is `c:\sites\assessment_01.io\` as per environmental variable `ROOT_DIR`, this is used for docker to find the project and its image.
- My image is running `PHP 8.1.7`

## Structure

All my classes are in the `src/Entity` folder, there I have classes and their respective abstract classes they extend in the `src/Entity/MappedSupperclass` folder, because we have a user and the actions he/she will take, we will give those actions an `src/Entity/MappedSupperclass/AbstractAction.php` class which will keep all properties and methods that are used by all actions, of which in the actions are in `src/Entity/Delivery.php`, `src/Entity/RideShare.php` and `src/Entity/Rent.php`. These actions will extend the abstract action class. 

This will be the same with the `src/Entity/User.php` and the `src/Entity/MappedSupperclass/AbstractUser.php` classes.

The reason why I took this route was to first look at the actions as to how they are related, as you can see in the abstract class they extend, there are a few properties, of which they all will have their getters and setters. But because all these actions are calculated differently, I then simply have to create a class for each and do all the separate calculations there, this will help if the actions have to increase and add more or a calculation has to change.