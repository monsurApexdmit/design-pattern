pipeline {
    agent any

    stages {
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

        stage('Clear & Cache Configs') {
            steps {
                dir('src') {
                    sh '''
                    php artisan config:clear
                    php artisan config:cache
                    php artisan route:cache
                    php artisan view:cache
                    '''
                }
            }
        }

        stage('Restart Laravel') {
            steps {
                dir('src') {
                    sh 'php artisan queue:restart || true'
                }
            }
        }
    }

    post {
        success {
            echo '✅ Deployment successful!'
        }
        failure {
            echo '❌ Deployment failed.'
        }
    }
}
