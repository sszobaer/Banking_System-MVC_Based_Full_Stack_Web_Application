pipeline {
    agent any

    stages {
        stage('Build Docker Image') {
            steps {
                sh 'docker build -t banking-system-app .'
            }
        }

        stage('Security Scan') {
            steps {
                sh 'snyk test || true'
            }
        }

        stage('Deploy Locally') {
            steps {
                sh 'docker run -d -p 8081:80 banking-system-app'
            }
        }
    }
}
