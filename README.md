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
- Rector
## Structure and Environment Setup
We have the following structure of our folders:
```sh
/unvee.lio
    /docker     - All docker files located here
    /docs       - Exta docs, i.e. Instruction doc from the assessor
    /site       - All website files
    README.md   - Documentation of the entire assessment
```
*PLEASE MAKE SURE*
- Make sure that you make sure the docker/.env file has the correct root variables, my root is `c:\sites\assessment_01.io\` as per environmental variable `ROOT_DIR`, this is used for docker to find the project and its image.
- My image is running `PHP 8.1.7`

## Structure
`/site/src/Entity/User.php`:
Class keeps the employee's name and date of actions performed, as well as any other details that can be added later. It has objects of the actions the user can perform such as delivering, ridesharing and renting. 

The user class is linked to actions that can can be performed by this given user. These action classes have custom calculations within them which are defined in their methods, but also implement the `/site/src/Entity/Implement/Action.php` interface so that they all have similar methods. These actions are defined in the other 3 classes, which are below:

`/site/src/Entity/Delivery.php`
`/site/src/Entity/Rent.php`
`/site/src/Entity/Rideshare.php`

As much as the above actions extend the abstract class `/site/src/Entity/MappedSuperclass/AbstractAction.php`, in order to put getter and setter methods in one class, they also, as a rule, can only have one boostetr
We also have booster classes that are in the folder `/site/src/Booster/` which implement the `/site/src/Entity/Implement/Booster.php` class. On the booster class, for example the `/site/src/Booster/BoostDelivery.php`, we implement the Booster interface, so that we can force each action's booster to call the current booster "currentBooster", this is so if we want to change the booster, we will create a new method for it, the add it inside this "currentBooster" method.

## Notes

- I did not configure unite tests as it is not my strong point, so did not want to waist time on that, I am however going to register it on UDEMY for courses.
- I installed `"rector/rector": "^0.13.10"` which is a tool I run to make sure that my PHP code follows PSR 4 rules and is PHP 8.1 compatible. It also checks coding style and quality, changes it automatically for you where needed. Its setup is in the `/site/rector.php` file.