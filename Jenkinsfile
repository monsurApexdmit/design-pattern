pipeline {
    agent {
        docker {
            image 'php:8.2-cli'
            args '-v /var/run/docker.sock:/var/run/docker.sock'
        }
    }

    stages {
        stage('Install Tools') {
            steps {
                sh '''
                apt-get update
                apt-get install -y git unzip curl nodejs npm
                curl -sS https://getcomposer.org/installer | php
                mv composer.phar /usr/local/bin/composer
                '''
            }
        }

        stage('Checkout') {
            steps {
                git branch: 'test-jenkins', url: 'https://github.com/monsurApexdmit/design-pattern.git'
            }
        }

        stage('Install Dependencies') {
            steps {
                dir('src') {
                    sh '''
                    composer install --no-interaction --prefer-dist --optimize-autoloader
                    npm install
                    npm run build
                    '''
                }
            }
        }

        stage('Run Migrations') {
            steps {
                dir('src') {
                    sh 'php artisan migrate --force'
                }
            }
        }
    }
}
