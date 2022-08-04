# Unveel Assessment
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
## STEP 1 - Structure and Environment Setup
We have the following structure of our folders:
```sh
/unvee.lio
    /docker     - All docker files located here
    /docs       - Exta docs, i.e. Instruction doc from the assessor
    /site       - All website files
    README.md   - Documentation of the entire assessment
```
` PLEASE MAKE SURE `
- Make sure that you make sure the docker/.env file has the correct root variables, my root is `c:\sites\unveel.io\` as per environmental variable `ROOT_DIR`, this is used for docker to find the project and its image.
- My image is running `PHP 8.1.7`
- 