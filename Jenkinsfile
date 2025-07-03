pipeline {
    agent any

    stages {
        stage('Build Docker Image') {
            steps {
                bat 'docker build -t banking-system-app .'
            }
        }

        stage('Security Scan') {
            steps {
                bat 'snyk test || exit /b 0'
            }
        }

        stage('Deploy Locally') {
            steps {
                bat 'docker run -d -p 8084:80 banking-system-app'
            }
        }
    }
}
